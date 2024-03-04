<?php
namespace Opencart\Catalog\Controller\Startup;
/**
 * Class Startup
 *
 * @package Opencart\Catalog\Controller\Startup
 */
class Startup extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		// Load startup actions
 
	 
	 
		if (isset($this->request->get['theme'])) {
			$this->session->data['theme'] = $this->request->get['theme'];
		}

		if (isset($this->session->data['theme'])) {
			$this->config->set('config_theme', $this->session->data['theme']);
			}

		$this->load->model('setting/startup');

		$results = $this->model_setting_startup->getStartups();

		foreach ($results as $result) {
			if (substr($result['action'], 0, 8) == 'catalog/') {
				$this->load->controller(substr($result['action'], 8));
			}
		}
	}
}