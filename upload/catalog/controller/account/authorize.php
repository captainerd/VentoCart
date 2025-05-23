<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Authorize
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Authorize extends \Ventocart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		$this->load->language('account/authorize');

		$this->document->setTitle($this->language->get('heading_title'));

		if (isset($this->request->cookie['authorize'])) {
			$token = $this->request->cookie['authorize'];
		} else {
			$token = '';
		}

		// Check to see if user is using incorrect token
		if (isset($this->session->data['error'])) {
			$data['error_warning'] = $this->session->data['error'];

			unset($this->session->data['error']);
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$this->load->model('account/customer');

		$login_info = $this->model_account_customer->getAuthorizeByToken($this->user->getId(), $token);

		if (!$login_info) {
			// Create a token that can be stored as a cookie and will be used to identify device is safe.
			$token = oc_token(32);

			$authorize_data = [
				'token'      => $token,
				'ip'         => $this->request->server['REMOTE_ADDR'],
				'user_agent' => $this->request->server['HTTP_USER_AGENT']
			];

			$this->load->model('account/customer');

			$this->model_account_customer->addAuthorize($this->customer->getId(), $authorize_data);

			setcookie('authorize', $token, time() + 60 * 60 * 24 * 365 * 10);
		}

		$data['action'] = $this->url->link('account/authorize.validate', 'user_token=' . $this->session->data['user_token']);

		// Set the code to be emailed
		$this->session->data['code'] = oc_token(4);

		if (isset($this->request->get['route']) && $this->request->get['route'] != 'account/login' && $this->request->get['route'] != 'account/authorize') {
			$args = $this->request->get;

			$route = $args['route'];

			unset($args['route']);
			unset($args['user_token']);

			$url = '';

			if ($args) {
				$url .= http_build_query($args);
			}

			$data['redirect'] = $this->url->link($route, $url, true);
		} else {
			$data['redirect'] = $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('common/authorize', $data));
	}

	/**
	 * @return void
	 */
	public function send(): void {
		$this->load->language('account/authorize');

		$json = [];

		$json['success'] = $this->language->get('text_resend');

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function validate(): void {
		$this->load->language('account/authorize');

		$json = [];

		if (isset($this->request->cookie['authorize'])) {
			$token = $this->request->cookie['authorize'];
		} else {
			$token = '';
		}

		$this->load->model('account/customer');

		$authorize_info = $this->model_account_customer->getAuthorizeByToken($this->customer->getId(), $token);

		if ($authorize_info) {
			if (($authorize_info['attempts'] <= 2) && (!isset($this->request->post['code']) || !isset($this->session->data['code']) || ($this->request->post['code'] != $this->session->data['code']))) {
				$json['error'] = $this->language->get('error_code');

				$this->model_account_customer->editAuthorizeTotal($authorize_info['customer_authorize_id'], $authorize_info['total'] + 1);
			}

			if ($authorize_info['attempts'] >= 2) {
				$json['redirect'] = $this->url->link('account/authorize.unlock', 'user_token=' . $this->session->data['user_token'], true);
			}
		} else {
			$json['error'] = $this->language->get('error_code');
		}

		if (!$json) {
			$this->model_account_customer->editAuthorizeStatus($authorize_info['customer_authorize_id'], 1);
			$this->model_account_customer->editAuthorizeTotal($authorize_info['customer_authorize_id'], 0);

			// Register the cookie for security.
			if (isset($this->request->post['redirect']) && str_starts_with(html_entity_decode($this->request->post['redirect'], ENT_QUOTES, 'UTF-8'), HTTP_SERVER)) {
				$json['redirect'] = html_entity_decode($this->request->post['redirect'], ENT_QUOTES, 'UTF-8') . '&user_token=' . $this->session->data['user_token'];
			} else {
				$json['redirect'] = $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function unlock(): void {
		$this->load->language('account/authorize');

		if (isset($this->request->cookie['authorize'])) {
			$token = $this->request->cookie['authorize'];
		} else {
			$token = '';
		}

		$this->load->model('account/customer');

		$authorize_info = $this->model_account_customer->getAuthorizeByToken($this->customer->getId(), $token);

		if ($authorize_info && $authorize_info['status']) {
			// Redirect if already have a valid token.
			$this->response->redirect($this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true));
		}

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('common/authorize_unlock', $data));
	}

	/**
	 * @return void
	 */
	public function confirm(): void {
		$this->load->language('account/authorize');

		$json = [];

		$json['success'] = $this->language->get('text_link');

		// Create reset code
		$this->load->model('account/customer');

		$this->model_account_customer->editCode($this->customer->getEmail(), oc_token(32));

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function reset(): void {
		$this->load->language('account/authorize');

		if (isset($this->request->get['email'])) {
			$email = (string)$this->request->get['email'];
		} else {
			$email = '';
		}

		if (isset($this->request->get['code'])) {
			$code = (string)$this->request->get['code'];
		} else {
			$code = '';
		}

		$this->load->model('account/customer');

		$customer_info = $this->model_account_customer->getCustomerByEmail($email);

		if ($customer_info && $customer_info['code'] && $code && $customer_info['code'] === $code) {
			$this->model_account_customer->resetAuthorizes($customer_info['customer_id']);

			$this->model_account_customer->editCode($email, '');

			$this->session->data['success'] = $this->language->get('text_unlocked');

			$this->response->redirect($this->url->link('account/authorize', 'user_token=' . $this->session->data['user_token'], true));
		} else {
			$this->customer->logout();

			$this->model_account_customer->editCode($email, '');

			$this->session->data['error'] = $this->language->get('error_reset');

			$this->response->redirect($this->url->link('account/login', '', true));
		}
	}
}
