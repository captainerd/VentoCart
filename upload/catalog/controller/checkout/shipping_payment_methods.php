<?php

namespace Opencart\Catalog\Controller\Checkout;

class ShippingPaymentMethods extends \Opencart\System\Engine\Controller
{
    public function index(): string
    {

        $this->load->language('checkout/payment_method');

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
        $this->load->language('checkout/shipping_method');
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
    public function isValid()
    {

        $expectedValues = array(
            'postcode' => '0000',
            'zone_id' => 0,
            'country_id' => 0
        );
        if (isset($this->session->data['shipping_address']) && $this->session->data['shipping_address'] == $expectedValues) {
            $json['not_validated'] = 1;
        } else {
            $json['not_validated'] = 0;

        }


        $json = json_encode($json);
        $this->response->addHeader('Content-Type: application/json');
        echo $json;
    }

    public function quote()
    {
        $this->load->language('checkout/shipping_method');
   

        $json = [];

        // Validate cart has products and has stock.
        if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
            $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);

        }

        // Validate minimum quantity requirements.
        $products = $this->cart->getProducts();

        foreach ($products as $product) {
            if (!$product['minimum']) {
                $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);

                break;
            }
        }


        if (!$json) {
            // Shipping methods
            $this->load->model('checkout/shipping_method');

            if (isset($this->session->data['shipping_address']) && !empty($this->session->data['shipping_address'])) {

                $shipping_methods = $this->model_checkout_shipping_method->getMethods($this->session->data['shipping_address']);

            } else {
          
                $t['postcode'] = "0000";
                $t['zone_id'] = 0000;
                $t['country_id'] = 0;
                $this->session->data['shipping_address'] = $t;
                $shipping_methods = $this->model_checkout_shipping_method->getMethods($t);
            }
         
            if ($shipping_methods) {
                $this->preSelectShipping();
                $json['shipping_methods'] = $this->session->data['shipping_methods'] = $shipping_methods;

                foreach ($json['shipping_methods'] as $shipping_method_code => $shipping_method) {
                    foreach ($shipping_method['quote'] as $quote_code => $quote) {

                        if (isset($this->session->data['shipping_method']['code']) && $shipping_method['quote'][$quote_code]['code'] === $this->session->data['shipping_method']['code']) {
                            $json['shipping_methods'][$shipping_method_code]['quote'][$quote_code]['checked'] = true;
                        } else {
                            $json['shipping_methods'][$shipping_method_code]['quote'][$quote_code]['checked'] = false;
                        }
                    }
                }


            } else {
                $json['error'] = sprintf($this->language->get('error_no_shipping'), $this->url->link('information/contact', 'language=' . $this->config->get('config_language')));
            }
        }


        return $json;


    }

    public function save($int_ship = null): void
    {
        $this->load->language('checkout/shipping_method');
        $this->load->language('checkout/payment_method');
        $this->load->model('checkout/shipping_method');
   
        if (!isset($this->session->data['shipping_address']) && !$this->cart->hasShipping()) {
            if (isset($this->session->data['payment_address'])) {
                $this->session->data['shipping_address'] = $this->session->data['payment_address'];
            } else {
                return;
            }
        }
    
        if (isset($this->session->data['shipping_address']))
            $this->session->data['shipping_methods'] = $this->model_checkout_shipping_method->getMethods($this->session->data['shipping_address']);
        $json = [];

        if (!isset($this->request->post['payment_method']))
            $this->request->post['payment_method'] = $this->request->post['payment_method_pre'];


        // Validate cart has products and has stock.
        if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
            $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);
        }

        // Validate minimum quantity requirements.
        $products = $this->cart->getProducts();

        foreach ($products as $product) {
            if (!$product['minimum']) {
                $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);
                break;
            }
        }

        if (!$json) {


            // Validate if payment address is set if required in settings
            if ( !isset($this->session->data['payment_address'])) {
                $json['error'] = $this->language->get('error_payment_address');
            } else {
               // $this->session->data['shipping_address'] = $this->session->data['payment_address'];
            }

            // Payment method
            if (isset($this->request->post['payment_method'])) {
                $payment = explode('.', $this->request->post['payment_method']);
                $this->load->model('checkout/payment_method');

             
                $payment_methods = $this->model_checkout_payment_method->getMethods($this->session->data['shipping_address']);
                $this->session->data['shipping_methods'] = $this->model_checkout_shipping_method->getMethods($this->session->data['shipping_address']);

                if ($payment_methods) {
                    $this->session->data['payment_methods'] = $payment_methods;
                }

                if (!isset($payment[0]) || !isset($payment[1]) && !$payment_methods) {
                    $json['error'] = $this->language->get('error_payment_method');
                }
            } else {
                $json['error'] = $this->language->get('error_payment_method');
            }

            // Shipping method
            if (isset($this->request->post['shipping_method'])) {
                $shipping = explode('.', $this->request->post['shipping_method']);


                if (!(isset($shipping[0]) || !isset($shipping[1])) && !isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
                    $json['error'] = $this->language->get('error_shipping_method');
                }
            } else {
               if ($this->cart->hasShipping()) $json['error'] = $this->language->get('error_shipping_method');
            }
        }

        if (!$json) {
            // Handle payment method data
            if (isset($this->request->post['payment_method'])) {
                $payment = explode('.', $this->request->post['payment_method']);
                $this->session->data['payment_method'] = $this->session->data['payment_methods'][$payment[0]]['option'][$payment[1]];
            }

            // Handle shipping method data
            if (isset($this->request->post['shipping_method'])) {
                $shipping = explode('.', $this->request->post['shipping_method']);

                $this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];

            }

            $json['success'] = $this->language->get('text_success');

            // Clear payment methods
            unset($this->session->data['payment_methods']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }









    public function comment(): void
    {
        $this->load->language('checkout/payment_method');

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

    public function agree(): void
    {
        $this->load->language('checkout/payment_method');

        $json = [];

        if (isset($this->request->post['agree'])) {
            $this->session->data['agree'] = $this->request->post['agree'];
        } else {
            unset($this->session->data['agree']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getPaymentAndShipping()
    {
        $this->load->language('checkout/payment_method');

        $json = [];
        $this->preSelectShipping();
        // Fetch payment methods
        $paymentMethods = $this->getMethods();
     

        if (isset($paymentMethods['payment_methods'])) {
            $json['payment_methods'] = $paymentMethods['payment_methods'];
        } else {
            $json['error_payment'] = $this->language->get('error_no_payment');
        }

        $this->load->language('checkout/shipping_method');
        // Fetch shipping methods
        $shippingMethods = $this->quote();

        if ($shippingMethods && isset($shippingMethods['shipping_methods'])) {
            $json['shipping_methods'] = $shippingMethods['shipping_methods'];
        }  
        if (!$this->cart->hasShipping()) {
            $json['error_shipping'] = $this->language->get('text_shipping_not_needed');
        }


        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getMethods()
    {
        $this->load->language('checkout/payment_method');

        $json = [];
        $disabled = false;
        // Validate cart has products and has stock.
        if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
            $json['redirect'] = $this->url->link('checkout/cartaaa', 'language=' . $this->config->get('config_language'), true);
        }

        // Validate minimum quantity requirements.
        $products = $this->cart->getProducts();

        foreach ($products as $product) {
            if (!$product['minimum']) {
                $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);

                break;
            }
        }

        if (!$json) {
            // Validate if customer session data is set
            if (!isset($this->session->data['customer'])) {

                $disabled = $this->language->get('error_customer');
            }

            if ( !isset($this->session->data['payment_address'])) {
                $disabled = $this->language->get('error_payment_address');
            }

            // Validate shipping
            if ($this->cart->hasShipping()) {
                // Validate shipping address
                if (!isset($this->session->data['shipping_address']['address_id'])) {
                    $disabled = $this->language->get('error_shipping_address');

                }

                // Validate shipping method
                if (!isset($this->session->data['shipping_method'])) {

                    $disabled = $this->language->get('error_shipping_method');
                }
            }
        }

        if (!$json) {
            $payment_address = [];
            if (isset($this->session->data['payment_address'])) $payment_address = $this->session->data['payment_address'];
            if (!isset($this->session->data['payment_address']) && isset( $this->session->data['shipping_address']))    $payment_address = $this->session->data['shipping_address'];
         

            // Payment methods
            $this->load->model('checkout/payment_method');

            $payment_methods = $this->model_checkout_payment_method->getMethods($payment_address);
        

            if ($payment_methods) {
                //	$json['disabled'] = $disabled;
                $json['payment_methods'] = $this->session->data['payment_methods'] = $payment_methods;
            } else {
                $json['error'] = sprintf($this->language->get('error_no_payment'), $this->url->link('information/contact', 'language=' . $this->config->get('config_language')));
            }
        }

        return $json;
    }


}