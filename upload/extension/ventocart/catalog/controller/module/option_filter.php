<?php
namespace Ventocart\Catalog\Controller\Extension\VentoCart\Module;
/**
 * Class Filter
 *
 * @package Ventocart\Catalog\Controller\Extension\VentoCart\Module
 */
class Optionfilter extends \Ventocart\System\Engine\Controller
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
			//$this->load->language('extension/ventocart/module/option_filter');





			$data['selected_options'] = [];
			if (isset($this->request->get['filter_option'])) {
				$data['selected_options'] = $this->request->get['filter_option'];
			}




			$this->load->model('catalog/product');



			$data['filter_options'] = $this->model_catalog_category->getOptionFilters($category_id);

			if (!$api_output) {

				return $this->load->view('extension/ventocart/module/option_filter', $data);
			} else {
				$data['module'] = "OptionFilter";

				return $data;


			}

		}

		return '';
	}
}
