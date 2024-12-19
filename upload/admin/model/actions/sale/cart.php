<?php
namespace Ventocart\Admin\Model\Actions\Sale;
/**
 * Class Cart
 *
 * @package Ventocart\Admin\Model\Actions
 */
class Cart extends \Ventocart\System\Engine\Controller
{
	public function index(): array
	{


		$this->load->bridge('Catalog');

		$this->load->language('actions/sale/cart');

		//$this->event->trigger('model/giftcards/giftcard/processGiftCard/after', [&$route, &$args]);

		$output['products'] = $this->cart->getProducts();

		if (isset($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];

			$this->load->model('checkout/order');
			$totals = $this->model_checkout_order->getTotals($order_id);

			foreach ($totals as $total) {
				$output['totals'][] = [
					'title' => $total['title'],
					'text' => $this->currency->format($total['value'], $this->session->data['order_info']['currency_code'], $this->session->data['order_info']['currency_value'])
				];
			}



		}

		return $output;
	}

	/**
	 * Add
	 *
	 * Add any single product
	 *
	 * @return array
	 */
	public function addProduct(): array
	{
		$this->load->language('actions/sale/cart');
		$this->load->bridge('Catalog');
		$output = [];

		// Add any single products
		if (isset($this->request->post['product_id'])) {
			$product_id = (int) $this->request->post['product_id'];
		} else {
			$product_id = 0;
		}

		if (isset($this->request->post['quantity'])) {
			$quantity = (int) $this->request->post['quantity'];
		} else {
			$quantity = 1;
		}

		if (isset($this->request->post['option'])) {
			$option = array_filter((array) $this->request->post['option']);
		} else {
			$option = [];
		}

		if (isset($this->request->post['subscription_plan_id'])) {
			$subscription_plan_id = (int) $this->request->post['subscription_plan_id'];
		} else {
			$subscription_plan_id = 0;
		}

		$this->nload->model('catalog/product');

		$product_info = $this->model_catalog_product->getProduct($product_id);
		$product_option_info = $this->model_catalog_product->getOptionsLegacy($product_id);

		$empty_options = $option;

		if ($product_info) {
			// If variant get master product

			// Validate that have been sent are part of the product
			foreach ($option as $product_option_id => $value) {
				foreach ($product_option_info as $product_opts) {
					if ($product_opts['required']) {
						foreach ($product_opts['product_option_value'] as $opts_value) {

							if ($product_option_id == $product_opts['product_option_id'] && $value == $opts_value['option_value_id']) {
								unset($empty_options[$product_option_id]);
							}
						}
					} else {
						unset($empty_options[$product_option_id]);
					}
				}

			}
			if (!empty($empty_options)) {
				// If there are still missing options, generate errors
				foreach ($empty_options as $product_option_id => $value) {
					$output['error']['option_' . $product_option_id] = sprintf($this->language->get('error_required'), $product_option_id);
				}
			}

			// Stock
			$product_total = 0;

			$products = $this->cart->getProducts();

			foreach ($products as $product_2) {
				if ($product_2['product_id'] == $product_info['product_id']) {
					$product_total += $product_2['quantity'];
				}
			}

			if (!$this->config->get('config_stock_checkout') && (!$product_info['quantity'] || ($product_info['quantity'] < $product_total))) {
				$output['error']['warning'] = $this->language->get('error_stock');
			}

			// Validate subscription plan
			$subscriptions = $this->model_catalog_product->getSubscriptions($product_id);

			if ($subscriptions && (!$subscription_plan_id || !in_array($subscription_plan_id, array_column($subscriptions, 'subscription_plan_id')))) {
				$output['error']['subscription'] = $this->language->get('error_subscription');
			}
		} else {
			$output['error']['warning'] = $this->language->get('error_product');
		}

		if (!$output) {
			$this->cart->add($product_id, $quantity, $option, $subscription_plan_id);
			$output['products'] = $this->cart->getProducts();
			$output['success'] = $this->language->get('text_success');
		}

		return $output;
	}

	public function remove()
	{
		$this->load->language('actions/sale/cart');
		// Check if card_id is passed in the request
		if (isset($this->request->post['card_id'])) {
			// Get the card_id and remove the product from the cart
			$card_id = (int) $this->request->post['card_id'];

			// Remove the product from the cart using the card_id
			$this->cart->remove($card_id);

			// After removal, get updated cart products
			$products = $this->cart->getProducts();

			// Prepare response data
			$output = [
				'success' => $this->language->get('text_success'), // success message
				'products' => $products  // Get updated list of products
			];
		} else {
			// If no card_id is provided, return an error
			$output = [
				'error' => $this->language->get('error_no_product') // error message
			];
		}

		// Return the response (success or error)
		return $output;
	}
	public function getTotals(): array
	{
		$totals = [];
		$taxes = $this->cart->getTaxes();
		$total = 0;


		$this->load->model('checkout/cart');

		[$totals, $taxes, $total] = $this->model_checkout_cart->getTotals($totals, $taxes, $total);

		$total_data = [];

		foreach ($totals as $total) {
			$total_data[] = ['text' => $this->currency->format($total['value'], $this->session->data['currency'])] + $total;
		}


		return $total_data;
	}
}
