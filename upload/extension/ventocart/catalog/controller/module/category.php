<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Category
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Category extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return mixed
	 */
	public function index(): mixed
	{
		$this->load->language('extension/ventocart/module/category');

		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string) $this->request->get['path']);
		} else {
			$parts = [];
		}

		if (isset($parts[0])) {
			$data['category_id'] = $parts[0];
		} else {
			$data['category_id'] = 0;
		}

		if (isset($parts[1])) {
			$data['child_id'] = $parts[1];
		} else {
			$data['child_id'] = 0;
		}

		$this->load->model('catalog/category');
		$this->load->model('catalog/product');

		$data['categories'] = [];

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			$children_data = [];

			if ($category['category_id'] == $data['category_id']) {
				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$filter_data = [
						'filter_category_id' => $child['category_id'],
						'filter_sub_category' => true
					];

					$children_data[] = [
						'category_id' => $child['category_id'],
						'name' => !empty($child['redirect_url']) ? $child['name'] : $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'href' => !empty($child['redirect_url']) ? $child['redirect_url'] : $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $category['category_id'] . '_' . $child['category_id'])
					];
				}
			}

			$filter_data = [
				'filter_category_id' => $category['category_id'],
				'filter_sub_category' => true
			];

			$data['categories'][] = [
				'category_id' => $category['category_id'],
				'name' => empty($category['redirect_url']) ? $category['name'] : $category['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
				'children' => $children_data,
				'href' => !empty($category['redirect_url']) ? $category['redirect_url'] : $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $category['category_id'])
			];
		}
		$api_output = $this->customer->isApiClient();
		if ($api_output) {

			$data['module'] = "category";
			$data['lang_values'] = $this->language->loadForAPI('extension/ventocart/module/category');
			return $data;
		} else {
			return $this->load->view('extension/ventocart/module/category', $data);
		}

	}
}
