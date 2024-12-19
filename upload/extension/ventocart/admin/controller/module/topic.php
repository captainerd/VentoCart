<?php
namespace Ventocart\Admin\Controller\Extension\VentoCart\Module;

/**
 * Class Topic
 *
 * @package Ventocart\Admin\Controller\Extension\Ventocart\Module
 */
class Topic extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('extension/ventocart/module/topic');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module')
		];

		if (isset($this->request->get['module_id'])) {
			$data['module_id'] = (int) $this->request->get['module_id'];
		} else {
			$data['module_id'] = 0;
		}

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = [
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/ventocart/module/topic', 'user_token=' . $this->session->data['user_token'])
			];
		} else {
			$data['breadcrumbs'][] = [
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/ventocart/module/topic', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'])
			];
		}

		if (!isset($this->request->get['module_id'])) {
			$data['save'] = $this->url->link('extension/ventocart/module/topic.save', 'user_token=' . $this->session->data['user_token']);
		} else {
			$data['save'] = $this->url->link('extension/ventocart/module/topic.save', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id']);
		}


		$data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module');
		if (isset($this->request->get['module_id'])) {
			$this->load->model('setting/module');

			$module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
		}
		if (isset($module_info['name'])) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($module_info['status'])) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = 0;
		}

		if (isset($module_info['preview_word_count'])) {
			$data['preview_word_count'] = $module_info['preview_word_count'];
		} else {
			$data['preview_word_count'] = 50;
		}

		if (isset($module_info['limit_topics'])) {
			$data['limit_topics'] = $module_info['limit_topics'];
		} else {
			$data['limit_topics'] = 10;
		}
		if (isset($module_info['preview'])) {
			$data['preview'] = $module_info['preview'];
		} else {
			$data['preview'] = 0;
		}

 
		if (isset($module_info['hidedate'])) {
			$data['hidedate'] = $module_info['hidedate'];
		} else {
			$data['hidedate'] = 0;
		}
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/ventocart/module/topic', $data));
	}

	/**
	 * @return void
	 */
	public function save(): void
	{
		$this->load->language('extension/ventocart/module/topic');

		$json = [];

		if ((oc_strlen($this->request->post['name']) < 3) || (oc_strlen($this->request->post['name']) > 64)) {
			$json['error']['name'] = $this->language->get('error_name');
		}

		if (!$this->user->hasPermission('modify', 'extension/ventocart/module/topic')) {
			$json['error']['warning'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('setting/module');
			if (!$this->request->post['module_id']) {
				$json['module_id'] = $this->model_setting_module->addModule('ventocart.topic', $this->request->post);
			} else {
				$this->model_setting_module->editModule($this->request->post['module_id'], $this->request->post);
			}


			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}