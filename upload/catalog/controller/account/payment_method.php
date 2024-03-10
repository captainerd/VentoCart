<?php
namespace Opencart\Catalog\Controller\Account;

/**
 * Class Payment Method
 *
 * @package Opencart\Catalog\Controller\Account
 */
class PaymentMethod extends \Opencart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('account/payment_method');

		if (!$this->customer->isLogged() || (!isset($this->request->get['customer_token']) || !isset($this->session->data['customer_token']) || ($this->request->get['customer_token'] != $this->session->data['customer_token']))) {
			$this->session->data['redirect'] = $this->url->link('account/payment_method', 'language=' . $this->config->get('config_language'));

			$this->response->redirect($this->url->link('account/login', 'language=' . $this->config->get('config_language')));
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'])
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/payment_method', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'])
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['list'] = $this->getList();

		$data['continue'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);

		$data['language'] = $this->config->get('config_language');

		$data['customer_token'] = $this->session->data['customer_token'];

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/payment_method', $data));
	}

	/**
	 * @return void
	 */
	public function list(): void
	{
		$this->load->language('account/payment_method');

		if (!$this->customer->isLogged() || (!isset($this->request->get['customer_token']) || !isset($this->session->data['customer_token']) || ($this->request->get['customer_token'] != $this->session->data['customer_token']))) {
			$this->session->data['redirect'] = $this->url->link('account/payment_method', 'language=' . $this->config->get('config_language'));

			$this->response->redirect($this->url->link('account/login', 'language=' . $this->config->get('config_language')));
		}

		$this->response->setOutput($this->getList());
	}

	/**
	 * @return string
	 */
	protected function getList(): string
	{
		$data['payment_methods'] = [];

		$this->load->model('setting/extension');

		$results = $this->model_setting_extension->getExtensionsByType('payment');

		foreach ($results as $result) {
			if ($this->config->get('payment_' . $result['code'] . '_status')) {
				$this->load->model('extension/' . $result['extension'] . '/payment/' . $result['code']);
 
		 
				try {
					$payment_method_info = $this->{'model_extension_' . $result['extension'] . '_payment_' . $result['code']}->getStored();

					if ($payment_method_info) {
						if (isset($payment_method_info['code'])) {
							// Single payment method
							$data['payment_methods'][] = [
								'id' => $payment_method_info['id'],
								'name' => $payment_method_info['name'],
								'date_expire' => $payment_method_info['date_expire'],
								'type' => $payment_method_info['description'],
								'image' => $payment_method_info['image'],
								'delete' => $this->url->link('account/payment_method.delete', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'] . '&code=' . $result['code'] . '&id=' . $payment_method_info['id'])
							];
						} else {
							// Multiple payment methods
							foreach ($payment_method_info as $info) {
								$data['payment_methods'][] = [
									'id' => $info['id'],
									'name' => $info['name'],
									'date_expire' => $info['date_expire'],
									'type' => $info['description'] . ' ****' .  $info['last_four'],
									'image' => $info['image'],
									'delete' => $this->url->link('account/payment_method.delete', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'] . '&code=' . $result['code'] . '&id=' . $info['id'])
								];
							}
						}
					}
				} catch (\Exception $e) {
				 // Method not found, or an error occurred.
				}
			} 
		}

		return $this->load->view('account/payment_method_list', $data);
	}

	/**
	 * @return void
	 */
	public function delete(): void
	{
		$this->load->language('account/payment_method');

		$json = [];
	 
		if (isset($this->request->get['code'])) {
			$code = (string) $this->request->get['code'];
		} else {
			$code = '';
		}
		if (isset($this->request->get['id'])) {
			$id = (string) $this->request->get['id'];
		} else {
			$id = '';
		}

		if (!$this->customer->isLogged() || (!isset($this->request->get['customer_token']) || !isset($this->session->data['customer_token']) || ($this->request->get['customer_token'] != $this->session->data['customer_token']))) {
			$this->session->data['redirect'] = $this->url->link('account/payment_method', 'language=' . $this->config->get('config_language'));

			$json['redirect'] = $this->url->link('account/login', 'language=' . $this->config->get('config_language'), true);
		}
	 
		if (!$json) {
		 
	 
			$payment_method_info = $this->model_setting_extension->getExtensionByCode('payment', $code);
		 
			if (!$payment_method_info) {
				$json['error'] = $this->language->get('error_payment_method');
			}
		}
	 
		if (!$json) {
			$this->load->model('extension/' . $payment_method_info['extension'] . '/payment/' . $payment_method_info['code']);
			$deleted = false;
			try {
				$deleted =  $this->{'model_extension_' . $payment_method_info['extension'] . '_payment_' . $payment_method_info['code']}->delete($id);
			} catch (\Exception $e) {
				// Method not found, or an error occurred.
			   }
			   if ($deleted) {
			$json['success'] = $this->language->get('text_success');
			   } else {
				$json['error'] = $this->language->get('text_error');
			   }
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
