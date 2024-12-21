<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class HTML
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class HTML extends \Ventocart\System\Engine\Controller
{
	/**
	 * @param array $setting
	 *
	 * @return string
	 */
	public function index(array $setting): string
	{
		if (isset($setting['module_description'][$this->config->get('config_language_id')])) {
			$data['heading_title'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');

			$data['html'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['description'], ENT_QUOTES, 'UTF-8');

			$api_output = $this->customer->isApiClient();

			if ($api_output) {

				return '';
			} else {
				return $this->load->view('extension/ventocart/module/html', $data);
			}

		} else {
			return '';
		}
	}
}
