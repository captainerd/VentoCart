<?php
namespace Ventocart\Catalog\Controller\Checkout;
class Cart extends \Ventocart\System\Engine\Controller
{
	public function index(): void
	{

		$this->load->language('checkout/cart');

		$this->document->setTitle($this->language->get('heading_title'));

		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('checkout/cart')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);

		if ($this->cart->hasProducts()) {
			if (!$this->cart->hasStock() && (!$this->config->get('config_stock_checkout') || $this->config->get('config_stock_warning'))) {
				$data['error_warning'] = $this->language->get('error_stock');
			} elseif (isset($this->session->data['error'])) {
				$data['error_warning'] = $this->session->data['error'];

				unset($this->session->data['error']);
			} else {
				$data['error_warning'] = '';
			}

			if ($this->config->get('config_customer_price') && !$this->customer->isLogged()) {
				$data['attention'] = sprintf($this->language->get('text_login'), $this->url->link('account/login'), $this->url->link('account/register'));
			} else {
				$data['attention'] = '';
			}

			if (isset($this->session->data['success'])) {
				$data['success'] = $this->session->data['success'];

				unset($this->session->data['success']);
			} else {
				$data['success'] = '';
			}

			if ($this->config->get('config_cart_weight')) {
				$data['weight'] = $this->weight->format($this->cart->getWeight(), $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'));
			} else {
				$data['weight'] = '';
			}

			$data['list'] = $this->getList();



			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
			$data['continue'] = $this->url->link('common/home');
			$data['checkout'] = $this->url->link('checkout/checkout');
			$data['language'] = $this->config->get('config_language');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');


			$this->response->setOutput($this->load->view('checkout/cart', $data));
		} else {
			$data['text_error'] = $this->language->get('text_no_results');

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');


			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}

	public function list(): void
	{
		$this->load->language('checkout/cart');

		$this->response->setOutput($this->getList());
	}

	public function getList(): string
	{
		$data['list'] = $this->url->link(' ');
		$data['product_edit'] = $this->url->link('checkout/cart.edit');
		$data['product_remove'] = $this->url->link('checkout/cart.remove');

		// Display prices

		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
			$price_status = true;
		} else {
			$price_status = false;
		}

		$this->load->model('tool/image');
		$this->load->model('tool/upload');

		$data['products'] = [];

		$this->load->model('checkout/cart');

		$products = $this->model_checkout_cart->getProducts();

		foreach ($products as $product) {
			if ($product['minimum']) {
				$data['error_minimum'] = sprintf($this->language->get('error_minimum'), $product['minimum']);
			}

			$description = '';

			if ($product['subscription']) {
				if ($product['subscription']['trial_status']) {
					$trial_price = $this->currency->format($this->tax->calculate($product['subscription']['trial_price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_cycle = $product['subscription']['trial_cycle'];
					$trial_frequency = $this->language->get('text_' . $product['subscription']['trial_frequency']);
					$trial_duration = $product['subscription']['trial_duration'];

					$description .= sprintf($this->language->get('text_subscription_trial'), $price_status ? $trial_price : '', $trial_cycle, $trial_frequency, $trial_duration);
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
				'thumb' => $product['image'],
				'name' => $product['name'],
				'model' => $product['model'],
				'option' => $product['option'],
				'subscription' => $description,
				'quantity' => $product['quantity'],
				'stock' => $product['stock'] ? true : !(!$this->config->get('config_stock_checkout') || $this->config->get('config_stock_warning')),
				'minimum' => $product['minimum'],
				'reward' => $product['reward'],
				'price' => $price_status ? $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']) : '',
				'total' => $price_status ? $this->currency->format($product_total, $this->session->data['currency']) : '',
				'href' => $this->url->link('product/product', 'product_id=' . $product['product_id'])
			];
		}



		$data['totals'] = [];

		$totals = [];
		$taxes = $this->cart->getTaxes();
		$total = 0;

		// Display prices
		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
			[$totals, $taxes, $total] = $this->model_checkout_cart->getTotals($totals, $taxes, $total);

			foreach ($totals as $result) {
				$data['totals'][] = [
					'title' => $result['title'],
					'text' => $price_status ? $this->currency->format($result['value'], $this->session->data['currency']) : ''
				];
			}
		}

		return $this->load->view('checkout/cart_list', $data);
	}

	public function add(): void
	{
		$this->load->language('checkout/cart');
		$this->load->model('catalog/product');
		$json = [];

		// Fetch and sanitize request data
		$product_id = (int) ($this->request->post['product_id'] ?? 0);
		$virtual_product_name = $this->request->post['virual_product_name'] ?? '';
		$virtual_price = (float) ($this->request->post['virtual_price'] ?? 0);
		$quantity = (int) ($this->request->post['quantity'] ?? 1);
		$option = isset($this->request->post['option']) ? array_filter($this->request->post['option']) : [];
		$subscription_plan_id = (int) ($this->request->post['subscription_plan_id'] ?? 0);

		$type = 0;
		$product_info = null;

		// Handle virtual product scenario
		if ($product_id === -1 && !empty($virtual_product_name)) {
			$type = 1;
			$product_info = [
				'name' => $virtual_product_name,
				'price' => $virtual_price,
				'variant' => []
			];
		} else {
			$product_info = $this->model_catalog_product->getProduct($product_id);
		}

		// Validate product existence
		if (!$product_info) {
			$json['error']['warning'] = $this->language->get('error_product');
		} else {
			// Validate options for physical products
			if ($type === 0) {
				$this->validateProductOptions($product_id, $option, $json);
				$this->validateSubscription($product_id, $subscription_plan_id, $json);
			}
		}

		// Add to cart if no errors
		if (empty($json['error'])) {
			$added = $this->cart->add($product_id, $quantity, $option, $subscription_plan_id, false, 0, $type);

			if ($type === 1) {
				$this->session->data['virtual_product'][$added] = $product_info;
			}

			$json['success'] = sprintf(
				$this->language->get('text_success'),
				$this->url->link('product/product', 'product_id=' . $product_id),
				$product_info['name'],
				$this->url->link('checkout/cart')
			);

			// Clear shipping and payment methods
			unset($this->session->data['shipping_method'], $this->session->data['shipping_methods']);
			unset($this->session->data['payment_method'], $this->session->data['payment_methods']);
		} else {
			$json['redirect'] = $this->url->link('product/product', 'product_id=' . $product_id, true);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Validate product options.
	 */
	private function validateProductOptions(int $product_id, array $option, array &$json): void
	{
		$product_options = $this->model_catalog_product->getOptions($product_id);

		foreach ($product_options as $product_option) {
			if ($product_option['required'] && empty($option[$product_option['product_option_id']])) {
				$json['options_needed'] = $product_id;
				$json['error']['option_' . $product_option['product_option_id']] = sprintf(
					$this->language->get('error_required'),
					$product_option['name']
				);
			}
		}
	}

	/**
	 * Validate subscription plan.
	 */
	private function validateSubscription(int $product_id, int $subscription_plan_id, array &$json): void
	{
		$subscriptions = $this->model_catalog_product->getSubscriptions($product_id);

		if ($subscriptions) {
			$subscription_plan_ids = array_column($subscriptions, 'subscription_plan_id');

			if (!in_array($subscription_plan_id, $subscription_plan_ids)) {

				$json['error']['subscription'] = $this->language->get('error_subscription');
			}
		}
	}


	public function edit(): void
	{
		$this->load->language('checkout/cart');

		$json = [];

		if (isset($this->request->post['key'])) {
			$key = (int) $this->request->post['key'];
		} else {
			$key = 0;
		}

		if (isset($this->request->post['quantity'])) {
			$quantity = (int) $this->request->post['quantity'];
		} else {
			$quantity = 1;
		}

		if (!$this->cart->has($key)) {
			$json['error'] = $this->language->get('error_product');
		}

		if (!$json) {
			// Handles single item update
			$this->cart->update($key, $quantity);

			if ($this->cart->hasProducts()) {
				$json['success'] = $this->language->get('text_edit');
			} else {
				$json['redirect'] = $this->url->link('checkout/cart', '', true);
			}

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['reward']);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function remove(): void
	{
		$this->load->language('checkout/cart');

		$json = [];

		if (isset($this->request->post['key'])) {
			$key = (int) $this->request->post['key'];
		} else {
			$key = 0;
		}

		if (!$this->cart->has($key)) {
			$json['error'] = $this->language->get('error_product');
		}

		// Remove
		if (!$json) {
			$this->cart->remove($key);

			if ($this->cart->hasProducts()) {
				$json['success'] = $this->language->get('text_remove');
			} else {
				$json['redirect'] = $this->url->link('checkout/cart', '', true);
			}

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['reward']);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
