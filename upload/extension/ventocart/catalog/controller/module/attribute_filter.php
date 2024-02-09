<?php
namespace Opencart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Filter
 *
 * @package Opencart\Catalog\Controller\Extension\VentoCart\Module
 */
class AttributeFilter extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {

	 
	 
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$this->request->get['path'] = '';
			$parts = [];
		}

		$category_id = end($parts);

		$this->load->model('catalog/category');

		$category_info = $this->model_catalog_category->getCategory($category_id);

		if ($category_info) {
			$this->load->language('extension/ventocart/module/option_filter');

			 
		 
		 
			$data['selected_attributes'] = [];
		 
			if (isset($this->request->get['filter_attribute'])) {
			 
				foreach( $this->request->get['filter_attribute'] as $attributes) {
					foreach($attributes as $pos => $attribute) {
					 foreach($attribute as $id => $attr) {
						$data['selected_attributes'][] = $pos."-".$id."-".$attr;
					}
				}
				}
				 
			 
			}
		 
			$this->load->model('catalog/product');

			$filteredData =$this->model_catalog_category->getAttributeFilters($category_id);
		 
	 
			$data['filter_attributes'] = $filteredData;
		 
			 
				return $this->load->view('extension/ventocart/module/attribute_filter', $data);
		 
		}

		return '';
	}
}
