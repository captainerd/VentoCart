<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Tracking
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Tracking extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/tracking');

			$this->response->redirect($this->url->link('account/login'));
		}

		if (!$this->config->get('config_affiliate_status')) {
			$this->response->redirect($this->url->link('account/account'));
		}

		$this->load->model('account/affiliate');

		$affiliate_info = $this->model_account_affiliate->getAffiliate($this->customer->getId());

		if (!$affiliate_info) {
			$this->response->redirect($this->url->link('account/account'));
		}

		$this->load->language('account/tracking');

		$this->document->setTitle($this->language->get('heading_title'));

		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/tracking')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['text_description'] = sprintf($this->language->get('text_description'), $this->config->get('config_name'));

		$data['code'] = $affiliate_info['tracking'];

		$data['continue'] = $this->url->link('account/account');

		$data['language'] = $this->config->get('config_language');

		$data['customer_token'] = $this->session->data['customer_token'];

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/tracking', $data));
	}

	/**
	 * @return void
	 */
	public function autocomplete(): void
	{
		$json = [];

		if (isset($this->request->get['search'])) {
			$search = $this->request->get['search'];
		} else {
			$search = '';
		}

		if (isset($this->request->get['tracking'])) {
			$tracking = $this->request->get['tracking'];
		} else {
			$tracking = '';
		}

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/password');

			$json['redirect'] = $this->url->link('account/login', '', true);
		}

		if (!$json) {
			$filter_data = [
				'filter_search' => $search,
				'start' => 0,
				'limit' => 5
			];

			$this->load->model('catalog/product');

			$results = $this->model_catalog_product->getProducts($filter_data);

			foreach ($results as $result) {
				$json[] = [
					'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
					'link' => str_replace('&amp;', '&', $this->url->link('product/product', 'product_id=' . $result['product_id'] . '&tracking=' . $tracking))
				];
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}