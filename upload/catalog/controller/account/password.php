<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Password
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Password extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('account/password');

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/order');

			$this->response->redirect($this->url->link('account/login'));
		}

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
			'href' => $this->url->link('account/password')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['save'] = $this->url->link('account/password.save');
		$data['back'] = $this->url->link('account/account');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/password', $data));
	}

	/**
	 * @return void
	 */
	public function save(): void
	{
		$this->load->language('account/password');

		$json = [];

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/password');

			$json['redirect'] = $this->url->link('account/login', '', true);
		}

		if (!$json) {
			$keys = [
				'password',
				'confirm'
			];

			foreach ($keys as $key) {
				if (!isset($this->request->post[$key])) {
					$this->request->post[$key] = '';
				}
			}

			if ((oc_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) < 4) || (oc_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) > 40)) {
				$json['error']['password'] = $this->language->get('error_password');
			}

			if ($this->request->post['confirm'] != $this->request->post['password']) {
				$json['error']['confirm'] = $this->language->get('error_confirm');
			}
		}

		if (!$json) {
			$this->load->model('account/customer');

			$this->model_account_customer->editPassword($this->customer->getEmail(), $this->request->post['password']);

			$this->session->data['success'] = $this->language->get('text_success');

			$json['redirect'] = $this->url->link('account/account', true);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}