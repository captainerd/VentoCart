<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Information
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Information extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): mixed
	{
		$this->load->language('extension/ventocart/module/information');

		$this->load->model('catalog/information');

		$data['informations'] = [];

		foreach ($this->model_catalog_information->getInformations() as $result) {
			$data['informations'][] = [
				'title' => $result['title'],
				'href' => $this->url->link('information/information', 'language=' . $this->config->get('config_language') . '&information_id=' . $result['information_id'])
			];
		}

		$data['contact'] = $this->url->link('information/contact', 'language=' . $this->config->get('config_language'));
		$data['sitemap'] = $this->url->link('information/sitemap', 'language=' . $this->config->get('config_language'));



		$api_output = $this->customer->isApiClient();
		$data['module'] = "information";
		if ($api_output) {
			$data['lang_values'] = $this->language->loadForAPI('extension/ventocart/module/information');
			return $data;
		} else {
			return $this->load->view('extension/ventocart/module/information', $data);
		}
	}
}
