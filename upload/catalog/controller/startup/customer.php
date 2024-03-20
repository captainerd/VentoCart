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
	
		if (!empty($this->request->get['customer_token'])) {
			$this->session->data['customer_token'] =$this->request->get['customer_token'];
		} elseif (!empty($this->session->data['customer_token'])) {
			$this->request->get['customer_token'] = $this->session->data['customer_token'];
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