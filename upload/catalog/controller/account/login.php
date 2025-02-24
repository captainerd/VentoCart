<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Login
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Login extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('account/login');

		$this->document->setTitle($this->language->get('heading_title'));

		// If already logged in and has matching token then redirect to account page
		if ($this->customer->isLogged() && isset($this->request->get['customer_token']) && isset($this->session->data['customer_token']) && ($this->request->get['customer_token'] == $this->session->data['customer_token'])) {
			$this->response->redirect($this->url->link('account/account'));
		}

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
			'text' => $this->language->get('text_login'),
			'href' => $this->url->link('account/login')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		// Check to see if user is using incorrect token
		if (isset($this->session->data['customer_token'])) {
			$data['error_warning'] = $this->language->get('error_token');

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
		} elseif (isset($this->session->data['error'])) {
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

		if (isset($this->session->data['redirect'])) {
			$data['redirect'] = $this->session->data['redirect'];

			unset($this->session->data['redirect']);
		} elseif (isset($this->request->get['redirect'])) {
			$data['redirect'] = urldecode($this->request->get['redirect']);
		} else {
			$data['redirect'] = '';
		}

		// Register and logins are done with "Zero-Field Name Nonce" approach, where a nonce 
		// comes in unknown dynamically named input fields which have to be submited with the form and validated.

		$this->session->data['login_token'] = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);

		// We also generate a random field name for the token 
		$this->session->data['login_token_field'] = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 5 + rand(1, 10));


		// We also generate a random id name for the form  
		$data['form_name'] = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 5 + rand(1, 10));



		$data['login_token_field'] = $this->session->data['login_token_field'];
		$data['login_token'] = $this->session->data['login_token'];
		$data['login'] = $this->url->link('account/login.login');
		$data['register'] = $this->url->link('account/register');
		$data['forgotten'] = $this->url->link('account/forgotten');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/login', $data));
	}

	/**
	 * @return void
	 */
	public function login(): void
	{
		$this->load->language('account/login');

		$json = [];

		// Stop any undefined index messages.
		$keys = [
			'email',
			'password',
			'redirect'
		];

		foreach ($keys as $key) {
			if (!isset($this->request->post[$key])) {
				$this->request->post[$key] = '';
			}
		}

		$this->customer->logout();

		if (
			!isset($this->request->post[$this->session->data['login_token_field']]) || !isset($this->session->data['login_token']) ||
			($this->request->post[$this->session->data['login_token_field']] != $this->session->data['login_token'])
		) {


			$json['redirect'] = $this->url->link('account/login', true);


		}


		if (!$json) {
			// Check how many login attempts have been made.
			$this->load->model('account/customer');

			$login_info = $this->model_account_customer->getLoginAttempts($this->request->post['email']);

			if ($login_info && ($login_info['total'] >= $this->config->get('config_login_attempts')) && strtotime('-1 hour') < strtotime($login_info['date_modified'])) {
				$json['error']['warning'] = $this->language->get('error_attempts');
			}

			// Check if customer has been approved.
			$customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);

			if ($customer_info && !$customer_info['status']) {
				$json['error']['warning'] = $this->language->get('error_approved');
			} elseif (!$this->customer->login($this->request->post['email'], html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8'))) {
				$json['error']['warning'] = $this->language->get('error_login');

				$this->model_account_customer->addLoginAttempt($this->request->post['email']);
			}
		}

		if (!$json) {
			// Add customer details into session
			$this->session->data = [];
			$this->session->data['customer'] = [
				'customer_id' => $customer_info['customer_id'],
				'customer_group_id' => $customer_info['customer_group_id'],
				'firstname' => $customer_info['firstname'],
				'lastname' => $customer_info['lastname'],
				'email' => $customer_info['email'],
				'telephone' => $customer_info['telephone'],
				'custom_field' => $customer_info['custom_field']
			];

			unset($this->session->data['order_id']);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);

			// Wishlist
			if (isset($this->session->data['wishlist']) && is_array($this->session->data['wishlist'])) {
				$this->load->model('account/wishlist');

				foreach ($this->session->data['wishlist'] as $key => $product_id) {
					$this->model_account_wishlist->addWishlist($product_id);

					unset($this->session->data['wishlist'][$key]);
				}
			}

			// Log the IP info
			$this->model_account_customer->addLogin($this->customer->getId(), $this->request->server['REMOTE_ADDR']);

			// Create customer token
			$this->session->data['customer_token'] = oc_token(26);

			$this->model_account_customer->deleteLoginAttempts($this->request->post['email']);

			// Added strpos check to pass McAfee PCI compliance test (http://forum.ventocart.com/viewtopic.php?f=10&t=12043&p=151494#p151295)
			if (isset($this->request->post['redirect']) && str_starts_with(html_entity_decode($this->request->post['redirect'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_url'))) {

				$json['redirect'] = html_entity_decode($this->request->post['redirect'], ENT_QUOTES, 'UTF-8') . '&customer_token=' . $this->session->data['customer_token'];


			} else {

				$json['redirect'] = $this->url->link('account/account', true);

			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));

	}


	/** 
	 * @return void
	 */
	public function token(): void
	{
		$this->load->language('account/login');

		if (isset($this->request->get['email'])) {
			$email = $this->request->get['email'];
		} else {
			$email = '';
		}

		if (isset($this->request->get['login_token'])) {
			$token = $this->request->get['login_token'];
		} else {
			$token = '';
		}

		// Login override for admin users
		$this->customer->logout();
		$this->cart->clear();

		unset($this->session->data['order_id']);
		unset($this->session->data['payment_address']);
		unset($this->session->data['payment_method']);
		unset($this->session->data['payment_methods']);
		unset($this->session->data['shipping_address']);
		unset($this->session->data['shipping_method']);
		unset($this->session->data['shipping_methods']);
		unset($this->session->data['comment']);
		unset($this->session->data['coupon']);
		unset($this->session->data['reward']);

		unset($this->session->data['customer_token']);

		$this->load->model('account/customer');

		$customer_info = $this->model_account_customer->getCustomerByEmail($email);

		if ($customer_info && $customer_info['token'] && $customer_info['token'] == $token && $this->customer->login($customer_info['email'], '', true)) {
			// Add customer details into session
			$this->session->data['customer'] = [
				'customer_id' => $customer_info['customer_id'],
				'customer_group_id' => $customer_info['customer_group_id'],
				'firstname' => $customer_info['firstname'],
				'lastname' => $customer_info['lastname'],
				'email' => $customer_info['email'],
				'telephone' => $customer_info['telephone'],
				'custom_field' => $customer_info['custom_field']
			];

			// Default Addresses
			$this->load->model('account/address');

			$address_info = $this->model_account_address->getAddress($this->customer->getId(), $this->customer->getAddressId());

			if ($address_info) {
				$this->session->data['shipping_address'] = $address_info;
			}

			if ($this->config->get('config_tax_customer') && $address_info) {
				$this->session->data[$this->config->get('config_tax_customer') . '_address'] = $address_info;
			}

			$this->model_account_customer->editToken($email, '');

			// Create customer token
			$this->session->data['customer_token'] = oc_token(26);

			$this->response->redirect($this->url->link('account/account'));
		} else {
			$this->session->data['error'] = $this->language->get('error_login');

			$this->model_account_customer->editToken($email, '');

			$this->response->redirect($this->url->link('account/login'));
		}
	}
}
