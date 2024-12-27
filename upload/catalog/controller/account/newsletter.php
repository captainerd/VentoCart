<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Newsletter
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Newsletter extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('account/newsletter');

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/newsletter');

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
			'text' => $this->language->get('text_newsletter'),
			'href' => $this->url->link('account/newsletter')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['save'] = $this->url->link('account/newsletter.save');

		$data['newsletter'] = $this->customer->getNewsletter();

		$data['back'] = $this->url->link('account/account');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/newsletter', $data));
	}

	/**
	 * @return void
	 */
	public function save(): void
	{
		$this->load->language('account/newsletter');

		$json = [];

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/newsletter');

			$json['redirect'] = $this->url->link('account/login', '', true);
		}

		if (!$json) {
			$this->load->model('account/customer');

			$this->model_account_customer->editNewsletter($this->request->post['newsletter']);

			$this->session->data['success'] = $this->language->get('text_success');

			$json['redirect'] = $this->url->link('account/account', true);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
