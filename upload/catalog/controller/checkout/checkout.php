<?php
namespace Opencart\Catalog\Controller\Checkout;
class Checkout extends \Opencart\System\Engine\Controller {
	public function index(): void {
		// Validate cart has products and has stock.
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$this->response->redirect($this->url->link('checkout/cart', 'language=' . $this->config->get('config_language')));
		}

		// Validate minimum quantity requirements.
		$products = $this->cart->getProducts();

		foreach ($products as $product) {
			if (!$product['minimum']) {
				$this->response->redirect($this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true));

				break;
			}
		}
        $this->load->language('checkout/payment_method');
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
            $data['payment_address'] =  $this->load->view('checkout/address', $data_address );
		} else {
			$data['payment_address'] = '';
		}
		if ($this->customer->isLogged() && $this->cart->hasShipping()) {
            $this->load->language('checkout/register');
		
            $this->load->language('checkout/shipping_address');
			$data_address = $this->load->controller('checkout/address');
            $data_address['type'] = 'shipping';
            $data['shipping_address'] =  $this->load->view('checkout/address', $data_address );
		}  else {
			$data['shipping_address'] = '';
		}

		if ($this->cart->hasShipping()) {
		//	$data['shipping_method'] = $this->load->controller('checkout/shipping_method');
		}  else {
			$data['shipping_method'] = false;
		}

		 
 
		$data['shipping_payment_methods'] = $this->load->controller('checkout/shipping_payment_methods');

		//$data['payment_method'] = $this->load->controller('checkout/payment_method');
		$data['confirm'] = $this->load->controller('checkout/confirm');

		$data['payment'] = $this->load->controller('checkout/payment');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$data['coupon'] = $this->load->controller('extension/opencart/total/coupon');
        $this->load->language('checkout/register');
  
        if ($this->config->get('config_checkout_guest') ) {
            $data['button_text'] = $this->language->get('text_guest_checkout');
        } else {
            $data['button_text'] = $this->language->get('text_registration_required');
        }

		$this->response->setOutput($this->load->view('checkout/checkout_ajax', $data));
	}
	public function save($int_ship = null): void
{
    $this->load->language('checkout/shipping_method');
    $this->load->language('checkout/payment_method');

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
        // Validate if customer is logged in or customer session data is not set
        if (!isset($this->session->data['customer'])) {
            // $json['error'] = $this->language->get('error_customer');
        }

        // Validate if payment address is set if required in settings
        if ( !isset($this->session->data['payment_address'])) {
            // $json['error'] = $this->language->get('error_payment_address');
        }

        // Validate if shipping not required. If not, the customer should not have reached this page.
        if ($this->cart->hasShipping() && !isset($this->session->data['shipping_address']['address_id'])) {
            // $json['error'] = $this->language->get('error_shipping_address');
        }

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
