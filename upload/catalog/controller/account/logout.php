<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Logout
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Logout extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{

		$this->load->language('account/logout');


		if ($this->customer->isLogged()) {
			foreach ($_COOKIE as $cookie_name => $cookie_value) {
				setcookie($cookie_name, '', time() - 3600, '/');
			}

			$this->customer->logout();

			unset($this->session->data['customer']);
			unset($this->session->data['shipping_address']);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_address']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['comment']);
			unset($this->session->data['order_id']);
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);

			unset($this->session->data['customer_token']);

			$this->response->redirect($this->url->link('account/logout'));
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
			'text' => $this->language->get('text_logout'),
			'href' => $this->url->link('account/logout')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['clearStorage'] = true;
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');


		$this->response->setOutput($this->load->view('common/success', $data));


	}
}
