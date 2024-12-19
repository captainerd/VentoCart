<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Payment;
/**
 * Class GiftCard
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Payment
 */
class GiftCard extends \Ventocart\System\Engine\Controller
{
    /**
     * @return string
     */
    public function index(): string
    {
        $this->load->language('extension/ventocart/payment/giftcard');

        $data['language'] = $this->config->get('config_language');

        $this->load->model('giftcards/giftcard');
        $shipping_cost = 0;
        $balance = $this->model_giftcards_giftcard->GetTotalBalance($this->customer->getId());
        if (isset($this->session->data['shipping_method']) && isset($this->session->data['shipping_method']['cost'])) {
            $shipping_cost = $this->session->data['shipping_method']['cost'];
        }

        if ($balance <= ($this->cart->getTotal() + $shipping_cost)) {
            $data['insufficient_balance'] = $this->language->get('error_balance') . " " . $this->currency->format($balance, $this->session->data['currency']);

        }


        return $this->load->view('extension/ventocart/payment/giftcard', $data);
    }

    /**
     * @return void
     */
    public function confirm(): void
    {

        $this->load->language('extension/ventocart/payment/giftcard');

        $json = [];

        if (!isset($this->session->data['order_id'])) {
            $json['error'] = $this->language->get('error_order_id');
        }

        if (!isset($this->session->data['payment_method']) || $this->session->data['payment_method']['code'] != 'giftcard.giftcard') {
            $json['error'] = $this->language->get('error_payment_method');
        }
        $this->load->model('giftcards/giftcard');
        $shipping_cost = 0;
        $balance = $this->model_giftcards_giftcard->GetTotalBalance($this->customer->getId());
        if (isset($this->session->data['shipping_method']) && isset($this->session->data['shipping_method']['cost'])) {
            $shipping_cost = $this->session->data['shipping_method']['cost'];
        }

        if ($balance <= ($this->cart->getTotal() + $shipping_cost)) {
            $json['error'] = $this->language->get('error_balance') . " " . $this->currency->format($balance, $this->session->data['currency']);
        }
        if (!$json) {
            $this->load->model('checkout/order');
            $charge = $this->cart->getTotal() + $shipping_cost;
            $this->model_giftcards_giftcard->chargeAccount($this->customer->getId(), $charge);


            $this->model_checkout_order->addHistory($this->session->data['order_id'], $this->config->get('payment_giftcard_order_status_id'));

            $json['redirect'] = $this->url->link('checkout/success', 'language=' . $this->config->get('config_language'), true);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
