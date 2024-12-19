<?php
namespace Ventocart\Admin\Model\Actions\Sale;
/**
 * Class Payment Method
 *
 * @package Ventocart\Admin\Model\Actions\Sale
 */
class PaymentMethod extends \Ventocart\System\Engine\Model
{
	/**
	 * @return void
	 */
	public function index(): array
	{
		$this->load->language('actions/sale/payment_method');
		$this->load->bridge('Catalog');
		$json = [];


		if (!$this->cart->hasProducts()) {
			$json['error'] = $this->language->get('error_product');
		}

		if ($this->config->get('config_checkout_payment_address') && !isset($this->session->data['payment_address'])) {
			$json['error'] = $this->language->get('error_payment_address');
		}

		if (!$json) {
			$payment_address = [];

			if (isset($this->session->data['payment_address'])) {
				$payment_address = $this->session->data['payment_address'];
			} elseif ($this->config->get('config_checkout_shipping_address') && isset($this->session->data['shipping_address'])) {
				$payment_address = $this->session->data['shipping_address'];
			}



			$this->load->model('checkout/payment_method');

			$payment_methods = $this->model_checkout_payment_method->getMethods($payment_address);



			if ($payment_methods) {
				$json['payment_methods'] = $this->session->data['payment_methods'] = $payment_methods;
			} else {
				$json['error'] = $this->language->get('error_no_payment');
			}
		}

		return $json;
	}

	/**
	 * @return void
	 */
	public function save(): array
	{
		$this->load->language('actions/sale/payment_method');

		$json = [];

		// Payment Address
		if ($this->config->get('config_checkout_payment_address') && !isset($this->session->data['payment_address'])) {
			$json['error'] = $this->language->get('error_payment_address');
		}

		// Payment Method
		if (isset($this->request->post['payment_method']) && isset($this->session->data['payment_methods'])) {
			$payment = explode('.', $this->request->post['payment_method']);

			if (!isset($payment[0]) || !isset($payment[1]) || !isset($this->session->data['payment_methods'][$payment[0]]['option'][$payment[1]])) {
				$json['error'] = $this->language->get('error_payment_method');
			}
		} else {
			$json['error'] = $this->language->get('error_payment_method');
		}

		if (!$json) {
			$this->session->data['payment_method'] = $this->session->data['payment_methods'][$payment[0]]['option'][$payment[1]];

			$json['success'] = $this->language->get('text_success');
		}

		return $json;
	}
}
