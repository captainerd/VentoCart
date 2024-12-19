<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Filter
 *
 * @package Ventocart\Catalog\Controller\Extension\VentoCart\Module
 */
class AttributeFilter extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return mixed
	 */
	public function index(): mixed
	{

		$api_output = $this->customer->isApiClient();

		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string) $this->request->get['path']);
		} else {
			$this->request->get['path'] = '';
			$parts = [];
		}

		$category_id = end($parts);

		$this->load->model('catalog/category');

		$category_info = $this->model_catalog_category->getCategory($category_id);

		if ($category_info) {





			$data['selected_attributes'] = [];

			if (isset($this->request->get['filter_attribute'])) {

				foreach ($this->request->get['filter_attribute'] as $attributes) {
					foreach ($attributes as $pos => $attribute) {
						foreach ($attribute as $id => $attr) {
							$data['selected_attributes'][] = $pos . "-" . $id . "-" . $attr;
						}
					}
				}


			}

			$this->load->model('catalog/product');

			$filteredData = $this->model_catalog_category->getAttributeFilters($category_id);


			$data['filter_attributes'] = $filteredData;

			if (!$api_output) {
				return $this->load->view('extension/ventocart/module/attribute_filter', $data);
			} else {

				$data['module'] = "attribute_filter";

				return $data;
			}

		}

		return '';
	}
}
