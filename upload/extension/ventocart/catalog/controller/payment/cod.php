<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Payment;
/**
 * Class Cod
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Cod extends \Ventocart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
		$this->load->language('extension/ventocart/payment/cod');

		$data['language'] = $this->config->get('config_language');

		return $this->load->view('extension/ventocart/payment/cod', $data);
	}

	/**
	 * @return void
	 */
	public function confirm(): void {
		$this->load->language('extension/ventocart/payment/cod');

		$json = [];

		if (!isset($this->session->data['order_id'])) {
			$json['error'] = $this->language->get('error_order_id');
		}

		if (!isset($this->session->data['payment_method']) || $this->session->data['payment_method']['code'] != 'cod.cod') {
			$json['error'] = $this->language->get('error_payment_method');
		}

		if (!$json) {
			$this->load->model('checkout/order');

			$this->model_checkout_order->addHistory($this->session->data['order_id'], $this->config->get('payment_cod_order_status_id'));

			$json['redirect'] = $this->url->link('checkout/success', 'language=' . $this->config->get('config_language'), true);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
