<?php
namespace Ventocart\Admin\Controller\Common;
/**
 * Class Logout
 *
 * @package Ventocart\Admin\Controller\Common
 */
class Logout extends \Ventocart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		$this->user->logout();

		unset($this->session->data['user_token']);

		$this->response->redirect($this->url->link('common/login', '', true));
	}
}