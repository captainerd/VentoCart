<?php
namespace Ventocart\Catalog\Controller\Startup;
/**
 * Class Api
 *
 * @package Ventocart\Catalog\Controller\Startup
 */
class Api extends \Ventocart\System\Engine\Controller {
	/**
	 * @return object|\Ventocart\System\Engine\Action|null
	 */
	public function index(): ?object {
		if (isset($this->request->get['route'])) {
			$route = (string)$this->request->get['route'];
		} else {
			$route = '';
		}

		if (substr($route, 0, 4) == 'api/' && $route !== 'api/account/login' && !isset($this->session->data['api_id'])) {
			return new \Ventocart\System\Engine\Action('error/permission');
		}

		return null;
	}
}
