<?php
namespace Opencart\Catalog\Controller\Extension\Ventocart\Module;

/**
 * Class Filter
 * 
 * @package Opencart\Catalog\Controller\Extension\VentoCart\Module
 */
class manufacturerFilter extends \Opencart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index()
	{
 
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$this->request->get['path'] = '';
			$parts = [];
		}

 

		$category_id = end($parts);

		$this->load->model('catalog/category');

		$category_info = $this->model_catalog_category->getCategory($category_id);

		$data['show_icon'] = $this->config->get('module_manufacturer_filter_icon');
		$data['selected_manufacturers'] = [];
		if (isset($this->request->get['manufacturer_id'])) {
			$data['selected_manufacturers'] = $this->request->get['manufacturer_id'];
		}
		if ( $category_info) {
			$this->load->language('extension/ventocart/module/manufacturer_filter');

			$data['filter_manufacturers'] =   $this->model_catalog_category->getManufacturerFilters($category_id);
		 
			if (empty($data['filter_manufacturers'] )) {
				return;
			}
			return $this->load->view('extension/ventocart/module/manufacturer_filter', $data);

		}

		return '';
	}
}
