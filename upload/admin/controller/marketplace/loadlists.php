<?php
namespace Ventocart\Admin\Controller\Marketplace;
/**
 * Class Analytics
 *
 * @package Ventocart\Admin\Controller\Extension
 */
class Loadlists extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{

		$this->response->setOutput($this->getList());
	}

	/**
	 * @return string
	 */
	public function getList(): string
	{

		$which = $this->request->get['which'];
		$this->load->model('marketplace/extension');

		return $this->model_marketplace_extension->getList($which);
	}

	/**
	 * @return void
	 */
	public function install(): void
	{
		$which = $this->request->get['which'];
		$this->load->model('marketplace/extension');

		$this->response->setOutput(json_encode($this->model_marketplace_extension->install($which)));
	}

	/**
	 * @return void
	 */
	public function uninstall(): void
	{
		$which = $this->request->get['which'];
		$this->load->model('marketplace/extension');

		$this->response->setOutput(json_encode($this->model_marketplace_extension->uninstall($which)));
	}

	public function delete(): void
	{
		$this->load->language('extension/module');

		$json = [];

		if (isset($this->request->get['module_id'])) {
			$module_id = $this->request->get['module_id'];
		} else {
			$module_id = 0;
		}

		if (!$this->user->hasPermission('modify', 'module')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('setting/module');

			$this->model_setting_module->deleteModule($module_id);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function settheme(): void
	{
		$this->load->language('extension/theme');
		$code = $this->request->get['code'];

		$codecf = $code;
		if ($code == 'basic') {
			$codecf = 'default';
		}
		$this->load->model('setting/setting');
		$this->model_setting_setting->updateConfig('THEME_NAME', $codecf);

		$json['success'] = $this->language->get('text_success');


		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}