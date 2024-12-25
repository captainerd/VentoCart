<?php
namespace Ventocart\Admin\Controller\Startup;
/**
 * Class Session
 *
 * @package Ventocart\Admin\Controller\Startup
 */
class Session extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 * @throws \Exception
	 */
	public function index(): void
	{
		$session = new \Ventocart\System\Library\Session($this->config->get('session_engine'), $this->registry);
		$this->registry->set('session', $session);


		if (!isset($this->request->get['apitoken']) && isset($this->request->headers['APITOKEN'])) {
			$this->request->get['apitoken'] = $this->request->headers['APITOKEN'];
		}


		if (isset($this->request->get['route']) && substr((string) $this->request->get['route'], 0, 4) == 'api/' && isset($this->request->get['apitoken'])) {
			$this->load->model('api/setting');

			$this->model_api_setting->cleanSessions();

			$api_info = $this->model_api_setting->getApiByToken($this->request->get['apitoken']);

			if ($api_info) {

				$this->session->start($this->request->get['apitoken']);

				$this->model_api_setting->updateSession($api_info['api_session_id']);

			} else {
				$this->wrong_api_key();
			}

			return;
		}

		if (isset($this->request->get['route']) && $this->request->get['route'] != "api/account/login" && substr((string) $this->request->get['route'], 0, 4) == 'api/' && !isset($this->request->get['apitoken'])) {
			// Provide feedback to the client
			$this->wrong_api_key();

		}


		if (isset($this->request->cookie[$this->config->get('session_name')])) {
			$session_id = $this->request->cookie[$this->config->get('session_name')];
		} else {
			$session_id = '';
		}

		$session->start($session_id);

		// Update the session lifetime
		if ($this->config->get('config_session_expire')) {
			$this->config->set('session_expire', $this->config->get('config_session_expire'));
		}

		// Require higher security for session cookies
		$option = [
			'expires' => $this->config->get('config_session_expire') ? time() + (int) $this->config->get('config_session_expire') : 0,
			'path' => $this->config->get('session_path'),
			'secure' => $this->request->server['HTTPS'],
			'httponly' => false,
			'SameSite' => $this->config->get('config_session_samesite')
		];

		setcookie($this->config->get('session_name'), $session->getId(), $option);
	}
	private function wrong_api_key()
	{

		$json['error'] = "api_key_failed";
		$this->response->setOutput(json_encode($json));
		$this->response->addHeader('Content-Type: application/json');
		$this->response->output();
		die();
	}
}