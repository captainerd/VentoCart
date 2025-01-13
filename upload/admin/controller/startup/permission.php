<?php
namespace Ventocart\Admin\Controller\Startup;
/**
 * Class Permission
 *
 * @package Ventocart\Admin\Controller\Startup
 */
class Permission extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return object
	 */
	public function index(): ?object
	{
		if (isset($this->request->get['route'])) {
			$pos = strrpos($this->request->get['route'], '.');

			if ($pos === false) {
				$route = $this->request->get['route'];
			} else {
				$route = substr($this->request->get['route'], 0, $pos);
			}

			// We want to ignore some pages from having its permission checked.
			$ignore = [
				'common/dashboard',
				'common/login',
				'common/logout',
				'common/forgotten',
				'common/authorize',
				'common/language',
				'error/not_found',
				'error/permission'
			];

			if (substr($route, 0, 4) !== 'api/' && !in_array($route, $ignore) && !$this->user->hasPermission('access', $route)) {
				$this->load->controller('error/permission');
			}
		}

		return null;
	}
}
