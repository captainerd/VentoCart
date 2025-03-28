<?php
namespace Ventocart\Admin\Controller\Extension\Ventocart\Dashboard;
/**
 * Class Activity
 *
 * @package Ventocart\Admin\Controller\Extension\Ventocart\Dashboard
 */
class Activity extends \Ventocart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		$this->load->language('extension/ventocart/dashboard/activity');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard')
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/ventocart/dashboard/activity', 'user_token=' . $this->session->data['user_token'])
		];

		$data['save'] = $this->url->link('extension/ventocart/dashboard/activity.save', 'user_token=' . $this->session->data['user_token']);
		$data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard');

		$data['dashboard_activity_width'] = $this->config->get('dashboard_activity_width');

		$data['columns'] = [];

		for ($i = 3; $i <= 12; $i++) {
			$data['columns'][] = $i;
		}

		$data['dashboard_activity_status'] = $this->config->get('dashboard_activity_status');
		$data['dashboard_activity_sort_order'] = $this->config->get('dashboard_activity_sort_order');

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/ventocart/dashboard/activity_form', $data));
	}

	/**
	 * @return void
	 */
	public function save(): void {
		$this->load->language('extension/ventocart/dashboard/activity');

		$json = [];

		if (!$this->user->hasPermission('modify', 'extension/ventocart/dashboard/activity')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('dashboard_activity', $this->request->post);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return string
	 */
	public function dashboard(): string {
		$this->load->language('extension/ventocart/dashboard/activity');

		$data['activities'] = [];

		$this->load->model('extension/ventocart/report/activity');

		$results = $this->model_extension_ventocart_report_activity->getActivities();

		foreach ($results as $result) {
			$comment = vsprintf($this->language->get('text_activity_' . $result['key']), json_decode($result['data'], true));

			$find = [
				'customer_id=',
				'order_id=',
				'return_id='
			];

			$replace = [
				$this->url->link('customer/customer.form', 'user_token=' . $this->session->data['user_token'] . '&customer_id='),
				$this->url->link('sale/order.info', 'user_token=' . $this->session->data['user_token'] . '&order_id='),
				$this->url->link('sale/return.form', 'user_token=' . $this->session->data['user_token'] . '&return_id=')
			];

			$data['activities'][] = [
				'comment'    => str_replace($find, $replace, $comment),
				'date_added' => date($this->language->get('datetime_format'), strtotime($result['date_added']))
			];
		}

		$data['user_token'] = $this->session->data['user_token'];

		return $this->load->view('extension/ventocart/dashboard/activity_info', $data);
	}
}