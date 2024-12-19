<?php
namespace Ventocart\Admin\Controller\Startup;
/**
 * Class Extension
 *
 * @package Ventocart\Admin\Controller\Startup
 */
class Extension extends \Ventocart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		// Add extension paths from the DB
		$this->load->model('setting/extension');

		$results = $this->model_setting_extension->getInstalls();

		foreach ($results as $result) {
			$extension = str_replace(['_', '/'], ['', '\\'], ucwords($result['code'], '_/'));

			// Register controllers, models and system extension folders
			$this->autoloader->register('Ventocart\Admin\Controller\Extension\\' . $extension, DIR_EXTENSION . $result['code'] . '/admin/controller/');
			$this->autoloader->register('Ventocart\Admin\Model\Extension\\' . $extension, DIR_EXTENSION . $result['code'] . '/admin/model/');
			$this->autoloader->register('Ventocart\System\Library\Extension\\' . $extension, DIR_EXTENSION . $result['code'] . '/system/library/');

			// Template directory
			$this->template->addPath('extension/' . $result['code'], DIR_EXTENSION . $result['code'] . '/admin/view/template/');

			// Language directory
			$this->language->addPath('extension/' . $result['code'], DIR_EXTENSION . $result['code'] . '/admin/language/');

			// Config directory
			$this->config->addPath('extension/' . $result['code'], DIR_EXTENSION . $result['code'] . '/system/config/');
		}

		// Register OCMOD
		$this->autoloader->register('Ventocart\Admin\Controller\Extension\Ocmod', DIR_EXTENSION . 'ocmod/admin/controller/');
		$this->autoloader->register('Ventocart\Admin\Model\Extension\Ocmod', DIR_EXTENSION . 'ocmod/admin/model/');
		$this->autoloader->register('Ventocart\System\Library\Extension\Ocmod', DIR_EXTENSION . 'ocmod/system/library/');
		$this->template->addPath('extension/ocmod', DIR_EXTENSION . 'ocmod/admin/view/template/');
		$this->language->addPath('extension/ocmod', DIR_EXTENSION . 'ocmod/admin/language/');
		$this->config->addPath('extension/ocmod', DIR_EXTENSION . 'ocmod/system/config/');
	}
}