<?php
namespace Ventocart\Admin\Controller\Marketplace;
/**
 * Class Extension
 *
 * @package Ventocart\Admin\Controller\Marketplace
 */
class Extension extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('marketplace/extension');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		// Use the  for the max file size
		$data['error_upload_size'] = sprintf($this->language->get('error_file_size'), ini_get('upload_max_filesize'));

		$data['config_file_max_size'] = ((int) preg_filter('/[^0-9]/', '', ini_get('upload_max_filesize')) * 1024 * 1024);

		$data['upload'] = $this->url->link('tool/installer.upload', 'user_token=' . $this->session->data['user_token']);


		if (isset($this->request->get['type'])) {
			$this->request->get['which'] = $this->request->get['type'];
			$this->request->get['nojs'] = '1';
		}
		if (isset($this->request->get['which'])) {
			$data['which'] = $this->request->get['which'];
		} else {
			$data['which'] = '';
		}
		isset($this->request->get['which']) ? $data['which'] = $this->request->get['which'] : '';
		$data['categories'] = [];

		$this->load->model('setting/extension');


		$this->load->model('marketplace/extension');
		$data['categories'] = $this->model_marketplace_extension->getCategories();

		if (isset($this->request->get['which'])) {

			$data['extension'] = $this->load->controller('marketplace/loadlists.getList', $this->request->get['which']);

		} else {
			$data['extension'] = '';
		}

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		if (!isset($this->request->get['nojs'])) {
			$this->response->setOutput($data['extension']);
		} else {

			$this->response->setOutput($this->load->view('marketplace/extension', $data));
		}
	}
}