<?php
namespace Ventocart\Admin\Controller\Api\Account;
/**
 * Class Login
 *
 * @package Ventocart\Admin\Controller\Api\Account
 */
class Login extends \Ventocart\System\Engine\Controller {
 
	public function index(): void {
		$this->load->language('api/account/login');
 
		$json = [];

		$this->load->model('api/account');

		if (!isset($this->request->post['username']) && isset($this->request->headers['USERNAME'])) {
			$this->request->post['username'] = trim($this->request->headers['USERNAME']);
		}
		if (!isset($this->request->post['key']) && isset($this->request->headers['KEY'])) {
			$this->request->post['key'] = trim($this->request->headers['KEY']);
		}
	 
		// Login with API Key
		if (!empty($this->request->post['username']) && !empty($this->request->post['key'])) {
			$api_info = $this->model_api_account->login($this->request->post['username'], $this->request->post['key']);
		} else {
			$api_info = [];
		}

		if ($api_info) {
			// Check if IP is allowed
			$ip_data = [];

			$results = $this->model_api_account->getIps($api_info['api_id']);

			foreach ($results as $result) {
				$ip_data[] = trim($result['ip']);
			}

	 
		} else {
			$json['error'] = $this->language->get('error_key');
		}

		if (!$json) {
			$json['success'] = $this->language->get('text_success');

			$session = new \Ventocart\System\Library\Session($this->config->get('session_engine'), $this->registry);
			$session->start();

			$this->model_api_account->addSession($api_info['api_id'], $session->getId(), $this->request->server['REMOTE_ADDR']);

			$session->data['api_id'] = $api_info['api_id'];

			// Create Token
			$json['apitoken'] = $session->getId();
			$json['help_endpoint'] = '/index.php?route=api/sale/orders.shortDocumentaton';
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
