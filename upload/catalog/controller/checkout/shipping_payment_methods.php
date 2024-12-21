<?php

namespace Ventocart\Catalog\Controller\Checkout;

class ShippingPaymentMethods extends \Ventocart\System\Engine\Controller
{
    public function index(): string
    {
        $this->load->language('checkout/payment_shipping_methods');

        $data['language'] = $this->config->get('config_language');



        // Payment method data
        if (isset($this->session->data['payment_method'])) {
            $data['payment_method'] = $this->session->data['payment_method']['name'];
            $data['code_payment'] = $this->session->data['payment_method']['code'];

        } else {
            $data['payment_method'] = '';
            $data['code_payment'] = '';
        }

        if (isset($this->session->data['comment'])) {
            $data['comment'] = $this->session->data['comment'];
        } else {
            $data['comment'] = '';
        }

        // Shipping method data
        if (isset($this->session->data['shipping_method'])) {
            $data['shipping_method'] = $this->session->data['shipping_method']['name'];
            $data['code_shipping'] = $this->session->data['shipping_method']['code'];
        } else {
            $data['shipping_method'] = '';
            $data['code_shipping'] = '';
        }

        // Add other data specific to each template
        $data['heading_title_shipping'] = $this->language->get('heading_title_shipping');
        $data['text_shipping'] = $this->language->get('text_shipping');
        $data['button_continue'] = $this->language->get('button_continue');

        $data['fill_the_form'] = $this->language->get('fill_the_form');
        // Add any other language variables that have conflicts in the Twig templates

        $products = $this->cart->getProducts();
        if (!$this->cart->hasShipping()) {

            $data['shipping_method'] = false;
        } else {
            $data['shipping_method'] = true;
        }


        return $this->load->view('checkout/shipping_payment_methods', $data);
    }
    private function preSelectShipping(): void
    {

        $this->load->model('checkout/shipping_method');

        if (isset($this->session->data['shipping_method']))
            return;
        if (isset($this->session->data['shipping_address']))

            $shipping_methods = $this->model_checkout_shipping_method->getMethods($this->session->data['shipping_address']);
        // Preselect the shipping method with the lowest sort_order number eg. 0 = selected.

        if (isset($shipping_methods)) { //we need to internally use quote()


            $lowest_sort_order = null;
            $preselected_shipping_method = null;


            foreach ($shipping_methods as $shipping_method_code => $shipping_method) {
                if (!isset($lowest_sort_order) || $shipping_method['sort_order'] < $lowest_sort_order) {
                    $lowest_sort_order = $shipping_method['sort_order'];
                    $preselected_shipping_method = $shipping_method_code;
                }
            }

            if ($preselected_shipping_method && isset($shipping_methods[$preselected_shipping_method]['quote'][$preselected_shipping_method])) {

                $this->session->data['shipping_methods'] = $this->model_checkout_shipping_method->getMethods($this->session->data['shipping_address']);
                $this->session->data['shipping_method'] = $shipping_methods[$preselected_shipping_method]['quote'][$preselected_shipping_method]; //core function of save() to work, we may need to use whole save() or generate an alternative for internal use?


            }
        }
    }



    public function save($int_ship = null): void
    {
        $this->load->language('checkout/payment_shipping_methods');
        $this->load->model('checkout/shipping_method');
        $this->load->model('checkout/payment_method');
        $this->load->model('catalog/information');

        $json = [];

        $information_info = $this->model_catalog_information->getInformation((int) $this->config->get('config_checkout_id'));



        if ($information_info && isset($this->request->get['agree_checkout']) && $this->request->get['agree_checkout'] == "true") {

            $this->session->data['customer']['agree_checkout'] = $this->request->get['agree_checkout'];
        } elseif ($information_info) {
            unset($this->session->data['customer']['agree_checkout']);

            $json['error'] = sprintf($this->language->get('error_agree_checkout'), $information_info['title']);
        }





        // Check if the shipping address needs to be copied from the payment address
        if (
            (!isset($this->session->data['shipping_address']) && $this->cart->hasShipping() && isset($this->session->data['payment_address'])) ||
            (isset($this->session->data['shipping_address']) && $this->session->data['shipping_address']['country_id'] == '0' &&
                $this->session->data['shipping_address']['postcode'] == '0000' && isset($this->session->data['payment_address']))
        ) {
            $this->session->data['shipping_address'] = $this->session->data['payment_address'];
        }

        // Set shipping methods if the shipping address is set
        if (isset($this->session->data['shipping_address'])) {
            $this->session->data['shipping_methods'] = $this->model_checkout_shipping_method->getMethods($this->session->data['shipping_address']);
        }

        // Validate the cart
        if ((!$this->cart->hasProducts()) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
            $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);
        } else {
            // Check minimum quantity requirements for all products in the cart
            $products = $this->cart->getProducts();
            if ($this->cart->hasMinimum()) {
                $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);

            }


            // Validate payment address
            if (!isset($this->session->data['payment_address'])) {
                $json['error'] = $this->language->get('error_payment_address');
            }

            // Validate payment method
            if (empty($json['error']) && !isset($this->request->post['payment_method'])) {
                $json['error'] = $this->language->get('error_payment_method');
            } elseif (empty($json['error'])) {
                $payment = explode('.', $this->request->post['payment_method']);
                if (
                    !isset($this->session->data['payment_methods'][$payment[0]]) ||
                    !isset($this->session->data['payment_methods'][$payment[0]]['option']) ||
                    !isset($this->session->data['payment_methods'][$payment[0]]['option'][$payment[1]])
                ) {
                    $json['error'] = $this->language->get('error_payment_method');
                }
            }

            // Validate shipping method if applicable
            if (empty($json['error']) && $this->cart->hasShipping()) {
                if (!isset($this->request->post['shipping_method'])) {
                    $json['error'] = $this->language->get('error_shipping_method');
                } else {
                    $shipping = explode('.', $this->request->post['shipping_method']);
                    if (
                        !isset($this->session->data['shipping_methods'][$shipping[0]]) ||
                        !isset($this->session->data['shipping_methods'][$shipping[0]]['quote']) ||
                        !isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])
                    ) {
                        $json['error'] = $this->language->get('error_shipping_method');
                    }
                }
            }
        }

        // If there are no errors, set the selected payment and shipping methods
        if (empty($json['error'])) {
            $payment = explode('.', $this->request->post['payment_method']);
            $this->session->data['payment_method'] = $this->session->data['payment_methods'][$payment[0]]['option'][$payment[1]];

            if ($this->cart->hasShipping()) {
                $shipping = explode('.', $this->request->post['shipping_method']);
                $this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
            } else {
                unset($this->session->data['shipping_address']);
            }

            $json['success'] = $this->language->get('text_success');
        }
        $api_output = $this->customer->isApiClient();
        if ($api_output) {
            // Order Totals
            $totals = $this->load->controller('checkout/confirm.totals');
            $json['totals'] = $totals['totals'];

        }
        // Send response as JSON
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }




    public function comment(): void
    {
        $this->load->language('checkout/payment_shipping_methods');

        $json = [];

        if (isset($this->session->data['order_id'])) {
            $order_id = (int) $this->session->data['order_id'];
        } else {
            $order_id = 0;
        }

        if (!$json) {
            $this->session->data['comment'] = $this->request->post['comment'];

            $this->load->model('checkout/order');

            $order_info = $this->model_checkout_order->getOrder($order_id);

            if ($order_info) {
                $this->model_checkout_order->editComment($order_id, $this->request->post['comment']);
            }

            $json['success'] = $this->language->get('text_comment');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }



    public function getPaymentAndShipping(): mixed
    {



        $this->load->language('checkout/payment_shipping_methods');
        if ($this->validateCart() != null) {
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode(['error' => 'No products found']));
        }

        $paymentMethods = $this->getPaymentMethods();

        if ($redirect = $this->validateCart()) {
            return ['redirect' => $redirect];
        }

        if (isset($paymentMethods['payment_methods'])) {
            $json['payment_methods'] = $paymentMethods['payment_methods'];
        } else {
            $json['error_payment'] = $this->language->get('fill_the_form');
        }


        // Fetch shipping methods
        $shippingMethods = $this->getShippingMethods();

        if ($shippingMethods && isset($shippingMethods['shipping_methods'])) {
            $json['shipping_methods'] = $shippingMethods['shipping_methods'];
        } else {
            $json['error_shipping'] = "Aaa " . $this->language->get('fill_the_form');
        }
        if (!$this->cart->hasShipping()) {
            $json['error_shipping'] = $this->language->get('text_shipping_not_needed');
        }

        $api_output = $this->customer->isApiClient();

        if ($api_output) {
            return $json;
        } else {
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
            return null;
        }
    }


    private function validateCart(): ?string
    {
        if (
            (!$this->cart->hasProducts()) ||
            (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))
        ) {
            return $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);
        }

        if ($this->cart->hasMinimum()) {
            return $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);

        }

        return null;
    }

    private function getDefaultShippingAddress(): array
    {

        return [
            'postcode' => '0000',
            'zone_id' => 0000,
            'country_id' => 0
        ];
    }


    private function getShippingMethods(): array
    {


        $this->load->language('checkout/payment_shipping_methods');
        $json = [];

        $this->load->model('checkout/shipping_method');

        $shipping_address = $this->session->data['shipping_address'] ?? $this->getDefaultShippingAddress();
        $shipping_methods = $this->model_checkout_shipping_method->getMethods($shipping_address);

        if ($shipping_methods) {
            $this->preSelectShipping();
            $json['shipping_methods'] = $this->session->data['shipping_methods'] = $shipping_methods;

            foreach ($json['shipping_methods'] as $shipping_method_code => &$shipping_method) {
                foreach ($shipping_method['quote'] as $quote_code => &$quote) {
                    $quote['checked'] = isset($this->session->data['shipping_method']['code']) &&
                        $shipping_method['quote'][$quote_code]['code'] === $this->session->data['shipping_method']['code'];
                }
            }
        } else {
            $json['error'] = sprintf(
                $this->language->get('error_no_shipping'),
                $this->url->link('information/contact', 'language=' . $this->config->get('config_language'))
            );
        }

        return $json;
    }


    private function getPaymentMethods(): array
    {
        $this->load->language('checkout/payment_shipping_methods');
        $json = [];

        // Validate customer data
        if (!isset($this->session->data['customer'])) {
            return ['error' => $this->language->get('error_customer')];
        }

        $payment_address = $this->session->data['payment_address']
            ?? $this->session->data['shipping_address']
            ?? null;

        if (!$payment_address) {
            return ['error' => $this->language->get('error_payment_address')];
        }

        $this->load->model('checkout/payment_method');
        $payment_methods = $this->model_checkout_payment_method->getMethods($payment_address);

        if ($payment_methods) {
            $json['payment_methods'] = $this->session->data['payment_methods'] = $payment_methods;
        } else {
            $json['error'] = sprintf(
                $this->language->get('error_no_payment'),
                $this->url->link('information/contact', 'language=' . $this->config->get('config_language'))
            );
        }

        return $json;
    }

}