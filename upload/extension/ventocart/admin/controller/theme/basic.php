<?php
namespace Ventocart\Admin\Controller\Extension\Ventocart\Theme;
/**
 * Class Basic
 *
 * @package Ventocart\Admin\Controller\Extension\Ventocart\Theme
 */
class Basic extends \Ventocart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		$this->load->language('extension/ventocart/theme/basic');

		$this->document->setTitle($this->language->get('heading_title'));

		if (isset($this->request->get['store_id'])) {
			$store_id = (int)$this->request->get['store_id'];
		} else {
			$store_id = 0;
		}

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme')
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/ventocart/theme/basic', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $store_id)
		];

		$data['save'] = $this->url->link('extension/ventocart/theme/basic.save', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $store_id);
		$data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');

		if (isset($this->request->get['store_id'])) {
			$this->load->model('setting/setting');

			$setting_info = $this->model_setting_setting->getSetting('theme_basic', $this->request->get['store_id']);
		}

		if (isset($setting_info['theme_basic_status'])) {
			$data['theme_basic_status'] = $setting_info['theme_basic_status'];
		} else {
			$data['theme_basic_status'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/ventocart/theme/basic', $data));
	}

	/**
	 * @return void
	 */
	public function save(): void {
		$this->load->language('extension/ventocart/theme/basic');

		if (isset($this->request->get['store_id'])) {
			$store_id = (int)$this->request->get['store_id'];
		} else {
			$store_id = 0;
		}

		$json = [];

		if (!$this->user->hasPermission('modify', 'extension/ventocart/theme/basic')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('theme_basic', $this->request->post, $store_id);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
