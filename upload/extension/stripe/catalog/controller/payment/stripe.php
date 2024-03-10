<?php

namespace Opencart\Catalog\Controller\Extension\Stripe\Payment;

use Exception;

class Stripe extends \Opencart\System\Engine\Controller
{

	public function index()
	{

		$this->load->language('extension/stripe/payment/stripe');
		$this->load->model('extension/stripe/payment/stripe');
		if ($this->request->server['HTTPS']) {
			$data['store_url'] = HTTP_SERVER;
		} else {
			$data['store_url'] = HTTP_SERVER;
		}

		if ($this->config->get('payment_stripe_environment') == 'live') {
			$data['payment_stripe_public_key'] = $this->config->get('payment_stripe_live_public_key');
			$data['test_mode'] = false;
		} else {
			$data['payment_stripe_public_key'] = $this->config->get('payment_stripe_test_public_key');
			$data['test_mode'] = true;
		}

		// get order info
		$this->load->model('checkout/order');
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		if (!empty($this->cart->getSubscriptions())) {

			if (count($this->cart->getProducts()) > 1) {
				$data['error'] = $this->language->get('error_subscription');
				return $this->load->view('extension/stripe/payment/error', $data);

			}
		}

		// we will use this owner info to send Stripe from client side
		$data['billing_details'] = array(
			'name' => $order_info['payment_firstname'] . ' ' . $order_info['payment_lastname'],
			'email' => $order_info['email'],
			'address' => array(
				'line1' => $order_info['payment_address_1'],
				'line2' => $order_info['payment_phone'],
				'city' => $order_info['payment_city'],
				'state' => $order_info['payment_zone'],
				'postal_code' => $order_info['payment_postcode'],
				'country' => $order_info['payment_iso_code_2']
			)
		);
		$code = explode('.', $this->session->data['payment_method']['code']);

		$data['payment_code'] = $code[1];
		$data['payment_name'] = $this->session->data['payment_method'];

	 

		// get current language code for locale, this will let Stripe JS elements to know which languages to use for its own elements
		$data['locale'] = $this->language->get('code');

		// handles the XHR request for client side
		$data['action'] = $this->url->link('extension/stripe/payment/stripe.confirm', 'format=json', true);

		if (($this->cart->hasDownload() || $this->cart->hasSubscription()) && !$this->customer->isLogged()) {
			$data['error'] = $this->language->get('error_need_account');
			return  $this->load->view('extension/stripe/payment/error',$data);
		}

		return $this->load->view('extension/stripe/payment/stripe', $data);
	}

	public function confirm()
	{
		if ($this->request->server['HTTPS']) {
			$data['store_url'] = HTTP_SERVER;
		} else {
			$data['store_url'] = HTTP_SERVER;
		}
		$this->load->language('extension/stripe/payment/stripe');
		$this->load->model('extension/stripe/payment/stripe');
		$json = array('error' => 'Server did not get valid request to process');

	
		if ($this->session->data['payment_method']['code']== 'stripe.stripe') {
			$this->model_extension_stripe_payment_stripe->disableCachedStripeMethods();
		}


		try {

			if (!isset($this->session->data['order_id'])) {

				$this->log->write("STRIPE ERROR order_id not found: Session Data " . print_r($this->session->data, true));
				throw new Exception("Your order seems lost in session. We did not charge your payment. Please contact administrator for more information.");
			}
			$customer_id = null;
			$payment_intent_id = null;
			// retrieve json from POST body
			$json_str = file_get_contents('php://input');
			$json_obj = json_decode($json_str);
			if (isset($json_obj->payment_intent_id)) {
				$payment_intent_id = $json_obj->payment_intent_id;
			}

			// load stripe libraries
			$this->initStripe();

			// get order info
			$this->load->model('checkout/order');
			$this->load->model('checkout/subscription');

			$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

			if (empty($order_info)) {
				$this->log->write("STRIPE ERROR order_info is empty: Session Data " . print_r($this->session->data, true));
				throw new Exception("Your order seems lost before payment. We did not charge your payment. Please contact administrator for more information.");
			}
			$intent = null;
			// Create the PaymentIntent

			if (isset($json_obj->payment_method_id)) {

				// amount to charge for the order
				$amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);

				// multiple by 100 to get value in cents
				$amount = $amount * 100;
				if (empty($this->cart->getSubscriptions())) {


					if ($this->customer->isLogged()) {
						// Add Customer to stripe
						$customer_id = $this->model_extension_stripe_payment_stripe->getCustomerID();
						// Customer exists, attach new payment

						if (!empty($customer_id)) {
							$this->model_extension_stripe_payment_stripe->attachPaymentMethod($customer_id, $json_obj->payment_method_id);
						} else {
							// Customer never purchased again, create customer and attach payment
							$customer_id = $this->model_extension_stripe_payment_stripe->addCustomer($order_info, $json_obj->payment_method_id);
						}
						$this->model_extension_stripe_payment_stripe->attachPaymentMethod($customer_id, $json_obj->payment_method_id);
					}


					if (!empty($this->session->data['virtual_product']) && $this->session->data['virtual_product']['info'] == "0") {
						$this->cart->clear();
						$intent = $this->model_extension_stripe_payment_stripe->setupIntent($customer_id);
						$json = [
							'id' => $json_obj->payment_method_id,
							'clientSecret' => $intent->client_secret
						];
			
						$this->response->addHeader('Content-Type: application/json');
						$this->response->setOutput(json_encode($json));
						return;
					} else {
					 

						$intent = \Stripe\PaymentIntent::create(
							array(
								'payment_method' => $json_obj->payment_method_id,
								'amount' => $amount,
								'customer' => $customer_id,
								'return_url' => rtrim($data['store_url'], '/') . "/?route=checkout/success",
								'currency' => strtolower($order_info['currency_code']),
								'confirm' => true,
								'description' => "Charge for Order #" . $order_info['order_id'],
								'shipping' => array(
									'name' => $order_info['shipping_firstname'] . ' ' . $order_info['shipping_lastname'],
									'address' => array(
										'line1' => $order_info['shipping_address_1'],
										'line2' => $order_info['payment_phone'],
										'city' => $order_info['shipping_city'],
										'state' => $order_info['shipping_zone'],
										'postal_code' => $order_info['shipping_postcode'],
										'country' => $order_info['shipping_iso_code_2'],
									)
								),
								'metadata' => array(
									'OrderId' => $order_info['order_id'],
									'FirstName' => $order_info['payment_firstname'],
									'LastName' => $order_info['payment_lastname'],
									'Address' => $order_info['payment_address_1'] . ', ' . $order_info['payment_phone'],
									'City' => $order_info['payment_city'],
									'Province' => $order_info['payment_zone'],
									'PostalCode' => $order_info['payment_postcode'],
									'Country' => $order_info['payment_iso_code_2'],
									'Email' => $order_info['email'],
									'Phone' => $order_info['telephone'],
								),
							)
						);
					}



				}

				if (!empty($this->cart->getSubscriptions())) {

					$customer_id = $this->model_extension_stripe_payment_stripe->getCustomerID();

					// Customer exists, attach new payment
					if (!empty($customer_id)) {
						$this->model_extension_stripe_payment_stripe->attachPaymentMethod($customer_id, $json_obj->payment_method_id);
					} else {
						// Customer never purchased again, create customer and attach payment

						$customer_id = $this->model_extension_stripe_payment_stripe->addCustomer($order_info, $json_obj->payment_method_id);
					}
					$localPlan = $this->cart->getSubscriptions()[0];
					$price_id = $this->model_extension_stripe_payment_stripe->createPlanOrFindPrice($localPlan);

					$remote_sub = [
						'customer' => $customer_id,
						'currency' => strtolower($order_info['currency_code']),
						'items' => [
							[
								'price' => $price_id,
							]
						],

						'payment_behavior' => 'allow_incomplete',
						'default_payment_method' => $json_obj->payment_method_id,
						'payment_settings' => [
							'payment_method_types' => ['card'],
							'save_default_payment_method' => 'on_subscription',

						],
						'expand' => ['latest_invoice.payment_intent'],
					];

					if ($localPlan['subscription']['trial_status']) {
						$remote_sub['trial_end'] = strtotime("+{$localPlan['subscription']['trial_cycle']} {$localPlan['subscription']['trial_duration']}", time());
					}
					$subscription = \Stripe\Subscription::create($remote_sub);


					if ($subscription->pending_setup_intent !== NULL) {
						$json = [
							'type' => 'setup',
							'clientSecret' => $subscription->pending_setup_intent->client_secret
						];
					} else if (
						$subscription->latest_invoice->payment_intent->status != 'requires_action'
						&& $subscription->latest_invoice->payment_intent->status != 'requires_confirmation'
					) {
						$json = [
							'type' => 'payment',
							'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret
						];
					}

					$intent = $subscription->latest_invoice->payment_intent;
					$payment_intent_id = $subscription->latest_invoice->payment_intent->id;

					$this->session->data['subscription_checkout'] = ['order_id' => $order_info['order_id'], 'stripe_subscription_id' => $subscription->id];
				}

			}

			// else if payment intent id sent from client side (stripe UI)
			// then retrieve the intent and charge it
			else if (isset($payment_intent_id)) {

				$intent = \Stripe\PaymentIntent::retrieve(
					$payment_intent_id
				);

				//$intent->confirm();
			}

			if (!empty($intent)) {

				// check if intent required any further action
				if (

					($intent->status == 'requires_action' || $intent->status == 'requires_confirmation')
				) {
					// Tell the client to handle the action
					$json = array(
						'requires_action' => true,
						'payment_intent_client_secret' => $intent->client_secret
					);
				}

				// payment is success, no further action required
				else if ($intent->status == 'succeeded') {
					// The payment didn’t need any additional actions and completed!
					// Handle post-payment fulfillment

					// charge this customer and update order accordingly
					$charge_result = $this->chargeAndUpdateOrder($intent, $order_info);

					// set redirect to success or failure page as per payment charge status
					if ($charge_result) {
						$json = array('success' => $this->url->link('checkout/success', '', true));
					} else {
						$json = array('error' => 'Payment could not be completed. Please try again.');
					}

				} else {
					// Unexpected Payment Intent Status
					$json = array('error' => 'Invalid PaymentIntent Status (' . $intent->status . ')');
				}
			}

		} catch (\Stripe\Error\Base $e) {
			// Display error on client
			$json = array('error' => $e->getMessage());
			$this->log->write($e->getFile() . ' ' . $e->getLine() . ' ' . "Exception caught in confirm() method" . '  ' . $e->getMessage());

		} catch (\Exception $e) {
			$json = array('error' => $e->getMessage());
			$this->log->write($e->getFile() . ' ' . $e->getLine() . ' ' . "Exception caught in confirm() method" . '  ' . $e->getMessage());
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
		return;
	}


	/**
	 * this method charges the source and update order accordingly
	 * @returns boolean
	 */
	private function chargeAndUpdateOrder($intent, $order_info)
	{
		$this->load->model('extension/stripe/payment/stripe');
 
		if (isset($intent->id)) {

			// insert stripe order
		 
			$this->load->model('checkout/order');
			$charge_data = [
				'ident_id' =>  $intent->id ,
				'charge_id' => 	$intent->latest_charge,
				'status' => $intent->status,
			];
		 
	 

			$this->model_extension_stripe_payment_stripe->updatePaymentData($order_info['order_id'],$charge_data);
			// update order statatus & addOrderHistory
			// paid will be true if the charge succeeded, or was successfully authorized for later capture.
			$message = "Transaction Status: " . $intent->status;
			if ($intent->status == "succeeded") {
	 
				$this->model_checkout_order->addHistory($order_info['order_id'], $this->config->get('payment_stripe_order_success_status_id'), $message, true);
			} else {
				$this->model_checkout_order->addHistory($order_info['order_id'], $this->config->get('payment_stripe_order_failed_status_id'), $message, true);
			}


			//if subscription

			if (!empty($this->session->data['subscription_checkout']) && $this->session->data['subscription_checkout']['order_id'] == $order_info['order_id']) {
				
				$subscription = $this->model_extension_stripe_payment_stripe->getStripe()->subscriptions->retrieve($this->session->data['subscription_checkout']['stripe_subscription_id']);

				$this->model_checkout_subscription->addHistory($order_info['order_id'], $this->config->get('payment_stripe_subscription_failed_status_id'), $subscription->status, true);

				$order_products = $this->model_checkout_order->getProducts($order_info['order_id']);

				$product_id = $order_products[key($order_products)]['order_product_id'];
				$subscription_data = $this->model_checkout_subscription->getSubscriptionByOrderProductId($this->session->data['order_id'], $product_id);

				$subscription_data['payment_id'] = $subscription->id;
				$subscription_data['date_next'] = date("Y-m-d H:i:s", $subscription->current_period_end);
	 
				//Add history to subscription

				// Update subscription payment_id (sub id)
				$this->model_checkout_subscription->editSubscription($subscription_data['subscription_id'], $subscription_data);
				$this->model_extension_stripe_payment_stripe->installLocalSubscription($subscription_data['subscription_id'], $subscription);

				$order_products = $this->model_checkout_order->getProducts($order_info['order_id']);
				$product_id = $order_products[key($order_products)]['order_product_id'];
				$subscription_data = $this->model_checkout_subscription->getSubscriptionByOrderProductId($this->session->data['order_id'], $product_id);
				if ($subscription->status == "active") {
					$this->load->controller('extension/stripe/cron/subscriptions.subscription_setup', $subscription_data['subscription_id']);
					$this->model_checkout_subscription->addHistory(
						$subscription_data['subscription_id'],
						$this->config->get('payment_stripe_subscription_success_status_id'),
						'New subscription purchased and installed',
						true
					);
				} else {
					$this->model_checkout_subscription->addHistory(
						$subscription_data['subscription_id'],
						$this->config->get('payment_stripe_subscription_failed_status_id'),
						'A purchased subscription returns no active status from stripe, use subscription id to investigate in Stripe Dashboard: ' . $subscription->id,
						true
					);
				}
			}

			// charge completed successfully
			return true;

		} else {
			// charge could not be completed
			return false;
		}
	}

	private function initStripe()
	{

		require_once(DIR_EXTENSION . 'stripe/system/vendor/autoload.php');
		if ($this->config->get('payment_stripe_environment') == 'live' || (isset($this->request->request['livemode']) && $this->request->request['livemode'] == "true")) {
			$stripe_secret_key = $this->config->get('payment_stripe_live_secret_key');
		} else {
			$stripe_secret_key = $this->config->get('payment_stripe_test_secret_key');
		}

		if ($stripe_secret_key != '' && $stripe_secret_key != null) {
			\Stripe\Stripe::setApiKey($stripe_secret_key);
			return true;
		}

		$this->load->model('extension/stripe/payment/stripe');


	}

}