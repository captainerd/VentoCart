<?php
namespace Opencart\Catalog\Controller\Startup;
/**
 * Class Customer
 *
 * @package Opencart\Catalog\Controller\Startup
 */
class Customer extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		$this->registry->set('customer', new \Opencart\System\Library\Cart\Customer($this->registry));
	 
		if (isset($this->request->get['customer_token'])) {
			$customer_token = $this->request->get['customer_token'];

		} else {
			$customer_token = 0;
		}

		$option = [
			'expires'  => time() + 60 * 60 * 24 * 30,
			'path'     => '/',
			'SameSite' => 'Lax'
		];

	 
		if (isset($customer_token) && empty($_COOKIE['customer']) || !empty($_COOKIE['customer']) && $customer_token != 0 && $customer_token != $_COOKIE['customer']) {
		 
		setcookie('customer', $customer_token, $option);
		}

		// Having url strings with tokens instead of cookies neither provides any securiy (browser history is more accesible than cookies) 
		// as much as the damage to readbility and clean url's (theme stability error prone) as it gets.
		//  Override ->get[customer_token] until its cleaned in the framework
		if (empty($this->request->get['customer_token']) && !empty($_COOKIE['customer'])) {
			 
			$this->request->get['customer_token'] = $_COOKIE['customer'];
		}



		// Customer Group
		if (isset($this->session->data['customer'])) {

			$this->config->set('config_customer_group_id', $this->session->data['customer']['customer_group_id']);
		} elseif ($this->customer->isLogged()) {
			// Logged in customers
	 
			$this->config->set('config_customer_group_id', $this->customer->getGroupId());
		}
	}
}