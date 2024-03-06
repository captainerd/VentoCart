<?php

namespace Opencart\Admin\Controller\Extension\Stripe\Payment;
require_once(DIR_EXTENSION . 'stripe/system/vendor/autoload.php');
class  Stripe extends \Opencart\System\Engine\Controller
{

	public function install_webhooks(): void
	{
		$this->getStripe()->webhookEndpoints->create([
			'enabled_events' => [
				'customer.subscription.paused', 
				'customer.subscription.deleted',
				'customer.subscription.resumed',
				'invoice.paid',

			
			],
			'url' => 'https://example.com/my/webhook/endpoint',
		  ]);

	}
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
 
	private $error = array();

	public function subscription() {
		$subscription_stripe = $this->session->data['customer_subscription']['tracking'];
		$this->load->language('extension/stripe/payment/stripe');
		$current_sub = $this->getStripe()->subscriptions->retrieve($subscription_stripe,[]);
		
		$current_sub['payment_method'] = $this->getStripe()->paymentMethods->retrieve($current_sub['default_payment_method']);
		$current_sub['latest_invoice'] = $this->getStripe()->invoices->retrieve($current_sub['latest_invoice']);
	
		// Convert Unix timestamps to readable timestamps
		$current_sub['current_period_end'] = date('Y-m-d H:i:s', $current_sub['current_period_end']);
		$current_sub['current_period_start'] = date('Y-m-d H:i:s', $current_sub['current_period_start']);
		$current_sub['latest_invoice']['created'] = date('Y-m-d H:i:s', $current_sub['latest_invoice']['created']);
		$data['full'] = $current_sub;
	
		// Prepare data for the template
		$data['status'] = $current_sub['status'];
		$data['current_period_end'] = $current_sub['current_period_end'];
		$data['current_period_start'] = $current_sub['current_period_start'];
		$data['latest_invoice'] = $current_sub['latest_invoice'];
		$data['payment_method'] = [
			'card_type' => ucfirst($current_sub['payment_method']['card']['funding']),
			'card_brand' => $current_sub['payment_method']['card']['display_brand'],
			'card_name' => $current_sub['payment_method']['billing_details']['name'],
			'last_four_digits' => substr($current_sub['payment_method']['card']['last4'], -4)
		];
	
		// Load the view
		return $this->load->view('extension/stripe/payment/subscription_details', $data);
	}
	public function index() {
 
		$this->load->language('extension/stripe/payment/stripe');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_stripe', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/stripe/payment/stripe', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		$this->load->model('localisation/order_status');
		$this->load->model('localisation/subscription_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		$data['subscription_statuses'] = $this->model_localisation_subscription_status->getSubscriptionStatuses();
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);
 
 
		$data['action'] = $this->url->link('extension/stripe/payment/stripe', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		if (isset($this->request->post['payment_stripe_environment'])) {
			$data['payment_stripe_environment'] = $this->request->post['payment_stripe_environment'];
		} elseif ($this->config->has('payment_stripe_environment')) {
			$data['payment_stripe_environment'] = $this->config->get('payment_stripe_environment');
		} else {
			$data['payment_stripe_environment'] = 'test';
		}
		if (isset($this->request->post['payment_stripe_test_public_key'])) {
			$data['payment_stripe_test_public_key'] = $this->request->post['payment_stripe_test_public_key'];
		} else if($this->config->has('payment_stripe_test_public_key')){
			$data['payment_stripe_test_public_key'] = $this->config->get('payment_stripe_test_public_key');
		} else {
			$data['payment_stripe_test_public_key'] = '';
		}

		if (isset($this->request->post['payment_stripe_test_secret_key'])) {
			$data['payment_stripe_test_secret_key'] = $this->request->post['payment_stripe_test_secret_key'];
		} else if($this->config->has('payment_stripe_test_secret_key')){
			$data['payment_stripe_test_secret_key'] = $this->config->get('payment_stripe_test_secret_key');
		} else {
			$data['payment_stripe_test_secret_key'] = '';
		}

		if (isset($this->request->post['payment_stripe_live_public_key'])) {
			$data['payment_stripe_live_public_key'] = $this->request->post['payment_stripe_live_public_key'];
		} else if($this->config->has('payment_stripe_live_public_key')){
			$data['payment_stripe_live_public_key'] = $this->config->get('payment_stripe_live_public_key');
		} else {
			$data['payment_stripe_live_public_key'] = '';
		}

		if (isset($this->request->post['payment_stripe_live_secret_key'])) {
			$data['payment_stripe_live_secret_key'] = $this->request->post['payment_stripe_live_secret_key'];
		} else if($this->config->has('payment_stripe_live_secret_key')){
			$data['payment_stripe_live_secret_key'] = $this->config->get('payment_stripe_live_secret_key');
		} else {
			$data['payment_stripe_live_secret_key'] = '';
		}

		if (isset($this->request->post['payment_stripe_order_success_status_id'])) {
			$data['payment_stripe_order_success_status_id'] = $this->request->post['payment_stripe_order_success_status_id'];
		} else if($this->config->has('payment_stripe_order_success_status_id')){
			$data['payment_stripe_order_success_status_id'] = $this->config->get('payment_stripe_order_success_status_id');
		} else {
			$data['payment_stripe_order_success_status_id'] = '';
		}

		if (isset($this->request->post['payment_stripe_order_failed_status_id'])) {
			$data['payment_stripe_order_failed_status_id'] = $this->request->post['payment_stripe_order_failed_status_id'];
		} else if($this->config->has('payment_stripe_order_failed_status_id')){
			$data['payment_stripe_order_failed_status_id'] = $this->config->get('payment_stripe_order_failed_status_id');
		} else {
			$data['payment_stripe_order_failed_status_id'] = '';
		}

		if (isset($this->request->post['payment_stripe_subscription_success_status_id'])) {
			$data['payment_stripe_subscription_success_status_id'] = $this->request->post['payment_stripe_subscription_success_status_id'];
		} elseif ($this->config->has('payment_stripe_subscription_success_status_id')) {
			$data['payment_stripe_subscription_success_status_id'] = $this->config->get('payment_stripe_subscription_success_status_id');
		} else {
			$data['payment_stripe_subscription_success_status_id'] = '';
		}
		
		if (isset($this->request->post['payment_stripe_subscription_failed_status_id'])) {
			$data['payment_stripe_subscription_failed_status_id'] = $this->request->post['payment_stripe_subscription_failed_status_id'];
		} elseif ($this->config->has('payment_stripe_subscription_failed_status_id')) {
			$data['payment_stripe_subscription_failed_status_id'] = $this->config->get('payment_stripe_subscription_failed_status_id');
		} else {
			$data['payment_stripe_subscription_failed_status_id'] = '';
		}

		if (isset($this->request->post['payment_stripe_status'])) {
			$data['payment_stripe_status'] = $this->request->post['payment_stripe_status'];
		} else if($this->config->has('payment_stripe_status')){
			$data['payment_stripe_status'] = (int)$this->config->get('payment_stripe_status');
		} else {
			$data['payment_stripe_status'] = 0;
		}

		if (isset($this->request->post['payment_stripe_sort_order'])) {
			$data['payment_stripe_sort_order'] = $this->request->post['payment_stripe_sort_order'];
		} else if($this->config->has('payment_stripe_sort_order')){
			$data['payment_stripe_sort_order'] = (int)$this->config->get('payment_stripe_sort_order');
		} else {
			$data['payment_stripe_sort_order'] = 0;
		}

		if (isset($this->request->post['payment_stripe_debug'])) {
			$data['payment_stripe_debug'] = $this->request->post['payment_stripe_debug'];
		} else if($this->config->has('payment_stripe_debug')){
			$data['payment_stripe_debug'] = (int)$this->config->get('payment_stripe_debug');
		} else {
			$data['payment_stripe_debug'] = 0;
		}

		// populate errors
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->error['test_public_key'])) {
			$data['error_test_public_key'] = $this->error['test_public_key'];
		} else {
			$data['error_test_public_key'] = '';
		}

		if (isset($this->error['test_secret_key'])) {
			$data['error_test_secret_key'] = $this->error['test_secret_key'];
		} else {
			$data['error_test_secret_key'] = '';
		}

		if (isset($this->error['live_public_key'])) {
			$data['error_live_public_key'] = $this->error['live_public_key'];
		} else {
			$data['error_live_public_key'] = '';
		}

		if (isset($this->error['live_secret_key'])) {
			$data['error_live_secret_key'] = $this->error['live_secret_key'];
		} else {
			$data['error_live_secret_key'] = '';
		}

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
//extension/stripe/payment/stripe
		$this->response->setOutput($this->load->view('extension/stripe/payment/stripe', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/stripe/payment/stripe')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if(isset($this->request->post['payment_stripe_environment'])){

			if($this->request->post['payment_stripe_environment'] == 'test'){

				if(!isset($this->request->post['payment_stripe_test_public_key']) || trim($this->request->post['payment_stripe_test_public_key']) == ''){
					$this->error['test_public_key'] = $this->language->get('error_test_public_key');
				}
				if(!isset($this->request->post['payment_stripe_test_secret_key']) || trim($this->request->post['payment_stripe_test_secret_key']) == ''){
					$this->error['test_secret_key'] = $this->language->get('error_test_secret_key');
				}
			
			} else {

				if(!isset($this->request->post['payment_stripe_live_public_key']) || trim($this->request->post['payment_stripe_live_public_key']) == ''){
					$this->error['live_public_key'] = $this->language->get('error_live_public_key');
				}
				if(!isset($this->request->post['payment_stripe_live_secret_key']) || trim($this->request->post['payment_stripe_live_secret_key']) == ''){
					$this->error['live_secret_key'] = $this->language->get('error_live_secret_key');
				}
			}
		} else {
			$this->error['environment'] = $this->language->get('error_environment');
		}

		return !$this->error;
	}
}
