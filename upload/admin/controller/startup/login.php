<?php
namespace Ventocart\Admin\Controller\Startup;
/**
 * Class Login
 *
 * @package Ventocart\Admin\Controller\Startup
 */
class Login extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return \Ventocart\System\Engine\Action
	 */
	public function index(): ?object
	{

		if (isset($this->request->get['route'])) {
			$route = (string) $this->request->get['route'];
		} else {
			$route = 'common/login';
			$this->request->get['route'] = $route;
		}

		// Remove any method call for checking ignore pages.
		$pos = strrpos($route, '.');

		if ($pos !== false) {
			$route = substr($route, 0, $pos);
		}

		$ignore = [
			'common/login',
			'common/forgotten',
			'common/language'
		];

		// User
		$this->registry->set('user', new \Ventocart\System\Library\Cart\User($this->registry));

		if (!$this->user->isLogged() && !in_array($route, $ignore) && substr($route, 0, 4) !== 'api/') {
			$this->load->controller('common/login');
		}

		$ignore = [
			'common/login',
			'common/logout',
			'common/forgotten',
			'common/language',
			'error/not_found',
			'error/permission'
		];

		if (substr($route, 0, 4) !== 'api/' && !in_array($route, $ignore) && (!isset($this->request->get['user_token']) || !isset($this->session->data['user_token']) || ($this->request->get['user_token'] != $this->session->data['user_token']))) {
			$this->load->controller('common/login');
		}

		return null;
	}
}
