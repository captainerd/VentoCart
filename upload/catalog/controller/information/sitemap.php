<?php
namespace Ventocart\Catalog\Controller\Information;
/**
 * Class Sitemap
 *
 * @package Ventocart\Catalog\Controller\Information
 */
class Sitemap extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('information/sitemap');

		$this->document->setTitle($this->language->get('heading_title'));

		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/sitemap')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$this->load->model('catalog/category');

		$data['categories'] = [];

		$categories_1 = $this->model_catalog_category->getCategories(0);

		foreach ($categories_1 as $category_1) {
			$level_2_data = [];

			$categories_2 = $this->model_catalog_category->getCategories($category_1['category_id']);

			foreach ($categories_2 as $category_2) {
				$level_3_data = [];

				$categories_3 = $this->model_catalog_category->getCategories($category_2['category_id']);

				foreach ($categories_3 as $category_3) {
					$level_3_data[] = [
						'name' => $category_3['name'],
						'href' => $this->url->link('product/category', 'path=' . $category_1['category_id'] . '_' . $category_2['category_id'] . '_' . $category_3['category_id'])
					];
				}

				$level_2_data[] = [
					'name' => $category_2['name'],
					'children' => $level_3_data,
					'href' => $this->url->link('product/category', 'path=' . $category_1['category_id'] . '_' . $category_2['category_id'])
				];
			}

			$data['categories'][] = [
				'name' => $category_1['name'],
				'children' => $level_2_data,
				'href' => $this->url->link('product/category', 'path=' . $category_1['category_id'])
			];
		}

		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account');
		$data['edit'] = $this->url->link('account/edit');
		$data['password'] = $this->url->link('account/password');
		$data['address'] = $this->url->link('account/address');
		$data['history'] = $this->url->link('account/order');
		$data['download'] = $this->url->link('account/download');
		$data['cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout');
		$data['search'] = $this->url->link('product/search');
		$data['contact'] = $this->url->link('information/contact');

		$this->load->model('catalog/information');

		$data['informations'] = [];

		foreach ($this->model_catalog_information->getInformations() as $result) {
			$data['informations'][] = [
				'title' => $result['title'],
				'href' => $this->url->link('information/information', 'information_id=' . $result['information_id'])
			];
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('information/sitemap', $data));
	}
}
