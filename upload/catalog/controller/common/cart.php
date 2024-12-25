<?php
namespace Ventocart\Catalog\Controller\Common;
/**
 * Class Cart
 *
 * @package Ventocart\Catalog\Controller\Common
 */
class Cart extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return mixed
	 */
	public function index(): mixed
	{
		$this->load->language('common/cart');

		$totals = [];
		$taxes = $this->cart->getTaxes();
		$total = 0;

		$this->load->model('checkout/cart');

		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
			[$totals, $taxes, $total] = $this->model_checkout_cart->getTotals($totals, $taxes, $total);
		}

		$data['text_items'] = sprintf($this->language->get('text_items'), $this->cart->countProducts(), $this->currency->format($total, $this->session->data['currency']));

		// Products
		$data['products'] = [];

		$products = $this->model_checkout_cart->getProducts();

		foreach ($products as $product) {
			if ($product['option']) {
				foreach ($product['option'] as $key => $option) {
					$product['option'][$key]['value'] = (oc_strlen($option['value']) > 20 ? oc_substr($option['value'], 0, 20) . '..' : $option['value']);
				}
			}

			// Display prices
			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				$unit_price = (float) $this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax'));

				$price = $this->currency->format($unit_price, $this->session->data['currency']);
				$total = $this->currency->format($unit_price * $product['quantity'], $this->session->data['currency']);
			} else {
				$price = false;
				$total = false;
			}

			$description = '';

			if ($product['subscription']) {
				if ($product['subscription']['trial_status']) {
					$trial_price = $this->currency->format($this->tax->calculate($product['subscription']['trial_price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_cycle = $product['subscription']['trial_cycle'];
					$trial_frequency = $this->language->get('text_' . $product['subscription']['trial_frequency']);
					$trial_duration = $product['subscription']['trial_duration'];

					$description .= sprintf($this->language->get('text_subscription_trial'), $trial_price, $trial_cycle, $trial_frequency, $trial_duration);
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($product['subscription']['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				}

				$cycle = $product['subscription']['cycle'];
				$frequency = $this->language->get('text_' . $product['subscription']['frequency']);
				$duration = $product['subscription']['duration'];

				if ($duration) {
					$description .= sprintf($this->language->get('text_subscription_duration'), $price, $cycle, $frequency, $duration);
				} else {
					$description .= sprintf($this->language->get('text_subscription_cancel'), $price, $cycle, $frequency);
				}
			}

			$data['products'][] = [
				'cart_id' => $product['cart_id'],
				'thumb' => $product['image'],
				'name' => $product['name'],
				'model' => $product['model'],
				'option' => $product['option'],
				'subscription' => $description,
				'quantity' => $product['quantity'],
				'minimum' => $product['minimum'],
				'price' => $price,
				'total' => $total,
				'reward' => $product['reward'],
				'href' => $this->url->link('product/product', '&product_id=' . $product['product_id'])
			];
		}



		// Totals
		$data['totals'] = [];

		foreach ($totals as $total) {
			$data['totals'][] = [
				'title' => $total['title'],
				'text' => $this->currency->format($total['value'], $this->session->data['currency'])
			];
		}

		$data['list'] = $this->url->link('common/cart.info');
		$data['product_remove'] = $this->url->link('common/cart.removeProduct');


		$data['cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout');

		return $this->load->view('common/cart', $data);

	}

	/**
	 * @return void
	 */
	public function info(): void
	{
		$this->response->setOutput($this->index());
	}

	/**
	 * @return void
	 */
	public function removeProduct(): void
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

		if (!$json) {
			$this->cart->remove($key);

			$json['success'] = $this->language->get('text_remove');

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['reward']);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function clearCart(): void
	{
		$this->cart->clear();
		$json = ['status' => 'ok'];
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	/**
	 * @return void
	 */

}
