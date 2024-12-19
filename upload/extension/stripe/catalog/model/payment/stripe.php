<?php

namespace Ventocart\Catalog\Model\Extension\Stripe\Payment;

require_once(DIR_EXTENSION . 'stripe/system/vendor/autoload.php');
class Stripe extends \Ventocart\System\Engine\Model
{

  public function updatePaymentData($order_id, $data) {
	$this->db->query("UPDATE `" . DB_PREFIX . "order` 
			SET `payment_data` = '" .  $this->db->escape(json_encode($data, true)) . "' 
			WHERE `order_id` = '" . $order_id . "'");

  }
	public function getExipired()
	{
		// Strict check the day after a sub expired
		//$result = $this->db->query("SELECT * FROM `" . DB_PREFIX . "subscription` WHERE DATE(date_next) < CURDATE()");

		// Or Give an extra day, to settle things down with payments: 
		$result = $this->db->query("SELECT * FROM `" . DB_PREFIX . "subscription` WHERE DATE(date_next) < DATE_SUB(CURDATE(), INTERVAL 1 DAY)");

		return $result->rows;
	}


	public function getStripe()
	{

		if ($this->config->get('payment_stripe_environment') == 'live') {
			$stripe_secret_key = $this->config->get('payment_stripe_live_secret_key');
		} else {
			$stripe_secret_key = $this->config->get('payment_stripe_test_secret_key');
		}
		$stripe = new \Stripe\StripeClient($stripe_secret_key);
		return $stripe;
	}

	// Available actions (buttons) for a specific subscription
	public function canCancel($full)
	{

		return $full['status'] != 'past_due' && empty($full['canceled_at']) ? true : false;
	}
	public function canRestart($full)
	{

		return $full['status'] == 'past_due' ? true : false;
	}
	public function canResume($full)
	{

		return $full['status'] != 'past_due' && !empty($full['canceled_at']) ? true : false;
	}

	public function setupIntent()
	{

		return $this->getStripe()->setupIntents->create(['customer' => $this->getCustomerID()]);

	}
	public function cancelSubscription($track_id)
	{

		$t = $this->getStripe()->subscriptions->update($track_id, ['cancel_at_period_end' => true]);

		if (!empty($t)) {
			$status_id = $this->stripeStatusToLocalId($t['status']);
			$this->updateLocalSubscription($track_id, $status_id, $t['current_period_end'], $t);
			return true;
		} else {
			return false;
		}

	}
	public function installLocalSubscription($id, $full)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "subscription` 
						 SET `payment_id` = '" . $full->id . "', 
							 `payment_api_data` = '" . $this->db->escape(json_encode($full, true)) . "' 
						 WHERE `subscription_id` = '" . (int) $id . "'");
	}
	public function updateLocalSubscription($track_id, $status, $date_next, $full = [])
	{


		if (empty($full)) {
			$this->db->query("UPDATE `" . DB_PREFIX . "subscription` 
			SET `subscription_status_id` = '" . (int) $status . "', 
				`date_next` = FROM_UNIXTIME(" . (int) $date_next . ") 
			WHERE `payment_id` = '" . $track_id . "'");
		} else {


			$this->db->query("UPDATE `" . DB_PREFIX . "subscription` 
			SET `subscription_status_id` = '" . (int) $status . "', 
			`payment_api_data` = '" . $this->db->escape(json_encode($full, true)) . "', 
			`date_next` = FROM_UNIXTIME(" . (int) $date_next . ") 
			WHERE `payment_id` = '" . $track_id . "'");

		}

	}
	public function updateMethodSubscription($track_id, $method_id)
	{

		$t = $this->getStripe()->subscriptions->update($track_id, ['default_payment_method' => $method_id]);

		if (!empty($t)) {
			$status_id = $this->stripeStatusToLocalId($t['status']);
			$this->updateLocalSubscription($track_id, $status_id, $t['current_period_end'], $t);
			return true;
		} else {

			return false;
		}

	}

	public function restartSubscription($track_id, $invoice)
	{


		$t = $this->getStripe()->invoices->pay($invoice, []);


		if (!empty($t)) {
			$status_id = $this->stripeStatusToLocalId($t['status']);
			$this->updateLocalSubscription($track_id, $status_id, $t['current_period_end'], $t);

			$this->load->controller('extension/stripe/cron/subscriptions.subscription_activate', $this->getLocalIdFrompayment_id($track_id));

			return true;
		} else {

			return false;
		}
	}

	public function getLocalIdFrompayment_id($track_id)
	{
		$result = $this->db->query("SELECT subscription_id FROM `" . DB_PREFIX . "subscription` WHERE payment_id='$track_id'");

		if ($result && $result->num_rows > 0) {
			return $result->row['subscription_id'];
		} else {
			return 0;
		}
	}

	public function resumeSubscription($track_id)
	{

		$t = $this->getStripe()->subscriptions->update($track_id, ['cancel_at_period_end' => false]);

		if (!empty($t)) {
			$status_id = $this->stripeStatusToLocalId($t['status']);
			$this->updateLocalSubscription($track_id, $status_id, $t['current_period_end'], $t);
			return true;
		} else {

			return false;
		}

	}

	public function stripeStatusToLocalId($status_string)
	{

		$status_id = 0;
		if ($status_string === 'active') {
			$status_id = $this->config->get('config_subscription_active_status_id');
		} else if ($status_string === 'canceled') {
			$status_id = $this->config->get('config_subscription_canceled_status_id');
		} else if ($status_string === 'past_due') {
			$status_id = $this->config->get('config_subscription_expired_status_id');
		} else {
			$status_id = $this->config->get('config_subscription_failed_status_id');
		}
		return $status_id;
	}
	public function getSubscriptionDetails($id)
	{

		//$this->model_extension_stripe_payment_stripe->updateLocalSubscription($subscription->id,$subscription->status, $subscription->current_period_end);
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "subscription` WHERE `payment_id` = '" . $this->db->escape($id) . "'");

		if (!empty($query->row)) {

			if (strtotime($query->row['date_next']) > time()) {

				$full = json_decode($query->row['payment_api_data'], true);
				return ['status' => $query->row['subscription_status_id'], 'default_payment_method' => $full['default_payment_method'], 'canceled_at' => $full['canceled_at'], 'full' => $full];
			}
		}
		$subscription = $this->getStripe()->subscriptions->retrieve($id);

		$status_id = $this->stripeStatusToLocalId($subscription['status']);


		$this->updateLocalSubscription($id, $status_id, $subscription['current_period_end'], $subscription);

		return ['status' => $status_id, 'canceled_at' => $subscription['canceled_at'], 'default_payment_method' => $subscription['default_payment_method'], 'full' => $subscription];
	}
	public function delete($la)
	{
		$this->disableCachedStripeMethods();
		$la = $this->getStripe()->paymentMethods->detach($la, []);

		if (!empty($la)) {
			return true;
		} else {
			return false;
		}


	}

	// Create the subscription plan/package for that local id to mirror the payment proccessor or find it in proccessor if already exists
	public function createPlanOrFindPrice($subscription)
	{

		//Search if it exists
		$t = $this->getStripe()->prices->search([
			'query' => 'active:"true" AND lookup_key:"' . $subscription['subscription']['subscription_plan_id'] . '"',
		]);

		if (!empty($t) && !empty($t['data'])) {

			return $t['data'][0]->id;

		}

		// If no value returned then add it and return the price id
		$t = $this->getStripe()->prices->create([
			'currency' => $this->config->get('config_currency'),
			'unit_amount' => $subscription['subscription']['price'] * 100,
			'lookup_key' => $subscription['subscription']['subscription_plan_id'],
			'recurring' => ['interval' => $subscription['subscription']['frequency']],
			'product_data' => ['name' => $subscription['subscription']['name']],
		]);
		if (!empty($t)) {
			return $t->id;
		}
	}
	public function getStored()
	{

		$customer = $this->getCustomerID();

		if (empty($customer)) {
			return [];
		}

		$cached = $this->getCachedPaymentMethods();
		if (!empty($cached)) {
		 
			return $cached;
		}

		$payment_methods = $this->getStripe()->paymentMethods->all([
			'limit' => 10,
			'type' => 'card',
			'customer' => $customer,
		]);


		$methods = [];
		foreach ($payment_methods->data as $key => $payment_method) {



			$methods[] = [
				'id' => $payment_method->id,
				'name' => $payment_method->billing_details->name,
				'description' => ucfirst($payment_method->card->brand),
				'last_four' => $payment_method->card->last4,
				'date_expire' => $payment_method->card->exp_month . "/" . substr($payment_method->card->exp_year, 2, 2),
				'image' => '',
			];

		}
		$this->updateOrInsertStripeMethod($methods);
		return $methods;
	}
	public function attachPaymentMethod($customer_id, $method_id)
	{


		$result = $this->getStripe()->paymentMethods->attach(
			$method_id,
			['customer' => $customer_id]
		);


		return $result;
	}

	public function getCustomerID($email = '')
	{

		if (empty($email)) {
			$email = $this->customer->getEmail();
		}


		$what = $this->getStripe()->customers->all(['email' => $email]);


		if (!empty($what['data'][0]->id)) {
			return $what['data'][0]->id;
		} else {
			return null;
		}

	}



	public function addCustomer($address, $payment_method)
	{

		$this->getStripe();
		$customer = \Stripe\Customer::create([
			'email' => $address['email'],
			'payment_method' => $payment_method,
			'name' => $address['payment_firstname'] . ' ' . $address['payment_lastname'],

			'address' => [
				'city' => $address['payment_city'],
				'country' => $address['payment_iso_code_2'],
				'line1' => $address['payment_address_1'],
				'postal_code' => $address['payment_postcode'],
				'state' => $address['payment_zone'],
			],

		]);
		return $customer['id'];
	}
	public function getMethod($address, $total)
	{


		$this->load->language('extension/stripe/payment/stripe');

		$status = true;

		$method_data = array();

		if ($status) {
			$method_data = array(
				'code' => 'stripe',
				'title' => $this->language->get('text_title'),
				'terms' => '',
				'sort_order' => $this->config->get('stripe_sort_order')
			);
		}

		return $method_data;
	}
	public function getMethods(array $address = []): array
	{
		$method_data = [];

		if (empty($address) || !isset($address['country_id']) || !isset($address['zone_id'])) {
			$status = true;
		} else {
			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone_to_geo_zone` WHERE `geo_zone_id` = '" . (int) $this->config->get('payment_stripe_geo_zone_id') . "' AND `country_id` = '" . (int) $address['country_id'] . "' AND (`zone_id` = '" . (int) $address['zone_id'] . "' OR `zone_id` = '0')");

			if (!$this->config->get('payment_stripe_geo_zone_id')) {
				$status = true;
			} elseif ($query->num_rows) {
				$status = true;
			} else {
				$status = false;
			}
		}

		if ($status) {
			$option_data['stripe'] = [
				'code' => 'stripe.stripe',
				'name' => $this->config->get('payment_stripe_title') ?: 'Pay with Stripe'
			];


			if ($this->customer->isLogged()) {
				$stored = $this->getStored();
				foreach ($stored as $method) {
					$name = explode(' ', $method['name']);
					$name = end($name);


					$option_data[$method['id']] = [
						'code' => 'stripe.' . $method['id'],
						'name' => '💳 ' . $method['description'] . " " . $name . " ***" . $method['last_four'],
						'fullname' => $method['name'],
						'description' => $method['description'],
						'last_four' => $method['last_four'],
						'date_expire' => $method['date_expire'],
					];

				}

			}

			$method_data = [
				'code' => 'stripe',
				'name' => $this->config->get('payment_stripe_title') ?: 'Pay with Stripe',
				'option' => $option_data,
				'sort_order' => $this->config->get('payment_stripe_sort_order')
			];

		}

		return $method_data;
	}


 
	public function updateOrInsertStripeMethod($jsonData)
	{
		$customerId = $this->getCustomerID();
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "stripe_methods WHERE customer_id = '" . (int) $customerId . "'");

		if ($query->num_rows) {
			$this->db->query("UPDATE " . DB_PREFIX . "stripe_methods SET json_data = '" . $this->db->escape(json_encode($jsonData,true)) . "', cached = 1 WHERE customer_id = '" . (int) $customerId . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "stripe_methods SET customer_id = '" . (int) $customerId . "', json_data = '" . $this->db->escape(json_encode($jsonData,true)) . "', cached = 1");
		}
	}

 
	public function disableCachedStripeMethods()
	{
		$customerId = $this->getCustomerID();
		$this->db->query("UPDATE " . DB_PREFIX . "stripe_methods SET cached = 0 WHERE customer_id = '" . (int) $customerId . "'");
	}
	private function getCachedPaymentMethods()
	{
		$customerId = $this->getCustomerID();
		// Query the database to fetch cached payment methods for the customer
		$query = $this->db->query("SELECT json_data FROM " . DB_PREFIX . "stripe_methods WHERE customer_id = '" . (int)$customerId . "' AND cached = 1");
	
		if ($query->num_rows) {
			return json_decode($query->row['json_data'], true);
		}
	
		return [];
	}
	public function createOrder($subscription_id) {
		// Retrieve subscription details
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "subscription WHERE subscription_id = '" . (int)$subscription_id . "'");
		
		if ($query->num_rows) {
			$order_id = $query->row['order_id'];
	
			// Retrieve order details
			$order_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order WHERE order_id = '" . (int)$order_id . "'");
			
			if ($order_query->num_rows) {
				$order_data = $order_query->row;
	
				// Set date_added and date_modified to current timestamp
				$order_data['date_added'] = date('Y-m-d H:i:s');
				$order_data['date_modified'] = date('Y-m-d H:i:s');
	
				// Prepare columns and values for insertion
				$columns = '';
				$values = '';
				foreach ($order_data as $key => $value) {
					if ($key != 'order_id') { // Exclude order_id as it might be auto-incremented
						$columns .= $key . ', ';
						$values .= "'" . $this->db->escape($value) . "', ";
					}
				}
				$columns = rtrim($columns, ', ');
				$values = rtrim($values, ', ');
			 
				// Insert order data into a new order
				$this->db->query("INSERT INTO " . DB_PREFIX . "order ($columns) VALUES ($values)");
				
				// Return the ID of the newly created order
				$neworder_id  = $this->db->getLastId();

				// Retrieve product details
				$order_product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_product_id = '" . (int)$query->row['order_product_id'] . "'");

				// Check if product details are found
				if ($order_product_query->num_rows) {
					$product_data = $order_product_query->row;
				
					// Prepare and execute insertion query
					$insert_query = "INSERT INTO " . DB_PREFIX . "order_product SET 
									order_id = '" . (int)$neworder_id . "', 
									product_id = '" . (int)$product_data['product_id'] . "', 
									variation_id = '0', 
									name = '" . $this->db->escape($product_data['name']) . "', 
									model = '" . $this->db->escape($product_data['model']) . "', 
									quantity = '" . (int)$product_data['quantity'] . "', 
									price = '" . (float)$product_data['price'] . "', 
									total = '" . (float)$product_data['total'] . "', 
									tax = '" . (float)$product_data['tax'] . "', 
									reward = '" . (int)$product_data['reward'] . "'";
				
					$this->db->query($insert_query);
				}


				return $neworder_id;
			} else {
				// Handle case when order details are not found
				return false;
			}
		} else {
			// Handle case when subscription details are not found
			return false;
		}
	}

}
