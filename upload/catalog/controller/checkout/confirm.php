<?php
namespace Ventocart\Catalog\Controller\Checkout;
class Confirm extends \Ventocart\System\Engine\Controller
{
	public function index(): mixed
	{




		$this->load->language('checkout/confirm');
		$this->placeOrder();



		$totals = $this->totals();
		$data['totals'] = $totals['totals'];



		//check out accept terms 
		$this->load->model('catalog/information');


		$information_info = $this->model_catalog_information->getInformation((int) $this->config->get('config_checkout_id'));

		if ($information_info) {
			$data['text_agree_checkout'] = sprintf($this->language->get('text_agree'), $this->url->link('information/information.info', 'information_id=' . $this->config->get('config_checkout_id')), $information_info['title']);
		} else {
			$data['text_agree_checkout'] = '';
		}


		// Display prices
		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
			$price_status = true;
		} else {
			$price_status = false;
		}

		$this->load->model('tool/upload');
		$products = $this->model_checkout_cart->getProducts();

		$data['products'] = [];


		foreach ($products as $product) {
			$description = '';

			if ($product['subscription']) {
				if ($product['subscription']['trial_status']) {
					$trial_price = $this->currency->format($this->tax->calculate($product['subscription']['trial_price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_cycle = $product['subscription']['trial_cycle'];
					$trial_frequency = $this->language->get('text_' . $product['subscription']['trial_frequency']);
					$trial_duration = $product['subscription']['trial_duration'];

					$description .= sprintf($this->language->get('text_subscription_trial'), $trial_price, $trial_cycle, $trial_frequency, $trial_duration);
				}

				$price = $this->currency->format($this->tax->calculate($product['subscription']['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$cycle = $product['subscription']['cycle'];
				$frequency = $this->language->get('text_' . $product['subscription']['frequency']);
				$duration = $product['subscription']['duration'];

				if ($duration) {
					$description .= sprintf($this->language->get('text_subscription_duration'), $price_status ? $price : '', $cycle, $frequency, $duration);
				} else {
					$description .= sprintf($this->language->get('text_subscription_cancel'), $price_status ? $price : '', $cycle, $frequency);
				}
			}
			$product_total = $this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax'));
			$product_total = $product_total * $product['quantity'];
			$data['products'][] = [
				'cart_id' => $product['cart_id'],
				'product_id' => $product['product_id'],
				'name' => $product['name'],
				'sku' => $product['sku'],
				'option' => $product['option'],
				'subscription' => $description,
				'quantity' => $product['quantity'],
				'price' => $price_status ? $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']) : '',
				'total' => $price_status ? $this->currency->format($product_total, $this->session->data['currency']) : '',
				'reward' => $product['reward'],
				'href' => $this->url->link('product/product', 'product_id=' . $product['product_id'])
			];
		}





		return $this->load->view('checkout/confirm', $data);

	}

	public function placeOrder()
	{



		$this->load->language('checkout/confirm');
		$this->load->model('checkout/cart');

		$status = ($this->customer->isLogged() || !$this->config->get('config_customer_price'));

		// Validate customer data is set
		if (!isset($this->session->data['customer'])) {
			$status = false;
		}

		// Validate cart has products and has stock.
		if ((!$this->cart->hasProducts()) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$status = false;
		}

		// Validate minimum quantity requirements.
		$products = $this->model_checkout_cart->getProducts();

		if ($this->cart->hasMinimum()) {
			$status = false;

		}


		// Shipping
		if ($this->cart->hasShipping()) {
			// Validate shipping address
			if (!isset($this->session->data['shipping_address']['address_id'])) {
				$status = false;

			}

			// Validate shipping method
			if (!isset($this->session->data['shipping_method'])) {
				$status = false;
			}
		} else {
			unset($this->session->data['shipping_address']);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
		}

		// Validate payment methods
		if (!isset($this->session->data['payment_method'])) {
			$status = false;
		}

		// Validate checkout terms
		if ($this->config->get('config_checkout_id') && empty($this->session->data['customer']['agree_checkout'])) {
			$status = false;


		}

		// Generate order if payment method is set
		if ($status) {
			$order_data = [];

			$order_data['invoice_prefix'] = $this->config->get('config_invoice_prefix');

			// Store Details

			$order_data['store_name'] = $this->config->get('config_name');
			$order_data['store_url'] = $this->config->get('config_url');

			// Customer Details
			$order_data['customer_id'] = $this->session->data['customer']['customer_id'];
			$order_data['customer_group_id'] = $this->session->data['customer']['customer_group_id'];
			$order_data['firstname'] = $this->session->data['customer']['firstname'];
			$order_data['lastname'] = $this->session->data['customer']['lastname'];
			$order_data['email'] = $this->session->data['customer']['email'];

			if (empty($this->customer->getTelephone())) {

				$order_data['telephone'] = $this->session->data['payment_address']['phone'];
			}
			$order_data['custom_field'] = $this->session->data['customer']['custom_field'];

			// Payment Details

			$order_data['payment_address_id'] = $this->session->data['payment_address']['address_id'];
			$order_data['payment_firstname'] = $this->session->data['payment_address']['firstname'];
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

			if (isset($this->session->data['comment'])) {
				$order_data['comment'] = $this->session->data['comment'];
			} else {
				$order_data['comment'] = '';
			}
			$totals = $this->totals();
			$total_data = [
				'totals' => $totals['totals_clear'],
				'taxes' => $totals['taxes'],
				'total' => $totals['total']
			];

			$order_data = array_merge($order_data, $total_data);

			$order_data['affiliate_id'] = 0;
			$order_data['commission'] = 0;
			$order_data['marketing_id'] = 0;
			$order_data['tracking'] = '';

			if (isset($this->session->data['tracking'])) {
				$subtotal = $this->cart->getSubTotal();

				// Affiliate
				if ($this->config->get('config_affiliate_status')) {
					$this->load->model('account/affiliate');

					$affiliate_info = $this->model_account_affiliate->getAffiliateByTracking($this->session->data['tracking']);

					if ($affiliate_info) {
						$order_data['affiliate_id'] = $affiliate_info['customer_id'];
						$order_data['commission'] = ($subtotal / 100) * $affiliate_info['commission'];
						$order_data['tracking'] = $this->session->data['tracking'];
					}
				}

				$this->load->model('marketing/marketing');

				$marketing_info = $this->model_marketing_marketing->getMarketingByCode($this->session->data['tracking']);

				if ($marketing_info) {
					$order_data['marketing_id'] = $marketing_info['marketing_id'];
					$order_data['tracking'] = $this->session->data['tracking'];
				}
			}

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

			// Products
			$order_data['products'] = [];

			foreach ($products as $product) {
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
						'trial_price' => $product['subscription']['trial_price'],
						'trial_tax' => $this->tax->getTax($product['subscription']['trial_price'], $product['tax_class_id']),
						'trial_frequency' => $product['subscription']['trial_frequency'],
						'trial_cycle' => $product['subscription']['trial_cycle'],
						'trial_duration' => $product['subscription']['trial_duration'],
						'trial_remaining' => $product['subscription']['trial_remaining'],
						'trial_status' => $product['subscription']['trial_status'],
						'price' => $product['subscription']['price'],
						'tax' => $this->tax->getTax($product['subscription']['price'], $product['tax_class_id']),
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
			}


			$this->load->model('checkout/order');

			if (!isset($this->session->data['order_id'])) {

				$this->session->data['order_id'] = $this->model_checkout_order->addOrder($order_data);
			} else {
				$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

				if ($order_info && !$order_info['order_status_id']) {
					$this->model_checkout_order->editOrder($this->session->data['order_id'], $order_data);
				}
			}
		}



		return $status;
	}


	public function getPayment(): mixed
	{

		$this->load->language('checkout/confirm');

		$data = [];
		$this->load->model('checkout/cart');
		$this->load->model('setting/extension');
		$status = ($this->customer->isLogged() || !$this->config->get('config_customer_price'));


		if ($this->config->get('config_checkout_id') && empty($this->session->data['customer']['agree_checkout'])) {
			$status = false;


		}

		// Validate if payment method has been set.
		if (isset($this->session->data['payment_method'])) {

			$code = oc_substr($this->session->data['payment_method']['code'], 0, strpos($this->session->data['payment_method']['code'], '.'));

		} else {

			$code = '';
		}

		$extension_info = $this->model_setting_extension->getExtensionByCode('payment', $code);

		if ($status && $extension_info) {


			$data = $this->load->controller('extension/' . $extension_info['extension'] . '/payment/' . $extension_info['code']);
		}


		return $data;



	}
	public function confirm(): void
	{
		$this->response->setOutput($this->index());
	}
	public function payment(): void
	{
		$payment = $this->getPayment();
		if (!empty($payment)) {
			$this->response->setOutput($payment);
		}
	}

	public function totals(): array
	{
		$totals = [];
		$taxes = $this->cart->getTaxes();
		$total = 0;

		$this->load->model('checkout/cart');

		[$totals, $taxes, $total] = $this->model_checkout_cart->getTotals($totals, $taxes, $total);

		$json['taxes'] = $taxes;
		$json['total'] = $total;
		$json['totals_clear'] = $totals;




		foreach ($totals as $total) {
			$json['totals'][] = [
				'code' => $total['code'],
				'title' => $total['title'],
				'text' => $this->currency->format($total['value'], $this->session->data['currency'])
			];
		}
		return $json;
	}
}
