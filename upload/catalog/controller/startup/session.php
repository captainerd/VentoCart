<?php
namespace Opencart\Catalog\Controller\Startup;
/**
 * Class Session
 *
 * @package Opencart\Catalog\Controller\Startup
 */
class Session extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 * @throws \Exception
	 */
	public function index(): void {
		$session = new \Opencart\System\Library\Session($this->config->get('session_engine'), $this->registry);
		$this->registry->set('session', $session);

		if (isset($this->request->get['route']) && substr((string)$this->request->get['route'], 0, 4) == 'api/' && isset($this->request->get['api_token'])) {
			$this->load->model('setting/api');

			$this->model_setting_api->cleanSessions();

			// Make sure the IP is allowed
			$api_info = $this->model_setting_api->getApiByToken($this->request->get['api_token']);

			if ($api_info) {
				$this->session->start($this->request->get['api_token']);

				$this->model_setting_api->updateSession($api_info['api_session_id']);
			}

			return;
		}
 
		// Update the session lifetime
		if ($this->config->get('config_session_expire')) {
			$this->config->set('session_expire', $this->config->get('config_session_expire'));
		}

		// Update the session SameSite
		$this->config->set('session_samesite', $this->config->get('config_session_samesite'));

		if (isset($this->request->cookie[$this->config->get('session_name')])) {
			$session_id = $this->request->cookie[$this->config->get('session_name')];
		} else {
			$session_id = '';
		}

		$session->start($session_id);

		$option = [
			'expires'  => time() + (int)$this->config->get('config_session_expire'),
			'path'     => $this->config->get('session_path'),
			'secure'   => $this->request->server['HTTPS'],
			'httponly' => false,
			'SameSite' => $this->config->get('session_samesite')
		];

		$this->response->addHeader('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

		setcookie($this->config->get('session_name'), $session->getId(), $option);
	}
}
