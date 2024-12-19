<?php
namespace Ventocart\Admin\Model\Actions\Sale;
/**
 * Class Shipping Method
 *
 * @package Ventocart\Admin\Model\Actions\Sale
 */
class ShippingMethod extends \Ventocart\System\Engine\Model
{
	/**
	 * @return void
	 */
	public function index(): array
	{
		$this->load->language('actions/sale/shipping_method');

		$this->load->bridge('Catalog');

		$json = [];

		if ($this->cart->hasShipping()) {
			if (!isset($this->session->data['shipping_address'])) {
				$json['error'] = $this->language->get('error_shipping_address');
			}
		} else {
			$json['error'] = $this->language->get('error_shipping');
		}

		if (!$json) {

			$this->load->model('checkout/shipping_method');

			$shipping_methods = $this->model_checkout_shipping_method->getMethods($this->session->data['shipping_address']);

			if ($shipping_methods) {
				$json['shipping_methods'] = $this->session->data['shipping_methods'] = $shipping_methods;
			} else {
				$json['error'] = $this->language->get('error_no_shipping');
			}
		}

		return $json;
	}

	/**
	 * @return void
	 */
	public function save(): array
	{
		$this->load->language('actions/sale/shipping_method');

		$json = [];

		if ($this->cart->hasShipping()) {
			if (!isset($this->session->data['shipping_address'])) {
				$json['error'] = $this->language->get('error_shipping_address');
			}

			if (isset($this->request->post['shipping_method'])) {
				$shipping = explode('.', $this->request->post['shipping_method']);

				if (!isset($shipping[0]) || !isset($shipping[1]) || !isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
					$json['error'] = $this->language->get('error_shipping_method');
				}
			} else {
				$json['error'] = $this->language->get('error_shipping_method');
			}
		} else {
			$json['error'] = $this->language->get('error_shipping');
		}

		if (!$json) {
			$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];

			$json['success'] = $this->language->get('text_success');
		}

		return $json;
	}
}