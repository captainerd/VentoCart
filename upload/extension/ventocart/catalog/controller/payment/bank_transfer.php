<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Payment;
class BankTransfer extends \Ventocart\System\Engine\Controller
{
	public function index(): mixed
	{

		$this->load->language('extension/ventocart/payment/bank_transfer');


		$data['bank'] = nl2br($this->config->get('payment_bank_transfer_bank_' . $this->config->get('config_language_id')));

		$data['language'] = $this->config->get('config_language');
		$totals = [];
		$taxes = $this->cart->getTaxes();
		$total = 0;



		[$totals, $taxes, $total] = $this->model_checkout_cart->getTotals($totals, $taxes, $total);
		$data['order_id'] = substr(md5($this->session->data['order_id']), 0, 8);
		$data['total_formated'] = $this->currency->format($total, $this->session->data['currency']);




		return $this->load->view('extension/ventocart/payment/bank_transfer', $data);

	}

	public function confirm(): void
	{
		$this->load->language('extension/ventocart/payment/bank_transfer');

		$json = [];

		if (!isset($this->session->data['order_id'])) {
			$json['error'] = $this->language->get('error_order');
		}

		if (!isset($this->session->data['payment_method']) || $this->session->data['payment_method']['code'] != 'bank_transfer.bank_transfer') {
			$json['error'] = $this->session->data['payment_method']['code'];
		}

		if (!$json) {
			$order_id = substr(md5($this->session->data['order_id']), 0, 8);
			$comment = $this->language->get('text_bank_deposit') . " " . $order_id;

			$this->load->model('checkout/order');

			$this->model_checkout_order->addHistory($this->session->data['order_id'], $this->config->get('payment_bank_transfer_order_status_id'), $comment, true);


			$json['redirect'] = $this->url->link('checkout/success', 'language=' . $this->config->get('config_language'), true);

		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
