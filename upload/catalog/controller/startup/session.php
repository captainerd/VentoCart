<?php
namespace Ventocart\Catalog\Controller\Startup;
/**
 * Class Session
 *
 * @package Ventocart\Catalog\Controller\Startup
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
		$session_expiry_time = time() + (int) $this->config->get('config_session_expire');
		$option = [
			'expires' => $session_expiry_time,
			'path' => $this->config->get('session_path'),
			'secure' => $this->request->server['HTTPS'],
			'httponly' => false,
			'SameSite' => $this->config->get('session_samesite')
		];

		setcookie($this->config->get('session_name'), $session->getId(), $option);
	}



}
