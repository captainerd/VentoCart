<?php
namespace Ventocart\Catalog\Controller\Startup;
/**
 * Class Customer
 *
 * @package Ventocart\Catalog\Controller\Startup
 */
class Customer extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->registry->set('customer', new \Ventocart\System\Library\Cart\Customer($this->registry));
		$api_output = isset($this->request->get['apitoken']) ? true : false;

		if ($api_output) {
			$this->response->addHeader('LoggedIn: ' . $this->customer->isLogged());
			$this->customer->setApiClient(true);
			if (isset($this->session->data['apiSigned'])) {
				$this->customer->setApiSigned($this->session->data['apiSigned']);
			}
			// 
		}
		if (!empty($this->request->get['customer_token'])) {
			$this->session->data['customer_token'] = $this->request->get['customer_token'];
		} elseif (!empty($this->session->data['customer_token'])) {
			$this->request->get['customer_token'] = $this->session->data['customer_token'];
		}

		// Customer Group
		if (isset($this->session->data['customer']) && isset($this->session->data['customer']['customer_group_id'])) {
			$this->config->set('config_customer_group_id', $this->session->data['customer']['customer_group_id']);
		} elseif ($this->customer->isLogged()) {
			// Logged in customers
			$this->config->set('config_customer_group_id', $this->customer->getGroupId());
		}

		// Session changing tracking to update guest subscribers (synch old cart items, abandoned cart etc, features)
		if (!$this->customer->isLogged()) {

			if (isset($this->request->cookie['guest']) && $this->request->cookie['guest'] != $this->session->getId()) {

				$oldSession = $this->request->cookie['guest'];
				$cookie_name = 'guest';
				$cookie_value = $this->session->getId();
				$expiration_time = 2147483647;

				// update session ids

				$this->load->model('guest/order');

				$this->model_guest_order->updateSessions($cookie_value, $oldSession);

				// Set the cookie
				setcookie($cookie_name, $cookie_value, $expiration_time, "/", "", false, true);


			}
		}
	}
}