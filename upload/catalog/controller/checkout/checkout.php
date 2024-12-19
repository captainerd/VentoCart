<?php
namespace Ventocart\Catalog\Controller\Checkout;
class Checkout extends \Ventocart\System\Engine\Controller
{
    public function index(): void
    {
        // Validate cart has products and has stock.
        if ((!$this->cart->hasProducts()) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
            $this->response->redirect($this->url->link('checkout/cart', 'language=' . $this->config->get('config_language')));
        }


        // Checks if the client placed a guest order in the past and saves the address
        if (
            isset($this->session->data['payment_address'])
            && isset($this->session->data['payment_address']['address_id'])
            && $this->session->data['payment_address']['address_id'] == 0
        ) {
            $payment_address_data = [
                'address_id' => $this->session->data['payment_address']['address_id'], // Get the address ID from the session
                'firstname' => isset($this->session->data['payment_address']['firstname']) ? $this->session->data['payment_address']['firstname'] : '', // Get firstname from session or empty if not set
                'lastname' => isset($this->session->data['payment_address']['lastname']) ? $this->session->data['payment_address']['lastname'] : '', // Get lastname from session or empty
                'company' => isset($this->session->data['payment_address']['company']) ? $this->session->data['payment_address']['company'] : '', // Get company from session
                'address_1' => isset($this->session->data['payment_address']['address_1']) ? $this->session->data['payment_address']['address_1'] : '', // Get address 1
                'phone' => isset($this->session->data['payment_address']['phone']) ? $this->session->data['payment_address']['phone'] : '', // Get phone from session
                'city' => isset($this->session->data['payment_address']['city']) ? $this->session->data['payment_address']['city'] : '', // Get city from session
                'postcode' => isset($this->session->data['payment_address']['postcode']) ? $this->session->data['payment_address']['postcode'] : '', // Get postcode from session
                'zone_id' => isset($this->session->data['payment_address']['zone_id']) ? $this->session->data['payment_address']['zone_id'] : '', // Get zone ID
                'zone' => isset($this->session->data['payment_address']['zone']) ? $this->session->data['payment_address']['zone'] : '', // Get zone from session
                'zone_code' => isset($this->session->data['payment_address']['zone_code']) ? $this->session->data['payment_address']['zone_code'] : '', // Get zone code from session
                'country_id' => isset($this->session->data['payment_address']['country_id']) ? $this->session->data['payment_address']['country_id'] : '', // Get country ID from session
                'country' => isset($this->session->data['payment_address']['country']) ? $this->session->data['payment_address']['country'] : '', // Get country from session
                'iso_code_2' => isset($this->session->data['payment_address']['iso_code_2']) ? $this->session->data['payment_address']['iso_code_2'] : '', // Get ISO code 2 from session
                'iso_code_3' => isset($this->session->data['payment_address']['iso_code_3']) ? $this->session->data['payment_address']['iso_code_3'] : '', // Get ISO code 3 from session
                'address_format' => isset($this->session->data['payment_address']['address_format']) ? $this->session->data['payment_address']['address_format'] : '', // Get address format from session
                'custom_field' => isset($this->session->data['payment_address']['custom_field']) ? $this->session->data['payment_address']['custom_field'] : [] // Get custom fields from session, or an empty array
            ];
            $this->load->model('account/address');
            $this->session->data['payment_address']['address_id'] = $this->model_account_address->addAddress($this->customer->getId(), $payment_address_data);
            unset($this->session->data['payment_address']);
        }



        $this->load->language('checkout/payment_shipping_methods');
        $this->load->language('checkout/checkout');


        $this->document->setTitle($this->language->get('heading_title'));

        $datab['breadcrumbs'] = [];

        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
        ];

        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('text_cart'),
            'href' => $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'))
        ];

        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('checkout/checkout', 'language=' . $this->config->get('config_language'))
        ];
        $data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);

        if (!$this->customer->isLogged()) {
            $data['register'] = $this->load->controller('checkout/register');
        } else {
            $data['register'] = '';
        }

        if ($this->customer->isLogged()) {
            $this->load->language('checkout/register');

            $this->load->language('checkout/payment_address');
            $data_address = $this->load->controller('checkout/address');
            $data_address['type'] = 'payment';
            $data_address['HasShipping'] = $this->cart->hasShipping();

            $data['payment_address'] = $this->load->view('checkout/address', $data_address);
        } else {
            $data['payment_address'] = '';
        }
        if ($this->customer->isLogged() && $this->cart->hasShipping()) {
            $this->load->language('checkout/register');

            $this->load->language('checkout/shipping_address');
            $data_address = $this->load->controller('checkout/address');
            $data_address['type'] = 'shipping';
            $data['shipping_address'] = $this->load->view('checkout/address', $data_address);
        } else {
            $data['shipping_address'] = '';
        }

        if (!$this->cart->hasShipping()) {

            $data['shipping_method'] = false;
        }

        $data['shipping_payment_methods'] = $this->load->controller('checkout/shipping_payment_methods');
        $data['confirm'] = $this->load->controller('checkout/confirm');


        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $data['coupon'] = $this->load->controller('extension/ventocart/total/coupon');
        $this->load->language('checkout/register');

        if ($this->config->get('config_checkout_guest')) {
            $data['button_text'] = $this->language->get('text_guest_checkout');
        } else {
            $data['button_text'] = $this->language->get('text_registration_required');
        }

        $this->response->setOutput($this->load->view('checkout/checkout_ajax', $data));


    }
    public function save($int_ship = null): void
    {
        $this->load->language('checkout/payment_shipping_methods');

        $json = [];

        // Validate cart has products and has stock.
        if ((!$this->cart->hasProducts()) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
            $json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);
        }


        if (!$json) {

            // Payment method
            if (isset($this->request->post['payment_method'])) {
                $payment = explode('.', $this->request->post['payment_method']);


                if (!isset($payment[0]) || !isset($payment[1]) || !isset($this->session->data['payment_methods'][$payment[0]]['quote'][$payment[1]])) {
                    $json['error'] = $this->language->get('error_payment_method');
                }
            } else {
                $json['error'] = $this->language->get('error_payment_method');
            }

            // Shipping method
            if (isset($this->request->post['shipping_method'])) {
                $shipping = explode('.', $this->request->post['shipping_method']);


                if (!isset($shipping[0]) || !isset($shipping[1]) || !isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
                    $json['error'] = $this->language->get('error_shipping_method');
                }
            } else {
                $json['error'] = $this->language->get('error_shipping_method');
            }
        }

        if (!$json) {
            // Handle payment method data
            if (isset($this->request->post['payment_method'])) {
                $payment = explode('.', $this->request->post['payment_method']);
                $this->session->data['payment_method'] = $this->session->data['payment_methods'][$payment[0]]['quote'][$payment[1]];
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



}
