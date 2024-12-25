<?php
namespace Ventocart\Catalog\Controller\Checkout;
class Success extends \Ventocart\System\Engine\Controller
{
	public function index(): void
	{
		$this->load->language('checkout/success');


		if (isset($this->session->data['order_id'])) {
			$order_id = $this->session->data['order_id'];
			$this->cart->clear();

			unset($this->session->data['order_id']);

			//	unset($this->session->data['payment_address']);
			unset($this->session->data['shipping_address']);

			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['comment']);
			unset($this->session->data['agree']);
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);

		}

		$this->document->setTitle($this->language->get('heading_title'));
		$data['title'] = $this->language->get('heading_title');
		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_basket'),
			'href' => $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'))
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_checkout'),
			'href' => $this->url->link('checkout/checkout', 'language=' . $this->config->get('config_language'))
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_success'),
			'href' => $this->url->link('checkout/success', 'language=' . $this->config->get('config_language'))
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		if ($this->customer->isLogged()) {
			$data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']), $this->url->link('account/order', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']), $this->url->link('account/download', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']), $this->url->link('information/contact', 'language=' . $this->config->get('config_language')));
		} else {
			$this->load->model('guest/order');



			$data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact', 'language=' . $this->config->get('config_language')));
			$guest_order_top = $this->language->get('text_guest_top');
			$guest_order_middle = '';
			if (isset($order_id)) {
				$order_code = $this->model_guest_order->encryptOrderId($order_id);
				$guest_order_middle = sprintf($this->language->get('text_guest_middle'), '?route=guest/order.get&order_id=' . $order_code, $order_code);
			}
			$data['text_message'] = $guest_order_top . $guest_order_middle . $this->language->get('text_guest_bottom');

		}




		$data['continue'] = $this->url->link('common/home', 'language=' . $this->config->get('config_language'));

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));

	}
}