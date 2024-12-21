<?php
namespace Ventocart\Admin\Controller\Extension\VentoCart\Analytics;
/**
 * Class googleanalytics
 *
 * @package Ventocart\Admin\Controller\Extension\VentoCart\analytics
 */
class JavaScriptTags extends \Ventocart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		$this->load->language('extension/ventocart/analytics/javascript_tags');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=analytics')
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/ventocart/analytics/javascript_tags', 'user_token=' . $this->session->data['user_token'])
		];

		$store_id = $this->request->get['store_id'];
		$data['store_id'] =  $this->request->get['store_id'];
	    $data['store_tag']  = $this->model_setting_setting->getValue('analytics_javascript_tags_tag',$store_id );
 
		$data['save'] = $this->url->link('extension/ventocart/analytics/javascript_tags.save', 'user_token=' . $this->session->data['user_token']);
		$data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=analytics');

		$data['status'] = $this->model_setting_setting->getValue('analytics_javascript_tags_status',$store_id );

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		 
		$this->response->setOutput($this->load->view('extension/ventocart/analytics/javascript_tags', $data));
	}

	/**
	 * @return void
	 */
	public function save(): void {
		$this->load->language('extension/ventocart/analytics/javascript_tags');

		$json = [];

	 	if (!$this->user->hasPermission('modify', 'extension/ventocart/analytics/javascript_tags')) {
	 		$json['error'] = $this->language->get('error_permission');
	 	}

		if (!$json) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('analytics_javascript_tags', $this->request->post, $this->request->post['store_id']);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	} 
}
