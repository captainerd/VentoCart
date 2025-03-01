<?php
namespace Ventocart\Catalog\Controller\Product;
/**
 * Class Category
 *
 * @package Ventocart\Catalog\Controller\Product
 */
class Category extends \Ventocart\System\Engine\Controller
{

	public function index(): ?object
	{
		$this->load->language('product/category');


		/* Product related */


		$path = isset($this->request->get['path']) ? (string) $this->request->get['path'] : '';
		$filter = isset($this->request->get['filter']) ? $this->request->get['filter'] : '';
		$filter_option = isset($this->request->get['filter_option']) ? $this->request->get['filter_option'] : '';
		$filter_attribute = isset($this->request->get['filter_attribute']) ? $this->request->get['filter_attribute'] : '';
		$filter_manufacturer_id = isset($this->request->get['manufacturer_id']) ? $this->request->get['manufacturer_id'] : '';

		$filter_availability = isset($this->request->get['filter_availability']) ? $this->request->get['filter_availability'] : '';
		$sort = isset($this->request->get['sort']) ? $this->request->get['sort'] : 'p.sort_order';
		$order = isset($this->request->get['order']) ? $this->request->get['order'] : 'ASC';
		$page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 1;
		$limit = isset($this->request->get['limit']) && (int) $this->request->get['limit'] ? (int) $this->request->get['limit'] : $this->config->get('config_pagination');

		$minPrice = null;
		$maxPrice = null;

		if (isset($this->request->get['pricerange'])) {
			$priceRange = explode('-', $this->request->get['pricerange']);
			$minPrice = (float) $priceRange[0];
			$maxPrice = (float) $priceRange[1];
		}

		$parts = explode('_', $path);

		$category_id = (int) array_pop($parts);

		$this->load->model('catalog/category');

		$category_info = $this->model_catalog_category->getCategory($category_id);

		if ($category_info) {
			$this->document->setTitle($category_info['meta_title']);
			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);

			$datab['breadcrumbs'] = [];

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
			];

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$path = '';

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int) $path_id;
				} else {
					$path .= '_' . (int) $path_id;
				}

				$parent_info = $this->model_catalog_category->getCategory($path_id);

				if ($parent_info) {
					$datab['breadcrumbs'][] = [
						'text' => $parent_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path . $url)
					];
				}
			}
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			// Set the last category breadcrumb
			$datab['breadcrumbs'][] = [
				'text' => $category_info['name'],
				'href' => $this->url->link('product/category', $url)
			];
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
			$data['heading_title'] = $category_info['name'];

			$data['text_compare'] = sprintf($this->language->get('text_compare'), isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0);

			$this->load->model('tool/image');

			if (is_file(DIR_IMAGE . html_entity_decode($category_info['image'], ENT_QUOTES, 'UTF-8'))) {
				$data['image'] = $this->model_tool_image->resize(html_entity_decode($category_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
			} else {
				$data['image'] = '';
			}

			$data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			$data['compare'] = $this->url->link('product/compare');

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['categories'] = [];

			$this->load->model('catalog/product');

			$results = $this->model_catalog_category->getCategories($category_id);

			foreach ($results as $result) {

				$filter_data = [
					'filter_category_id' => $result['category_id'],
					'filter_sub_category' => false
				];

				$data['categories'][] = [
					'name' => !empty($result['redirect_url']) ? $result['name'] : $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'href' => !empty($result['redirect_url']) ? $result['redirect_url'] : $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
				];
			}

			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}



			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}


			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['products'] = [];

			$filter_data = [
				'filter_category_id' => $category_id,
				'filter_sub_category' => false,
				'filter_filter' => $filter,
				'filter_option' => $filter_option,
				'filter_price_min' => $minPrice,
				'filter_price_max' => $maxPrice,
				'filter_manufacturer_id' => $filter_manufacturer_id,
				'filter_availability' => $filter_availability,
				'filter_attribute' => $filter_attribute,
				'sort' => $sort,
				'order' => $order,
				'start' => ($page - 1) * $limit,
				'limit' => $limit
			];

			$results = $this->model_catalog_product->getProducts($filter_data);
			$data['listview'] = 0;
			if (isset($this->request->get['listview'])) {
				$this->session->data['listview'] = $this->request->get['listview'];
			}
			if (isset($this->session->data['listview'])) {
				$data['listview'] = $this->session->data['listview'];
			}
			foreach ($results as $result) {
				$description = trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')));

				if (oc_strlen($description) > $this->config->get('config_product_description_length')) {
					$description = oc_substr($description, 0, $this->config->get('config_product_description_length')) . '..';
				}

				if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {
					$image = $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float) $result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float) $result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}





				$product_data = [
					'product_id' => $result['product_id'],
					'name' => $result['name'],
					'date_added' => $result['date_added'],
					'new' => (strtotime($result['date_added']) >= time() - 604800) ? true : false,
					'description' => $description,
					'thumb' => $image,
					'price' => $price,
					'special' => $special,
					'tax' => $tax,
					'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating' => $result['rating'],
					'href' => $this->url->link('product/product', 'product_id=' . $result['product_id'] . $url)
				];
				if ($data['listview']) {
					$data['products'][] = $this->load->controller('product/thumb.listview', $product_data);
				} else {

					$data['products'][] = $this->load->controller('product/thumb', $product_data);
				}


			}

			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}


			if (!empty($filter_attribute)) {

				foreach ($filter_attribute as $values) {
					foreach ($values as $key => $value) {

						if (is_array($value)) {

							foreach ($value as $subkey => $subvalue) {
								$url .= "&filter_attribute[][{$key}][{$subkey}]={$subvalue}";

							}
						}
					}
				}
			}

			if (!empty($filter_availability)) {
				foreach ($filter_availability as $index => $filter_availability_entity) {

					$url .= '&filter_availability[]=' . urlencode($filter_availability_entity);
				}
			}

			if (!empty($filter_option)) {
				foreach ($filter_option as $index => $filter_option_entity) {
					$url .= '&filter_option[]=' . urlencode($filter_option_entity);
				}
			}
			if (!empty($filter_manufacturer_id)) {
				foreach ($filter_manufacturer_id as $index => $manufacturer_ids) {
					$url .= '&manufacturer_id[]=' . urlencode($manufacturer_ids);
				}
			}

			$data['sorts'] = [];

			$data['sorts'][] = [
				'text' => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href' => $this->url->link('product/category', 'sort=p.sort_order&order=ASC' . $url)
			];

			$data['sorts'][] = [
				'text' => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href' => $this->url->link('product/category', 'sort=pd.name&order=ASC' . $url)
			];

			$data['sorts'][] = [
				'text' => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href' => $this->url->link('product/category', 'sort=pd.name&order=DESC' . $url)
			];

			$data['sorts'][] = [
				'text' => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href' => $this->url->link('product/category', 'sort=p.price&order=ASC' . $url)
			];

			$data['sorts'][] = [
				'text' => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href' => $this->url->link('product/category', 'sort=p.price&order=DESC' . $url)
			];

			if ($this->config->get('config_review_status')) {
				$data['sorts'][] = [
					'text' => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href' => $this->url->link('product/category', 'sort=rating&order=DESC' . $url)
				];

				$data['sorts'][] = [
					'text' => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href' => $this->url->link('product/category', 'sort=rating&order=ASC' . $url)
				];
			}

			$data['sorts'][] = [
				'text' => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href' => $this->url->link('product/category', 'sort=p.model&order=ASC' . $url)
			];

			$data['sorts'][] = [
				'text' => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href' => $this->url->link('product/category', 'sort=p.model&order=DESC' . $url)
			];





			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = [];

			$limits = array_unique([$this->config->get('config_pagination'), 25, 50, 75, 100]);

			sort($limits);

			foreach ($limits as $value) {
				$data['limits'][] = [
					'text' => $value,
					'value' => $value,
					'href' => $this->url->link('product/category', $url . '&limit=' . $value)
				];
			}



			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$product_total = $this->model_catalog_product->getTotalProducts($filter_data);

			$data['pagination'] = $this->load->controller('common/pagination', [
				'total' => $product_total,
				'page' => $page,
				'limit' => $limit,
				'url' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}')
			]);

			$data['infiniteScroll'] = $this->config->get('config_product_infinite_scroll');
			$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $this->request->get['path']), 'canonical');
			} else {
				$this->document->addLink($this->url->link('product/category', 'path=' . $this->request->get['path'] . '&page=' . $page), 'canonical');
			}

			if ($page > 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $this->request->get['path'] . (($page - 2) ? '&page=' . ($page - 1) : '')), 'prev');
			}

			if ($limit && ceil($product_total / $limit) > $page) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $this->request->get['path'] . '&page=' . ($page + 1)), 'next');
			}

			if (isset($this->request->get['ajax'])) {
				$data['ajax'] = true;
			} else {
				$data['ajax'] = false;
			}

			$data['sort'] = $sort;
			$data['order'] = $order;
			$data['limit'] = $limit;

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('product/category', $data));

		} else {
			$this->request->get['route'] = 'error/not_found';
			return $this->load->controller('error/not_found');
		}

		return null;
	}



	/**
	 * Autocomplete
	 *
	 * @return void
	 */
	public function autocomplete(): void
	{
		$json = [];
		$this->load->language('product/search');
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = '';
		}

		if (isset($this->request->get['filter_model'])) {
			$filter_model = $this->request->get['filter_model'];
		} else {
			$filter_model = '';
		}

		if (isset($this->request->get['limit'])) {
			$limit = (int) $this->request->get['limit'];
		} else {
			$limit = 5;
		}

		$filter_data = [
			'filter_name' => $filter_name,
			'filter_model' => $filter_model,
			'start' => 0,
			'limit' => $limit
		];

		$this->load->model('catalog/product');

		$this->load->model('catalog/subscription_plan');

		$results = $this->model_catalog_product->getProducts($filter_data);
		if (empty($results)) {
			$json['message'] = $this->language->get('text_no_results');
		}
		foreach ($results as $result) {


			$subscription_data = [];

			$product_subscriptions = $this->model_catalog_product->getSubscriptions($result['product_id']);

			foreach ($product_subscriptions as $product_subscription) {
				$subscription_plan_info = $this->model_catalog_subscription_plan->getSubscriptionPlan($product_subscription['subscription_plan_id']);

				if ($subscription_plan_info) {
					$subscription_data[] = [
						'subscription_plan_id' => $subscription_plan_info['subscription_plan_id'],
						'name' => $subscription_plan_info['name']
					];
				}
			}

			$json[] = [
				'product_id' => $result['product_id'],
				'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
				'model' => $result['model'],
				'image' => $result['image'],
				'subscription' => $subscription_data,
				'price' => $result['price'],
				'option' => $this->model_catalog_product->getOptionsLegacy($result['product_id']),
			];
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

}
