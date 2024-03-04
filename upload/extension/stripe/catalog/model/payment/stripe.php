<?php

namespace Opencart\Catalog\Model\Extension\Stripe\Payment;

require_once(DIR_EXTENSION . 'stripe/system/vendor/autoload.php');
class Stripe extends \Opencart\System\Engine\Model
{

	private function getStripe()
	{

		if ($this->config->get('payment_stripe_environment') == 'live' || (isset($this->request->request['livemode']) && $this->request->request['livemode'] == "true")) {
			$stripe_secret_key = $this->config->get('payment_stripe_live_secret_key');
		} else {
			$stripe_secret_key = $this->config->get('payment_stripe_test_secret_key');
		}
		$stripe = new \Stripe\StripeClient($stripe_secret_key);
		return $stripe;
	}

	public function canCancel() {
		//Confirmation it has a cancelSubscription() method in order to render a "cancel and resume" button
		return  true;  
	}

	public function setupIntent() {

		return $this->getStripe()->setupIntents->create(['customer' => $this->getCustomerID()]);

	}
	public function cancelSubscription($track_id) {
		 
		$t = $this->getStripe()->subscriptions->update($track_id, ['cancel_at_period_end' => true]);
	 
		if (!empty($t)) { 
			return true;
		} else {
			return $t['status'];
		}
 
	}

	public function updateMethodSubscription($track_id, $method_id) {

		$t = $this->getStripe()->subscriptions->update($track_id, ['default_payment_method' => $method_id]);
	 
		if (!empty($t)) { 
			return true;
		} else {
			return $t['status'];
		}

	}

	public function restartSubscription($track_id, $invoice) {
 
	 
		 $t = $this->getStripe()->invoices->pay($invoice, []);
	 
	 
		if (!empty($t)) { 
			return true;
		} else {
			return $t['status'];
		}
	}
	public function resumeSubscription($track_id) {
		 
		$t = $this->getStripe()->subscriptions->update($track_id, ['cancel_at_period_end' => false]);
	 
		if (!empty($t)) { 
			return true;
		} else {
			return $t['status'];
		}
 
	}
	public function getSubscriptionStatus($id) {
	 
		$subscription = $this->getStripe()->subscriptions->retrieve($id);
	 
		$status_id = 0;
		if ($subscription['status'] === 'active') {
			$status_id = $this->config->get('config_subscription_active_status_id');
		} else if ($subscription['status'] === 'canceled') {
			$status_id = $this->config->get('config_subscription_canceled_status_id');
		} else if ($subscription['status'] === 'past_due') {
			$status_id = $this->config->get('config_subscription_expired_status_id');
		} else {
			$status_id = $this->config->get('config_subscription_failed_status_id');
		}
	 
		return ['status' => $status_id, 'canceled_at' => 	$subscription['canceled_at'], 'full' => $subscription];
	}
	public function delete($la)
	{
		$la = $this->getStripe()->paymentMethods->detach($la, []);

		 if (!empty($la)) {
			return true;
		 } else {
			return false;
		 }


	}

	// Create the plan/package for that local id to mirror the payment proccessor or find it in proccessor if already exists
	public function createPlanOrFindPrice($subscription) {

		//Search if it exists
		$t = $this->getStripe()->prices->search([
			'query' => 'active:"true" AND lookup_key:"'.$subscription['subscription']['subscription_plan_id'].'"',
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
			'product_data' => ['name' =>  $subscription['subscription']['name']],
		  ]);
		  if (!empty($t)) {
			return $t->id;
		  }
	}
	public function getStored()
	{
	 
		$customer = $this->getCustomerID();
 
		if (empty($customer)) { return []; }
 
		$payment_methods = $this->getStripe()->paymentMethods->all([
			'limit' => 10,
			'type' => 'card',
			'customer' => $customer,
		]);
	 
 
		$methods = [];
		foreach ($payment_methods->data as $key => $payment_method) {
			 
			$name = explode(' ', $payment_method->billing_details->name)[count(explode(' ', $payment_method->billing_details->name)) - 1];
			$methods[] = [
				'id' => $payment_method->id,
				'name' => "(".$name.")",
				'description' => ucfirst($payment_method->card->brand) . " ****: " . $payment_method->card->last4,
				'date_expire' => $payment_method->card->exp_month . "/" . $payment_method->card->exp_year,
				'image' => '',
			];

		}
		 
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

			$method_data = [
				'code' => 'stripe',
				'name' => $this->config->get('payment_stripe_title') ?: 'Pay with Stripe',
				'option' => $option_data,
				'sort_order' => $this->config->get('payment_stripe_sort_order')
			];
		}

		return $method_data;
	}


	public function log($file, $line, $caption, $message)
	{

		if (!$this->config->get('payment_stripe_debug')) {
			return;
		}

		$iso_time = date('c');
		$filename = 'stripe-' . strstr($iso_time, 'T', true) . '.log';

		$log = new Log($filename);
		$msg = "[" . $iso_time . "] ";
		$msg .= "<" . $file . "> ";
		$msg .= "#" . $line . "# ";
		$msg .= "~" . $caption . "~ ";

		if (is_array($message)) {
			$msg .= print_r($message, true);
		} else {
			$msg .= PHP_EOL . $message;
		}

		$msg .= PHP_EOL . PHP_EOL;
		$log->write($msg);
	}
}
