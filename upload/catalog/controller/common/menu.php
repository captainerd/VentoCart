<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Menu extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
		$this->load->language('common/menu');
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
	
		$data['categories'] = $this->buildMenu(0);
	 
		return $this->load->view('common/menu', $data);

	}
	
	protected function buildMenu($parent_id) {
		$categories = $this->model_catalog_category->getCategories($parent_id);
		$menu = [];
	
		foreach ($categories as $category) {
	 

				$children_data = $this->buildMenu($category['category_id']);
			 
		 
	
				$menu[] = [
					'name'     => $category['name'],
					'top'     => $category['top'],
					'image'     => $category['image'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => strlen($category['redirect_url']) > 0 ? $category['redirect_url'] : $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $category['category_id'])
				];
			 
		}
	
		return $menu;
	}
}
