<?php

namespace Opencart\Catalog\Controller\Extension\Stripe\Payment;
use Exception;  
class Stripe extends \Opencart\System\Engine\Controller   {

	public function index() {

		$this->load->language('extension/stripe/payment/stripe');

		if ($this->request->server['HTTPS']) {
			$data['store_url'] = HTTP_SERVER;
		} else {
			$data['store_url'] = HTTP_SERVER;
		}
 
		if($this->config->get('payment_stripe_environment') == 'live') {
			$data['payment_stripe_public_key'] = $this->config->get('payment_stripe_live_public_key');
			$data['test_mode'] = false;
		} else {
			$data['payment_stripe_public_key'] = $this->config->get('payment_stripe_test_public_key');
			$data['test_mode'] = true;
		}

		// get order info
		$this->load->model('checkout/order');
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		
		// we will use this owner info to send Stripe from client side
		$data['billing_details'] = array(
										'name' => $order_info['payment_firstname'] . ' ' . $order_info['payment_lastname'],
										'email' => $order_info['email'],
										'address' => array(
											'line1'	=> $order_info['payment_address_1'],
											'line2'	=> $order_info['payment_phone'],
											'city'	=> $order_info['payment_city'],
											'state'	=> $order_info['payment_zone'],
											'postal_code' => $order_info['payment_postcode'],
											'country' => $order_info['payment_iso_code_2']
										)
									);

		// get current language code for locale, this will let Stripe JS elements to know which languages to use for its own elements
		$data['locale'] = $this->language->get('code');

		// handles the XHR request for client side
		$data['action'] = $this->url->link('extension/stripe/payment/stripe.confirm', 'format=json', true);

		return $this->load->view('extension/stripe/payment/stripe', $data);
	}

	public function confirm(){
		if ($this->request->server['HTTPS']) {
			$data['store_url'] = HTTP_SERVER;
		} else {
			$data['store_url'] = HTTP_SERVER;
		}

		$this->load->model('extension/stripe/payment/stripe');
		$json = array('error' => 'Server did not get valid request to process');

		try{

			if(!isset($this->session->data['order_id'])){
				$this->model_extension_stripe_payment_stripe->log(__FILE__, __LINE__, "Session Data ", $this->session->data);
				throw new Exception("Your order seems lost in session. We did not charge your payment. Please contact administrator for more information.");
			}

			// retrieve json from POST body
			$json_str = file_get_contents('php://input');
			$json_obj = json_decode($json_str);
			
			// load stripe libraries
			$this->initStripe();

			// get order info
			$this->load->model('checkout/order');
			$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

			if(empty($order_info)){
				$this->model_extension_stripe_payment_stripe->log(__FILE__, __LINE__, "Order Data ", $this->order_info);
				throw new Exception("Your order seems lost before payment. We did not charge your payment. Please contact administrator for more information.");
			}

			// Create the PaymentIntent
			if (isset($json_obj->payment_method_id)) {

				// amount to charge for the order
				$amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);

				// multiple by 100 to get value in cents
				$amount = $amount * 100;

				// Create the PaymentIntent
				$intent = \Stripe\PaymentIntent::create(array(
					'payment_method' => $json_obj->payment_method_id,
					'amount' => $amount,
					'return_url' =>  rtrim($data['store_url'], '/') . "/?route=checkout/success",
					'currency' => strtolower($order_info['currency_code']),
					'confirmation_method' => 'manual',
					'confirm' => true,
					'description' => "Charge for Order #".$order_info['order_id'],
					'shipping' => array(
										'name' => $order_info['shipping_firstname'] . ' ' . $order_info['shipping_lastname'],
										'address' => array(
											'line1'	=> $order_info['shipping_address_1'],
											'line2'	=> $order_info['payment_phone'],
											'city'	=> $order_info['shipping_city'],
											'state'	=> $order_info['shipping_zone'],
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
				));
			}

			// else if payment intent id sent from client side (stripe UI)
			// then retrieve the intent and charge it
			else if (isset($json_obj->payment_intent_id)) {
				$intent = \Stripe\PaymentIntent::retrieve(
					 $json_obj->payment_intent_id
				);
				$intent->confirm();
			}

			if(!empty($intent)) {

				// check if intent required any further action
				if (($intent->status == 'requires_action' || $intent->status == 'requires_source_action') &&
				$intent->next_action->type == 'use_stripe_sdk') {
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
					if($charge_result) {
						$json = array('success' => $this->url->link('checkout/success', '', true));
					} else {
						$json = array('error' => 'Payment could not be completed. Please try again.');
					}

				} else {
					// Unexpected Payment Intent Status
					$json = array('error' => 'Invalid PaymentIntent Status ('.$intent->status.')');
				}
			}

		} catch (\Stripe\Error\Base $e) {
			// Display error on client
			$json = array('error' => $e->getMessage());
			
			$this->model_extension_stripe_payment_stripe->log($e->getFile(), $e->getLine(), "Stripe Exception caught in confirm() method", $e->getMessage());

		} catch (\Exception $e) {
			$json = array('error' => $e->getMessage());

			$this->model_extension_stripe_payment_stripe->log($e->getFile(), $e->getLine(), "Exception caught in confirm() method", $e->getMessage());

		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
		return;
	}


	/**
	 * this method charges the source and update order accordingly
	 * @returns boolean
	 */
	private function chargeAndUpdateOrder($intent, $order_info){

		if(isset($intent->id)) {

			// insert stripe order
			$message = 'Payment Intent ID: '.$intent->id. PHP_EOL .'Status: '. $intent->status;

			$this->load->model('checkout/order');

			// update order statatus & addOrderHistory
			// paid will be true if the charge succeeded, or was successfully authorized for later capture.
			if($intent->status == "succeeded") {
				//      $this->model_checkout_order->addHistory($order_id, $this->config->get('payment_simplifycommerce_order_status_id'), '', true);
				$this->model_checkout_order->addHistory($order_info['order_id'], $this->config->get('payment_stripe_order_success_status_id'), $message, false);
			} else {
				$this->model_checkout_order->addHistory($order_info['order_id'], $this->config->get('payment_stripe_order_failed_status_id'), $message, false);
			}
			
			// charge completed successfully
			return true;
		
		} else {
			// charge could not be completed
			return false;
		}
	}

	private function initStripe() {
		 
		require_once(DIR_EXTENSION . 'stripe/system/vendor/autoload.php');
		if($this->config->get('payment_stripe_environment') == 'live' || (isset($this->request->request['livemode']) && $this->request->request['livemode'] == "true")) {
			$stripe_secret_key = $this->config->get('payment_stripe_live_secret_key');
		} else {
			$stripe_secret_key = $this->config->get('payment_stripe_test_secret_key');
		}

		if($stripe_secret_key != '' && $stripe_secret_key != null) {
			\Stripe\Stripe::setApiKey($stripe_secret_key);
			return true;
		}

		$this->load->model('extension/stripe/payment/stripe');
		$this->model_extension_stripe_payment_stripe->log(__FILE__, __LINE__, "Unable to load stripe libraries");
		throw new Exception("Unable to load stripe libraries.");
		// return false;
	}
}