<?php
namespace Ventocart\Admin\Controller\Catalog;

class Product extends \Ventocart\System\Engine\Controller
{
	public function index(): void
	{
		$this->load->language('catalog/product');

		$this->document->setTitle($this->language->get('heading_title'));

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

		if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
		} else {
			$filter_price = '';
		}
		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = '';
		}
		if (isset($this->request->get['filter_quantity'])) {
			$filter_quantity = $this->request->get['filter_quantity'];
		} else {
			$filter_quantity = '';
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = '';
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
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

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/product', 'user_token=' . $this->session->data['user_token'] . $url)
		];

		$data['add'] = $this->url->link('catalog/product.form', 'user_token=' . $this->session->data['user_token'] . $url);
		$data['copy'] = $this->url->link('catalog/product.copy', 'user_token=' . $this->session->data['user_token']);
		$data['delete'] = $this->url->link('catalog/product.delete', 'user_token=' . $this->session->data['user_token']);

		$data['list'] = $this->getList();

		$data['filter_name'] = $filter_name;
		$data['filter_model'] = $filter_model;
		$data['filter_price'] = $filter_price;
		$data['filter_quantity'] = $filter_quantity;
		$data['filter_status'] = $filter_status;
		$data['filter_category'] = $filter_category;

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->load->model('catalog/category');
		$data['categories'] = $this->formatCategories($this->model_catalog_category->getCategories());

		$this->response->setOutput($this->load->view('catalog/product', $data));
	}
	private function formatCategories($categories, $parentId = 0, $prefix = '')
	{
		$result = [];
		$children = array_filter($categories, fn($cat) => $cat['parent_id'] == $parentId);
		$total = count($children);
		$index = 0;

		foreach ($children as $category) {
			$index++;
			$isLast = ($index == $total);

			// Add the branch symbol
			$branch = $isLast ? '└── ' : '├── ';

			// Add the current category to the result array
			$result[] = [
				'name' => $prefix . $branch . $category['name'],
				'category_id' => $category['category_id']
			];

			// Recursively process subcategories
			// If it's the last child, avoid the '│' in the prefix, otherwise keep it for the others
			$childPrefix = $prefix . ($isLast ? '&nbsp;    ' : '&nbsp;&nbsp;   '); // Only keep '│' for non-last items
			$result = array_merge($result, $this->formatCategories($categories, $category['category_id'], $childPrefix));
		}

		return $result;
	}




	public function list(): void
	{
		$this->load->language('catalog/product');

		$this->response->setOutput($this->getList());
	}

	protected function getList(): string
	{
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

		if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
		} else {
			$filter_price = '';
		}

		if (isset($this->request->get['filter_quantity'])) {
			$filter_quantity = $this->request->get['filter_quantity'];
		} else {
			$filter_quantity = '';
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'pd.name';
		}
		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = '';
		}
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
		}
		$data['action'] = $this->url->link('catalog/product.list', 'user_token=' . $this->session->data['user_token'] . $url);

		$data['products'] = [];

		$filter_data = [
			'filter_name' => $filter_name,
			'filter_model' => $filter_model,
			'filter_price' => $filter_price,
			'filter_quantity' => $filter_quantity,
			'filter_category' => $filter_category,
			'filter_status' => $filter_status,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_pagination_admin'),
			'limit' => $this->config->get('config_pagination_admin')
		];

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$product_total = $this->model_catalog_product->getTotalProducts($filter_data);

		$results = $this->model_catalog_product->getProducts($filter_data);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {
				$image = $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), 40, 40);
			} else {
				$image = $this->model_tool_image->resize('no_image.png', 40, 40);
			}

			$special = false;
			if ($result['product_id']) {
				$product_specials = $this->model_catalog_product->getSpecials($result['product_id']);

				foreach ($product_specials as $product_special) {
					if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
						$special = $this->currency->format($product_special['price'], $this->config->get('config_currency'));

						break;
					}
				}
			}
			$data['products'][] = [
				'product_id' => $result['product_id'],
				'image' => $image,
				'name' => $result['name'],
				'model' => $result['model'],
				'price' => $this->currency->format($result['price'], $this->config->get('config_currency')),
				'special' => $special,
				'quantity' => $result['quantity'],
				'status' => $result['status'],
				'edit' => $this->url->link('catalog/product.form', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $result['product_id'] . $url),

			];
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		$data['sort_name'] = $this->url->link('catalog/product.list', 'user_token=' . $this->session->data['user_token'] . '&sort=pd.name' . $url);
		$data['sort_model'] = $this->url->link('catalog/product.list', 'user_token=' . $this->session->data['user_token'] . '&sort=p.model' . $url);
		$data['sort_price'] = $this->url->link('catalog/product.list', 'user_token=' . $this->session->data['user_token'] . '&sort=p.price' . $url);
		$data['sort_quantity'] = $this->url->link('catalog/product.list', 'user_token=' . $this->session->data['user_token'] . '&sort=p.quantity' . $url);
		$data['sort_order'] = $this->url->link('catalog/product.list', 'user_token=' . $this->session->data['user_token'] . '&sort=p.sort_order' . $url);

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $product_total,
			'page' => $page,
			'limit' => $this->config->get('config_pagination_admin'),
			'url' => $this->url->link('catalog/product.list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $this->config->get('config_pagination_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_pagination_admin')) > ($product_total - $this->config->get('config_pagination_admin'))) ? $product_total : ((($page - 1) * $this->config->get('config_pagination_admin')) + $this->config->get('config_pagination_admin')), $product_total, ceil($product_total / $this->config->get('config_pagination_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		return $this->load->view('catalog/product_list', $data);
	}


	public function reloadOptions()
	{
		if (isset($this->request->get['product_id'])) {
			$product_id = (int) $this->request->get['product_id'];
		} elseif (isset($this->request->get['variation_id'])) {
			$product_id = (int) $this->request->get['variation_id'];
		} else {
			$product_id = 0;
		}

		$this->response->setOutput($this->loadOptions($product_id));
	}

	public function addOption(): void
	{

		$this->load->language('catalog/product');
		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$json['error'] = $this->language->get('error_permission');
			$this->response->setOutput(json_encode($json));
			return;
		}

		$this->load->model('catalog/option');

		$product_id = $this->request->get['product_id'];

		$optionsave['option_description'] = [];
		$this->load->model('catalog/product');
		$options = $this->request->post['options'];
		$optionsave['type'] = $this->request->post['type'];
		$optionsave['sort_order'] = 0;

		$optionsave['option_id'] = 0;
		$optionsave['option_value'] = [];

		foreach ($options as $language_id => $values) {
			foreach ($values as $key => $value) {
				if ($key == 'option_group_name') {
					$optionsave['option_description'][$language_id] = ['name' => $value];

				}
				if ($key == 'option_q_name') {
					foreach ($value as $pkey => $poption) {
						if (is_numeric($pkey)) {
							$optionsave['option_value'][$pkey]['option_value_id'] = null;
							$optionsave['option_value'][$pkey]['image'] = '';
							$optionsave['option_value'][$pkey]['sort_order'] = $pkey;
							$optionsave['option_value'][$pkey]['option_value_description'][$language_id] = ['name' => $poption];

						}

					}
				}
			}
		}

		$poptions_id = $this->model_catalog_option->addOption($optionsave);

		$result = $this->model_catalog_product->addAllOptions($poptions_id, $product_id);
		if ($result) {
			$this->response->setOutput(json_encode(['status' => 'ok']));
		}



	}
	public function loadOptions($product_id)
	{
		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['product_id'] = $product_id;
		$data['user_token'] = $this->session->data['user_token'];
		$this->load->language('catalog/product');
		// Options
		$this->load->model('catalog/product');
		$this->load->model('catalog/option');

		if ($product_id) {
			$product_options = $this->model_catalog_product->getOptions($product_id);

		} else {
			$product_options = [];
		}

		$data['product_options'] = [];
		$product_option_value_data = [];

		foreach ($product_options as $product_option) {

			$option_value_info = $this->model_catalog_option->getOption($product_option['option_id']);
			$option_value = $this->model_catalog_option->getOption($product_option['option_id'], true);

			$product_option_value_data[$option_value['group_id']][] = [

				'name' => $option_value_info['name'],

				'quantity' => $product_option['quantity'],
				'subtract' => $product_option['subtract'],
				'product_option_value_id' => $product_option['option_id'], //until we fix the twig  
				'option_value_id' => $product_option['option_id'],        //abomination of doubles
				'price' => $product_option['price'],
				'price_prefix' => $product_option['price_prefix'],
				'points' => round($product_option['points']),
				'points_prefix' => $product_option['points_prefix'],
				'weight' => round($product_option['weight']),
				'sort_order' => isset($product_option['sort_order']) ? $product_option['sort_order'] : '0',
				'value' => isset($product_option['value']) ? $product_option['value'] : '',
				'image' => isset($product_option['value']) ? '/image/' . $product_option['value'] : '',
				'weight_prefix' => $product_option['weight_prefix'],
				'product_option_id' => $product_option['product_option_id'],
			];
			$iduse = $option_value['option_id'];
			if (
				$option_value['type'] == 'text' ||
				$option_value['type'] == 'textarea' ||
				$option_value['type'] == 'date' ||
				$option_value['type'] == 'time' ||
				$option_value['type'] == 'datetime'
			) {
				$iduse = $product_option['product_option_id'];
			}

			$data['product_options'][$iduse] = [
				'product_option_value' => $product_option_value_data[$option_value['group_id']],
				'option_id' => $option_value['option_id'], //doubles until someone  
				'product_option_id' => $product_option['product_option_id'],
				'name' => $option_value['name'],
				'sort_order' => isset($product_option['sort_order']) ? $product_option['sort_order'] : '0',
				'type' => $option_value['type'],
				'value' => isset($option_value['value']) ? $product_option['value'] : $product_option['value'],
				'required' => $product_option['required']
			];


		}

		$data['option_values'] = [];

		foreach ($data['product_options'] as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				if (!isset($data['option_values'][$product_option['option_id']])) {

					$data['option_values'][$product_option['option_id']] = $this->model_catalog_option->getValues($product_option['option_id']);


					$data['option_values'][$product_option['option_id']] = array_map(function ($item) {

						// Assign the value of 'option_id' to 'option_value_id'
						$item['option_value_id'] = $item['option_id'];
						$item['product_option_value_id'] = $item['option_id'];
						unset($item['option_id']); // Optionally remove the old 'option_id' key

						return $item;
					}, $data['option_values'][$product_option['option_id']]);


				}
			}
		}




		$data['options'] = [];

		return $this->load->view('catalog/product_tabs/options_tab', $data);


	}
	public function form(): void
	{
		$this->load->language('catalog/product');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->document->addScript('view/javascript/tinymce/tinymce.min.js');


		$data['text_form'] = !isset($this->request->get['product_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$data['error_upload_size'] = sprintf($this->language->get('error_upload_size'), $this->config->get('config_file_max_size'));

		$data['upload'] = $this->url->link('tool/upload', 'user_token=' . $this->session->data['user_token']);
		$data['config_file_max_size'] = ((int) $this->config->get('config_file_max_size') * 1024 * 1024);
		$data['user_token'] = 'user_token=' . $this->session->data['user_token'];
		if (isset($this->request->get['variation_id'])) {
			$this->load->model('catalog/product');

			$url = $this->url->link('catalog/product.form', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $this->request->get['variation_id']);

			$data['text_variant'] = sprintf($this->language->get('text_variant'), $url, $url);
		} else {
			$data['text_variant'] = '';
		}

		$url = '';

		if (isset($this->request->get['variation_id'])) {
			$url .= '&variation_id=' . $this->request->get['variation_id'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
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

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/product', 'user_token=' . $this->session->data['user_token'] . $url)
		];

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
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

		$data['save'] = $this->url->link('catalog/product.save', 'user_token=' . $this->session->data['user_token']);
		$data['back'] = $this->url->link('catalog/product', 'user_token=' . $this->session->data['user_token'] . $url);
		$data['upload'] = $this->url->link('tool/upload.upload', 'user_token=' . $this->session->data['user_token']);


		$data['config_affiliate_status'] = $this->config->get('config_affiliate_status');
		$data['config_download_status'] = $this->config->get('config_download_status');
		$data['config_subscription_status'] = $this->config->get('config_subscription_status');
		$data['config_giftcard_status'] = $this->config->get('config_giftcard_status');
		$data['config_reward_status'] = $this->config->get('config_reward_status');
		$data['config_blog_status'] = $this->config->get('config_blog_status');


		if (isset($this->request->get['product_id'])) {
			$data['product_id'] = (int) $this->request->get['product_id'];
		} else {
			$data['product_id'] = 0;
		}

		// If the product_id is the variation_id, we need to get the variant info
		if (isset($this->request->get['product_id'])) {
			$product_id = (int) $this->request->get['product_id'];
		} elseif (isset($this->request->get['variation_id'])) {
			$product_id = (int) $this->request->get['variation_id'];
		} else {
			$product_id = 0;
		}

		if ($product_id) {
			$this->load->model('catalog/product');

			$product_info = $this->model_catalog_product->getProduct($product_id);
		}


		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (!empty($product_info)) {
			$data['product_description'] = $this->model_catalog_product->getDescriptions($product_id);
		} else {
			$data['product_description'] = [];
		}

		if (!empty($product_info)) {
			$data['model'] = $product_info['model'];
		} else {
			$data['model'] = '';
		}

		if (!empty($product_info)) {
			$data['sku'] = $product_info['sku'];
		} else {
			$data['sku'] = '';
		}

		if (!empty($product_info)) {
			$data['upc'] = $product_info['upc'];
		} else {
			$data['upc'] = '';
		}

		if (!empty($product_info)) {
			$data['ean'] = $product_info['ean'];
		} else {
			$data['ean'] = '';
		}

		if (!empty($product_info)) {
			$data['jan'] = $product_info['jan'];
		} else {
			$data['jan'] = '';
		}

		if (!empty($product_info)) {
			$data['isbn'] = $product_info['isbn'];
		} else {
			$data['isbn'] = '';
		}

		if (!empty($product_info)) {
			$data['mpn'] = $product_info['mpn'];
		} else {
			$data['mpn'] = '';
		}

		if (!empty($product_info)) {
			$data['location'] = $product_info['location'];
		} else {
			$data['location'] = '';
		}

		if (!empty($product_info)) {
			$data['price'] = $product_info['price'];
		} else {
			$data['price'] = '';
		}


		if (!empty($product_info)) {
			$data['supply_cost'] = $product_info['supply_cost'];
		} else {
			$data['supply_cost'] = '';
		}

		$this->load->model('localisation/tax_class');

		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (!empty($product_info)) {
			$data['tax_class_id'] = $product_info['tax_class_id'];
		} else {
			$data['tax_class_id'] = 0;
		}

		if (!empty($product_info)) {
			$data['quantity'] = $product_info['quantity'];
		} else {
			$data['quantity'] = 1;
		}

		if (!empty($product_info)) {
			$data['minimum'] = $product_info['minimum'];
		} else {
			$data['minimum'] = 1;
		}

		if (!empty($product_info)) {
			$data['subtract'] = $product_info['subtract'];
		} else {
			$data['subtract'] = 1;
		}

		$this->load->model('localisation/stock_status');

		$data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		if (!empty($product_info)) {
			$data['stock_status_id'] = $product_info['stock_status_id'];
		} else {
			$data['stock_status_id'] = 0;
		}

		if (!empty($product_info)) {
			$data['date_available'] = ($product_info['date_available'] != '0000-00-00') ? $product_info['date_available'] : '';
		} else {
			$data['date_available'] = date('Y-m-d');
		}

		if (!empty($product_info)) {
			$data['shipping'] = $product_info['shipping'];
		} else {
			$data['shipping'] = 1;
		}

		if (!empty($product_info)) {
			$data['length'] = $product_info['length'];
		} else {
			$data['length'] = '';
		}

		if (!empty($product_info)) {
			$data['width'] = $product_info['width'];
		} else {
			$data['width'] = '';
		}

		if (!empty($product_info)) {
			$data['height'] = $product_info['height'];
		} else {
			$data['height'] = '';
		}

		$this->load->model('localisation/length_class');

		$data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

		if (!empty($product_info)) {
			$data['length_class_id'] = $product_info['length_class_id'];
		} else {
			$data['length_class_id'] = $this->config->get('config_length_class_id');
		}

		if (!empty($product_info)) {
			$data['weight'] = $product_info['weight'];
		} else {
			$data['weight'] = '';
		}

		$this->load->model('localisation/weight_class');

		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		if (!empty($product_info)) {
			$data['weight_class_id'] = $product_info['weight_class_id'];
		} else {
			$data['weight_class_id'] = $this->config->get('config_weight_class_id');
		}

		if (!empty($product_info)) {
			$data['status'] = $product_info['status'];
		} else {
			$data['status'] = true;
		}

		if (!empty($product_info)) {
			$data['sort_order'] = $product_info['sort_order'];
		} else {
			$data['sort_order'] = 1;
		}

		$this->load->model('catalog/manufacturer');

		if (!empty($product_info)) {
			$data['manufacturer_id'] = $product_info['manufacturer_id'];
		} else {
			$data['manufacturer_id'] = 0;
		}

		if (!empty($product_info)) {
			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($product_info['manufacturer_id']);

			if ($manufacturer_info) {
				$data['manufacturer'] = $manufacturer_info['name'];
			} else {
				$data['manufacturer'] = '';
			}
		} else {
			$data['manufacturer'] = '';
		}

		// Categories
		$this->load->model('catalog/category');

		if ($product_id) {
			$categories = $this->model_catalog_product->getCategories($product_id);
		} else {
			$categories = [];
		}

		$data['product_categories'] = [];

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$data['product_categories'][] = [
					'category_id' => $category_info['category_id'],
					'name' => ($category_info['path']) ? $category_info['path'] . ' &gt; ' . $category_info['name'] : $category_info['name']
				];
			}
		}

		// Filters
		$this->load->model('catalog/filter');

		if (!empty($product_info)) {
			$filters = $this->model_catalog_product->getFilters($product_id);
		} else {
			$filters = [];
		}

		$data['product_filters'] = [];

		foreach ($filters as $filter_id) {
			$filter_info = $this->model_catalog_filter->getFilter($filter_id);

			if ($filter_info) {
				$data['product_filters'][] = [
					'filter_id' => $filter_info['filter_id'],
					'name' => $filter_info['group'] . ' &gt; ' . $filter_info['name']
				];
			}
		}



		// Downloads
		$this->load->model('catalog/download');

		if ($product_id) {
			$product_downloads = $this->model_catalog_product->getDownloads($product_id);
		} else {
			$product_downloads = [];
		}

		$data['product_downloads'] = [];

		foreach ($product_downloads as $download_id) {
			$download_info = $this->model_catalog_download->getDownload($download_id);

			if ($download_info) {
				$data['product_downloads'][] = [
					'download_id' => $download_info['download_id'],
					'name' => $download_info['name']
				];
			}
		}

		// Related
		if ($product_id) {
			$product_relateds = $this->model_catalog_product->getRelated($product_id);
		} else {
			$product_relateds = [];
		}

		$data['product_relateds'] = [];

		foreach ($product_relateds as $related_id) {
			$related_info = $this->model_catalog_product->getProduct($related_id);

			if ($related_info) {
				$data['product_relateds'][] = [
					'product_id' => $related_info['product_id'],
					'name' => $related_info['name']
				];
			}
		}

		// Attributes
		$this->load->model('catalog/attribute');

		if ($product_id) {
			$product_attributes = $this->model_catalog_product->getAttributes($product_id);
		} else {
			$product_attributes = [];
		}

		$data['product_attributes'] = $product_attributes;


		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();



		// Overrides
		if (!empty($product_info)) {
			$data['override'] = json_decode($product_info['override'], true);
		} else {
			$data['override'] = [];
		}
		// Subscriptions
		$this->load->model('catalog/subscription_plan');

		$data['subscription_plans'] = $this->model_catalog_subscription_plan->getSubscriptionPlans();

		if ($product_id) {
			$data['product_subscriptions'] = $this->model_catalog_product->getSubscriptions($product_id);
		} else {
			$data['product_subscriptions'] = [];
		}

		// Discount
		if ($product_id) {
			$product_discounts = $this->model_catalog_product->getDiscounts($product_id);
		} else {
			$product_discounts = [];
		}

		$data['product_discounts'] = [];

		foreach ($product_discounts as $product_discount) {
			$data['product_discounts'][] = [
				'customer_group_id' => $product_discount['customer_group_id'],
				'quantity' => $product_discount['quantity'],
				'priority' => $product_discount['priority'],
				'price' => $product_discount['price'],
				'date_start' => ($product_discount['date_start'] != '0000-00-00') ? $product_discount['date_start'] : '',
				'date_end' => ($product_discount['date_end'] != '0000-00-00') ? $product_discount['date_end'] : ''
			];
		}

		// Special
		if ($product_id) {
			$product_specials = $this->model_catalog_product->getSpecials($product_id);
		} else {
			$product_specials = [];
		}

		$data['product_specials'] = [];

		foreach ($product_specials as $product_special) {
			$data['product_specials'][] = [
				'customer_group_id' => $product_special['customer_group_id'],
				'priority' => $product_special['priority'],
				'price' => $product_special['price'],
				'apply' => $product_special['apply'],
				'type' => $product_special['type'],
				'date_start' => ($product_special['date_start'] != '0000-00-00') ? $product_special['date_start'] : '',
				'date_end' => ($product_special['date_end'] != '0000-00-00') ? $product_special['date_end'] : ''
			];
		}

		// Image
		if (!empty($product_info)) {
			$data['image'] = $product_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 300, 300);

		if (is_file(DIR_IMAGE . html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8'))) {
			$data['thumb'] = $this->model_tool_image->resize(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8'), 300, 300);
		} else {
			$data['thumb'] = $data['placeholder'];
		}

		// Images
		if ($product_id) {
			$product_images = $this->model_catalog_product->getImages($product_id);
		} else {
			$product_images = [];
		}

		$data['product_images'] = [];

		foreach ($product_images as $product_image) {
			if (is_file(DIR_IMAGE . html_entity_decode($product_image['image'], ENT_QUOTES, 'UTF-8'))) {
				$image = $product_image['image'];
				$thumb = $product_image['image'];
			} else {
				$image = '';
				$thumb = 'no_image.png';
			}

			$data['product_images'][] = [
				'image' => $image,
				'thumb' => $this->model_tool_image->resize(html_entity_decode($thumb, ENT_QUOTES, 'UTF-8'), 300, 300),
				'sort_order' => $product_image['sort_order']
			];
		}

		// Points
		if (!empty($product_info)) {
			$data['points'] = $product_info['points'];
		} else {
			$data['points'] = '';
		}

		// Rewards
		if ($product_id) {
			$data['product_reward'] = $this->model_catalog_product->getRewards($product_id);
		} else {
			$data['product_reward'] = [];
		}

		// SEO
		if ($product_id) {
			$data['product_seo_url'] = $this->model_catalog_product->getSeoUrls($product_id);
		} else {
			$data['product_seo_url'] = [];
		}

		// Layouts
		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		if ($product_id) {
			$data['product_layout'] = $this->model_catalog_product->getLayouts($product_id);
		} else {
			$data['product_layout'] = [];
		}

		$data['advanced_shipping'] = $this->config->get('shipping_zoneshipping_status');


		// Get the shipping zones

		// Get the language_id

		if ($data['advanced_shipping']) {
			$language_id = $this->config->get('config_language_id');
			$this->load->model('extension/ventocart/shipping/zoneshipping');

			$data['shipping_packages'] = $this->model_extension_ventocart_shipping_zoneshipping->getAllShippingZones();
			$data['language_id'] = $language_id;
			$data['shipping_fixed_prices'] = json_encode(
				$this->model_extension_ventocart_shipping_zoneshipping->getProductFixed($product_id)
			);

		}



		$data['report'] = $this->getReport();
		$data['tabOptions'] = $this->loadOptions($product_id);
		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		//Tabs
		$data['images_tab'] = $this->load->view('catalog/product_tabs/images_tab', $data);
		$data['attributes_tab'] = $this->load->view('catalog/product_tabs/attributes_tab', $data);
		$data['general_tab'] = $this->load->view('catalog/product_tabs/general_tab', $data);

		$data['data_tab'] = $this->load->view('catalog/product_tabs/data_tab', $data);
		$data['links_tab'] = $this->load->view('catalog/product_tabs/links_tab', $data);
		$data['subscription_tab'] = $this->load->view('catalog/product_tabs/subscription_tab', $data);
		$data['pricing_tab'] = $this->load->view('catalog/product_tabs/pricing_tab', $data);

		$this->response->setOutput($this->load->view('catalog/product_form', $data));
	}

	public function save(): void
	{
		$this->load->language('catalog/product');

		$json = [];

		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$json['error']['warning'] = $this->language->get('error_permission');
		}



		if ($this->config->get('shipping_zoneshipping_status')) {
			$this->load->model('extension/ventocart/shipping/zoneshipping');

			if (!empty($this->request->post['shipping_fixed_prices'])) {
				$this->request->post['shipping_fixed_prices'] = html_entity_decode($this->request->post['shipping_fixed_prices']);
				$shipping_fixed_prices = json_decode($this->request->post['shipping_fixed_prices'], true);

				if (json_last_error() === JSON_ERROR_NONE) {
					$this->model_extension_ventocart_shipping_zoneshipping->saveProductFixed($shipping_fixed_prices, $this->request->post['product_id']);
				} else {
					$json['error']['shipping_fixed_prices'] = 'Invalid JSON data';
				}
			}
		}



		foreach ($this->request->post['product_description'] as $language_id => $value) {
			if ((oc_strlen(trim($value['name'])) < 1) || (oc_strlen($value['name']) > 255)) {

				$json['error']['name_' . $language_id] = $this->language->get('error_name');
			}

			if ((oc_strlen(trim($value['meta_title'])) < 1) || (oc_strlen($value['meta_title']) > 255)) {
				$json['error']['meta_title_' . $language_id] = $this->language->get('error_meta_title');
			}
		}

		if ((oc_strlen($this->request->post['model']) < 1) || (oc_strlen($this->request->post['model']) > 64)) {
			$json['error']['model'] = $this->language->get('error_model');
		}

		// Validate SKU
		$this->load->model('catalog/product');
		$SkuProtect = $this->model_catalog_product->validateFreeSku($this->request->post['sku'], $this->request->post['product_id']);
		if (!$SkuProtect) {
			$json['error']['sku'] = $this->language->get('error_sku_not_unique');
		}

		foreach ($this->request->post['product_seo_url'] as $language_id => $seowt) {

			if (strlen($seowt) < 1) {

				$json['error']['seo'] = $this->language->get('error_keyword');
			} else {

				$seoProtect = $this->model_catalog_product->SEOKeywordExists($this->request->post['product_id'], $language_id, $seowt);
				if ($seoProtect) {
					$json['error']['seo'] = $this->language->get('error_keyword_exists');
				}



			}
		}

		if (!$json) {
			// Normal product add or edit

			if (!$this->request->post['product_id']) {
				// Normal product add
				$json['product_id'] = $this->model_catalog_product->addProduct($this->request->post);
			} else {
				// Normal product edit
				$this->model_catalog_product->editProduct($this->request->post['product_id'], $this->request->post);
			}

			$json['success'] = $this->language->get('text_success');
		}


		if (isset($json['product_id']) && $json['product_id'] > 0) {
			if (!is_dir(DIR_IMAGE . '/catalog/products')) {
				mkdir(DIR_IMAGE . '/catalog/products');
			}
			if (!is_dir(DIR_IMAGE . "/catalog/products/" . $json['product_id'])) {
				mkdir(DIR_IMAGE . "/catalog/products/" . $json['product_id']);
			}

		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function delete(): void
	{
		$this->load->language('catalog/product');

		$json = [];

		if (isset($this->request->post['selected'])) {
			$selected = $this->request->post['selected'];
		} else {
			$selected = [];
		}

		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('catalog/product');

			foreach ($selected as $product_id) {
				$this->model_catalog_product->deleteProduct($product_id);
			}

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function copy(): void
	{
		$this->load->language('catalog/product');

		$json = [];

		if (isset($this->request->post['selected'])) {
			$selected = $this->request->post['selected'];
		} else {
			$selected = [];
		}

		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('catalog/product');

			foreach ($selected as $product_id) {
				$this->model_catalog_product->copyProduct($product_id);
			}

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function report(): void
	{
		$this->load->language('catalog/product');

		$this->response->setOutput($this->getReport());
	}

	public function getReport(): string
	{
		if (isset($this->request->get['product_id'])) {
			$product_id = (int) $this->request->get['product_id'];
		} else {
			$product_id = 0;
		}

		if (isset($this->request->get['page']) && $this->request->get['route'] == 'catalog/product.report') {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$limit = 10;

		$data['reports'] = [];

		$this->load->model('catalog/product');
		$this->load->model('setting/store');

		$results = $this->model_catalog_product->getReports($product_id, ($page - 1) * $limit, $limit);

		foreach ($results as $result) {



			$data['reports'][] = [
				'ip' => $result['ip'],
				'country' => $result['country'],
				'date_added' => date($this->language->get('datetime_format'), strtotime($result['date_added']))
			];
		}

		$report_total = $this->model_catalog_product->getTotalReports($product_id);

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $report_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('catalog/product.report', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $product_id . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($report_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($report_total - $limit)) ? $report_total : ((($page - 1) * $limit) + $limit), $report_total, ceil($report_total / $limit));

		return $this->load->view('catalog/product_report', $data);
	}


	/**
	 * Autocomplete
	 *
	 * @return void
	 */
	public function autocomplete(): void
	{
		$json = [];

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
		$this->load->model('catalog/option');
		$this->load->model('catalog/subscription_plan');

		$results = $this->model_catalog_product->getProducts($filter_data);

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
				'subscription' => $subscription_data,
				'price' => $result['price'],
				'option' => $this->model_catalog_product->getOptionsLegacy($result['product_id']),
			];
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

}
