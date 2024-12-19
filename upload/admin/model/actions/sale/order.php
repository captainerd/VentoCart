<?php
namespace Ventocart\Admin\Model\Actions\Sale;
/**
 * Class Order
 *
 * @package Ventocart\Admin\Model\Action\Sale
 */
class Order extends \Ventocart\System\Engine\Model
{
	/*
	 * Loads order info
	 */
	/**
	 * @return void
	 */



	public function load(): array
	{
		$this->load->language('actions/sale/order');
		$this->load->bridge('Catalog');


		$json = [];

		if (isset($this->request->get['order_id'])) {
			$order_id = (int) $this->request->get['order_id'];
		} else {
			$order_id = 0;
		}


		$this->load->model('checkout/order');


		$order_info = $this->model_checkout_order->getOrder($order_id);

		if (!$order_info) {
			$json['error'] = $this->language->get('error_order');
		}

		if (!$json) {
			$this->session->data['order_id'] = $order_id;

			// Customer Details
			$this->session->data['customer'] = [
				'customer_id' => $order_info['customer_id'],
				'customer_group_id' => $order_info['customer_group_id'],
				'firstname' => $order_info['firstname'],
				'lastname' => $order_info['lastname'],
				'email' => $order_info['email'],
				'telephone' => $order_info['telephone'],
				'custom_field' => $order_info['custom_field']
			];

			// Payment Details

			$this->session->data['payment_address'] = [
				'address_id' => $order_info['payment_address_id'],
				'firstname' => $order_info['payment_firstname'],
				'lastname' => $order_info['payment_lastname'],
				'company' => $order_info['payment_company'],
				'address_1' => $order_info['payment_address_1'],
				'phone' => $order_info['payment_phone'],
				'postcode' => $order_info['payment_postcode'],
				'city' => $order_info['payment_city'],
				'zone_id' => $order_info['payment_zone_id'],
				'zone' => $order_info['payment_zone'],
				'zone_code' => $order_info['payment_zone_code'],
				'country_id' => $order_info['payment_country_id'],
				'country' => $order_info['payment_country'],
				'iso_code_2' => $order_info['payment_iso_code_2'],
				'iso_code_3' => $order_info['payment_iso_code_3'],
				'address_format' => $order_info['payment_address_format'],
				'custom_field' => $order_info['payment_custom_field']
			];



			$this->session->data['payment_method'] = $order_info['payment_method'];

			if ($order_info['shipping_method']) {
				$this->session->data['shipping_address'] = [
					'address_id' => $order_info['shipping_address_id'],
					'firstname' => $order_info['shipping_firstname'],
					'lastname' => $order_info['shipping_lastname'],
					'company' => $order_info['shipping_company'],
					'address_1' => $order_info['shipping_address_1'],
					'phone' => $order_info['shipping_phone'],
					'postcode' => $order_info['shipping_postcode'],
					'city' => $order_info['shipping_city'],
					'zone_id' => $order_info['shipping_zone_id'],
					'zone' => $order_info['shipping_zone'],
					'zone_code' => $order_info['shipping_zone_code'],
					'country_id' => $order_info['shipping_country_id'],
					'country' => $order_info['shipping_country'],
					'iso_code_2' => $order_info['shipping_iso_code_2'],
					'iso_code_3' => $order_info['shipping_iso_code_3'],
					'address_format' => $order_info['shipping_address_format'],
					'custom_field' => $order_info['shipping_custom_field']
				];

				$this->session->data['shipping_method'] = $order_info['shipping_method'];
			}

			if ($order_info['comment']) {
				$this->session->data['comment'] = $order_info['comment'];
			}

			if ($order_info['currency_code']) {
				$this->session->data['currency'] = $order_info['currency_code'];
			}

			$products = $this->model_checkout_order->getProducts($order_id);

			foreach ($products as $product) {
				$option_data = [];

				$options = $this->model_checkout_order->getOptions($order_id, $product['order_product_id']);

				foreach ($options as $option) {
					if ($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'file' || $option['type'] == 'date' || $option['type'] == 'datetime' || $option['type'] == 'time') {
						$option_data[$option['product_option_id']] = $option['value'];
					} elseif ($option['type'] == 'select' || $option['type'] == 'radio') {
						$option_data[$option['product_option_id']] = $option['product_option_id'];
					} elseif ($option['type'] == 'checkbox') {
						$option_data[$option['product_option_id']][] = $option['product_option_id'];
					}
				}

				$subscription_info = $this->model_checkout_order->getSubscription($order_id, $product['order_product_id']);

				if ($subscription_info) {
					$subscription_plan_id = $subscription_info['subscription_plan_id'];
				} else {
					$subscription_plan_id = 0;
				}

				$cartid = $this->cart->add($product['product_id'], (int) $product['quantity'], $option_data, $subscription_plan_id, true, $product['price'], $product['type']);
				$this->session->data['virtual_product'][$cartid] = $product;

			}

			if ($order_info['affiliate_id']) {
				$this->session->data['affiliate_id'] = $order_info['affiliate_id'];
			}

			// Coupon, Reward
			$order_totals = $this->model_checkout_order->getTotals($order_id);

			foreach ($order_totals as $order_total) {
				// If coupon or reward points
				$start = strpos($order_total['title'], '(') + 1;
				$end = strrpos($order_total['title'], ')');

				if ($start && $end) {
					$this->session->data[$order_total['code']] = substr($order_total['title'], $start, $end - $start);
				}
			}

			$json['success'] = $this->language->get('text_success');
		}

		$this->bridge->kill();

		return $json;
	}

	/**
	 * @return void
	 */
	public function comment(): array
	{
		$this->load->language('actions/sale/order');

		$json = [];

		if (!isset($this->request->post['comment'])) {
			$json['error'] = $this->language->get('error_comment');
		}

		if (!$json) {
			$this->session->data['comment'] = $this->request->post['comment'];

			$json['success'] = $this->language->get('text_success');
		}

		return $json;
	}

	/**
	 * @return void
	 */
	public function confirm(): array
	{
		$this->load->language('actions/sale/order');

		$this->load->bridge('Catalog');
		$json = [];


		// Validate cart has products and has stock.

		if (($this->cart->hasProducts())) {
			if (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout')) {
				$json['error']['stock'] = $this->language->get('error_stock');
			}
		} else {
			$json['error']['product'] = $this->language->get('error_product');
		}



		// Customer
		if (!isset($this->session->data['customer'])) {
			$json['error']['customer'] = $this->language->get('error_customer');
		}

		// Payment Address
		if ($this->config->get('config_checkout_payment_address') && !isset($this->session->data['payment_address'])) {
			$json['error']['payment_address'] = $this->language->get('error_payment_address');
		}

		// Shipping
		if ($this->cart->hasShipping()) {
			// Shipping Address
			if (!isset($this->session->data['shipping_address'])) {
				$json['error']['shipping_address'] = $this->language->get('error_shipping_address');
			}

			// Validate shipping method
			if (!isset($this->session->data['shipping_method'])) {
				$json['error']['shipping_method'] = $this->language->get('error_shipping_method');
			}
		} else {
			unset($this->session->data['shipping_address']);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
		}

		// Payment Method
		if (empty($this->session->data['payment_method'])) {
			$json['error']['payment_method'] = $this->language->get('error_payment_method');
		}

		if (!$json) {
			$order_data = [];

			// Store Details
			$order_data['invoice_prefix'] = $this->config->get('config_invoice_prefix');

			$order_data['store_id'] = $this->config->get('config_store_id');
			$order_data['store_name'] = $this->config->get('config_name');
			$order_data['store_url'] = $this->config->get('config_url');

			// Customer Details
			$order_data['customer_id'] = $this->session->data['customer']['customer_id'];
			$order_data['customer_group_id'] = $this->session->data['customer']['customer_group_id'];
			$order_data['firstname'] = $this->session->data['customer']['firstname'];
			$order_data['lastname'] = $this->session->data['customer']['lastname'];
			$order_data['email'] = $this->session->data['customer']['email'];
			$order_data['telephone'] = $this->session->data['customer']['telephone'];
			$order_data['custom_field'] = $this->session->data['customer']['custom_field'];

			// Payment Details
			$order_data['payment_firstname'] = $this->session->data['payment_address']['firstname'];
			$order_data['payment_address_id'] = $this->session->data['payment_address']['address_id'];
			$order_data['payment_lastname'] = $this->session->data['payment_address']['lastname'];
			$order_data['payment_company'] = $this->session->data['payment_address']['company'];
			$order_data['payment_address_1'] = $this->session->data['payment_address']['address_1'];
			$order_data['payment_phone'] = $this->session->data['payment_address']['phone'];
			$order_data['payment_city'] = $this->session->data['payment_address']['city'];
			$order_data['payment_postcode'] = $this->session->data['payment_address']['postcode'];
			$order_data['payment_zone'] = $this->session->data['payment_address']['zone'];
			$order_data['payment_zone_id'] = $this->session->data['payment_address']['zone_id'];
			$order_data['payment_country'] = $this->session->data['payment_address']['country'];
			$order_data['payment_country_id'] = $this->session->data['payment_address']['country_id'];
			$order_data['payment_address_format'] = $this->session->data['payment_address']['address_format'];
			$order_data['payment_custom_field'] = isset($this->session->data['payment_address']['custom_field']) ? $this->session->data['payment_address']['custom_field'] : [];


			$order_data['payment_method'] = $this->session->data['payment_method'];

			// Shipping Details
			if ($this->cart->hasShipping()) {
				$order_data['shipping_address_id'] = $this->session->data['shipping_address']['address_id'];
				$order_data['shipping_firstname'] = $this->session->data['shipping_address']['firstname'];
				$order_data['shipping_lastname'] = $this->session->data['shipping_address']['lastname'];
				$order_data['shipping_company'] = $this->session->data['shipping_address']['company'];
				$order_data['shipping_address_1'] = $this->session->data['shipping_address']['address_1'];
				$order_data['shipping_phone'] = $this->session->data['shipping_address']['phone'];
				$order_data['shipping_city'] = $this->session->data['shipping_address']['city'];
				$order_data['shipping_postcode'] = $this->session->data['shipping_address']['postcode'];
				$order_data['shipping_zone'] = $this->session->data['shipping_address']['zone'];
				$order_data['shipping_zone_id'] = $this->session->data['shipping_address']['zone_id'];
				$order_data['shipping_country'] = $this->session->data['shipping_address']['country'];
				$order_data['shipping_country_id'] = $this->session->data['shipping_address']['country_id'];
				$order_data['shipping_address_format'] = $this->session->data['shipping_address']['address_format'];
				$order_data['shipping_custom_field'] = isset($this->session->data['shipping_address']['custom_field']) ? $this->session->data['shipping_address']['custom_field'] : [];

				$order_data['shipping_method'] = $this->session->data['shipping_method'];
			} else {
				$order_data['shipping_address_id'] = 0;
				$order_data['shipping_firstname'] = '';
				$order_data['shipping_lastname'] = '';
				$order_data['shipping_company'] = '';
				$order_data['shipping_address_1'] = '';
				$order_data['shipping_phone'] = '';
				$order_data['shipping_city'] = '';
				$order_data['shipping_postcode'] = '';
				$order_data['shipping_zone'] = '';
				$order_data['shipping_zone_id'] = 0;
				$order_data['shipping_country'] = '';
				$order_data['shipping_country_id'] = 0;
				$order_data['shipping_address_format'] = '';
				$order_data['shipping_custom_field'] = [];

				$order_data['shipping_method'] = [];
			}

			$points = 0;

			// Products
			$order_data['products'] = [];

			foreach ($this->cart->getProducts() as $product) {
				$option_data = [];

				foreach ($product['option'] as $option) {
					$option_data[] = [
						'product_option_id' => $option['product_option_id'],
						'name' => $option['name'],
						'value' => $option['value'],
						'type' => $option['type']
					];
				}

				$subscription_data = [];

				if ($product['subscription']) {
					$subscription_data = [
						'subscription_plan_id' => $product['subscription']['subscription_plan_id'],
						'name' => $product['subscription']['name'],
						'trial_frequency' => $product['subscription']['trial_frequency'],
						'trial_cycle' => $product['subscription']['trial_cycle'],
						'trial_duration' => $product['subscription']['trial_duration'],
						'trial_remaining' => $product['subscription']['trial_remaining'],
						'trial_status' => $product['subscription']['trial_status'],
						'frequency' => $product['subscription']['frequency'],
						'cycle' => $product['subscription']['cycle'],
						'duration' => $product['subscription']['duration']
					];
				}

				$order_data['products'][] = [
					'product_id' => $product['product_id'],
					'variation_id' => $product['variation_id'],
					'name' => $product['name'],
					'sku' => $product['sku'],
					'type' => $product['type'],
					'option' => $option_data,
					'subscription' => $subscription_data,
					'download' => $product['download'],
					'quantity' => $product['quantity'],
					'subtract' => $product['subtract'],
					'price' => $product['price'],
					'total' => $product['total'],
					'tax' => $this->tax->getTax($product['price'], $product['tax_class_id']),
					'reward' => $product['reward']
				];

				$points += $product['reward'];
			}



			if (isset($this->session->data['comment'])) {
				$order_data['comment'] = $this->session->data['comment'];
			} else {
				$order_data['comment'] = '';
			}

			// Order Totals
			$totals = [];
			$taxes = $this->cart->getTaxes();
			$total = 0;



			$this->load->model('checkout/cart');

			[$totals, $taxes, $total] = $this->model_checkout_cart->getTotals($totals, $taxes, $total);

			$total_data = [
				'totals' => $totals,
				'taxes' => $taxes,
				'total' => $total
			];

			$order_data = array_merge($order_data, $total_data);

			$order_data['affiliate_id'] = 0;
			$order_data['commission'] = 0;
			$order_data['marketing_id'] = 0;
			$order_data['tracking'] = '';

			if (isset($this->session->data['affiliate_id'])) {

				$subtotal = $this->cart->getSubTotal();

				// Affiliate

				$this->load->model('account/affiliate');


				$affiliate_info = $this->model_account_affiliate->getAffiliate($this->session->data['affiliate_id']);

				if ($affiliate_info) {
					$order_data['affiliate_id'] = $affiliate_info['customer_id'];
					$order_data['commission'] = ($subtotal / 100) * $affiliate_info['commission'];
					$order_data['tracking'] = $affiliate_info['tracking'];
				}
			}

			// We use session to store language code for API access
			$order_data['language_id'] = $this->config->get('config_language_id');
			$order_data['language_code'] = $this->config->get('config_language');

			$order_data['currency_id'] = $this->currency->getId($this->session->data['currency']);
			$order_data['currency_code'] = $this->session->data['currency'];
			$order_data['currency_value'] = $this->currency->getValue($this->session->data['currency']);

			$order_data['ip'] = $this->request->server['REMOTE_ADDR'];

			if (!empty($this->request->server['HTTP_X_FORWARDED_FOR'])) {
				$order_data['forwarded_ip'] = $this->request->server['HTTP_X_FORWARDED_FOR'];
			} elseif (!empty($this->request->server['HTTP_CLIENT_IP'])) {
				$order_data['forwarded_ip'] = $this->request->server['HTTP_CLIENT_IP'];
			} else {
				$order_data['forwarded_ip'] = '';
			}

			if (isset($this->request->server['HTTP_USER_AGENT'])) {
				$order_data['user_agent'] = $this->request->server['HTTP_USER_AGENT'];
			} else {
				$order_data['user_agent'] = '';
			}

			if (isset($this->request->server['HTTP_ACCEPT_LANGUAGE'])) {
				$order_data['accept_language'] = $this->request->server['HTTP_ACCEPT_LANGUAGE'];
			} else {
				$order_data['accept_language'] = '';
			}
			$this->load->model('checkout/order');


			if (!isset($this->session->data['order_id'])) {

				$this->session->data['order_id'] = $this->model_checkout_order->addOrder($order_data);
			} else {

				$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

				if ($order_info) {

					$this->model_checkout_order->editOrder($this->session->data['order_id'], $order_data);

				}
			}

			$json['order_id'] = $this->session->data['order_id'];

			// Set the order history
			if (isset($this->request->post['order_status_id'])) {
				$order_status_id = (int) $this->request->post['order_status_id'];
			} else {
				$order_status_id = $this->config->get('config_order_status_id');
			}
			$comment = $this->bridgeLanguage->get('text_admin_order_edit');
			$this->model_checkout_order->addHistory($json['order_id'], $order_status_id, $comment);

			$this->bridge->kill();

			$json['success'] = $this->language->get('text_success');

			$json['points'] = $points;

			if (isset($order_data['affiliate_id'])) {
				$json['commission'] = $this->currency->format($order_data['commission'], $this->config->get('config_currency'));
			}
		}

		return $json;
	}

	/**
	 * @return void
	 */
	public function delete(): array
	{
		$this->load->language('actions/sale/order');
		$this->load->bridge('Catalog');
		$this->load->model('checkout/order');

		$json = [];

		$selected = [];

		if (isset($this->request->post['selected'])) {
			$selected = $this->request->post['selected'];
		}

		if (isset($this->request->get['order_id'])) {
			$selected[] = (int) $this->request->get['order_id'];
		}

		foreach ($selected as $order_id) {


			$order_info = $this->model_checkout_order->getOrder($order_id);

			if ($order_info) {
				$this->model_checkout_order->deleteOrder($order_id);
			}
		}
		$this->load->bridge->kill();
		$json['success'] = $this->language->get('text_success');

		return $json;
	}

	/**
	 * @return void
	 */
	public function addHistory(): array
	{

		$this->load->language('actions/sale/order');
		$this->load->bridge('Catalog');
		$json = [];

		// Add keys for missing post vars
		$keys = [
			'order_id',
			'order_status_id',
			'comment',
			'notify',
			'override'
		];

		foreach ($keys as $key) {
			if (!isset($this->request->post[$key])) {
				$this->request->post[$key] = '';
			}
		}
		$this->load->model('checkout/order');


		$order_info = $this->model_checkout_order->getOrder((int) $this->request->post['order_id']);

		if (!$order_info) {
			$json['error'] = $this->language->get('error_order');
		}

		if (!$json) {
			$this->model_checkout_order->addHistory((int) $this->request->post['order_id'], (int) $this->request->post['order_status_id'], (string) $this->request->post['comment'], (bool) $this->request->post['notify'], (bool) $this->request->post['override']);
			$this->load->bridge->kill();
			$json['success'] = $this->language->get('text_success');
		}

		return $json;
	}
}
