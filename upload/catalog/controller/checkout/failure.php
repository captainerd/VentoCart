<?php
namespace Ventocart\Catalog\Controller\Checkout;
class Failure extends \Ventocart\System\Engine\Controller
{
	public function index(): void
	{
		$this->load->language('checkout/failure');

		$this->document->setTitle($this->language->get('heading_title'));

		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_basket'),
			'href' => $this->url->link('checkout/cart')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_checkout'),
			'href' => $this->url->link('checkout/checkout')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_failure'),
			'href' => $this->url->link('checkout/failure')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['text_message'] = sprintf($this->language->get('text_message'), $this->url->link('information/contact'));

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));
	}
}