<?php
namespace Ventocart\Catalog\Controller\Product;
class Product extends \Ventocart\System\Engine\Controller
{
	public function index(): void
	{

		$this->load->language('product/product');

		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$this->load->model('catalog/category');

		/* Product related */
		$data['quickview'] = 0;

		if (isset($this->request->get['quickview'])) {
			$data['quickview'] = 1;
		}


		if (isset($this->request->get['path'])) {
			$path = '';

			$parts = explode('_', (string) $this->request->get['path']);

			$category_id = (int) array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = $path_id;
				} else {
					$path .= '_' . $path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					$datab['breadcrumbs'][] = [
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path)
					];
				}
			}

			// Set the last category breadcrumb
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$url = '';

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

				$datab['breadcrumbs'][] = [
					'text' => $category_info['name'],
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url)
				];
			}
		}

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->get['manufacturer_id'])) {
			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_brand'),
				'href' => $this->url->link('product/manufacturer')
			];

			$url = '';

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

			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($this->request->get['manufacturer_id']);

			if ($manufacturer_info) {
				$datab['breadcrumbs'][] = [
					'text' => $manufacturer_info['name'],
					'href' => $this->url->link('product/manufacturer.info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . $url)
				];
			}
		}

		if (isset($this->request->get['search']) || isset($this->request->get['tag'])) {
			$url = '';

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
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

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_search'),
				'href' => $this->url->link('product/search', $url)
			];
		}

		if (isset($this->request->get['product_id'])) {
			$product_id = (int) $this->request->get['product_id'];
		} else {
			$product_id = 0;
		}

		$this->load->model('catalog/product');
		$this->load->model('localisation/package');

		$product_info = $this->model_catalog_product->getProduct($product_id);

		$data['package'] = [];

		// Check if product info is available
		if ($product_info) {
			// Add the weight and dimensions to the package data
			if ($product_info['weight'] > 0) {
				$data['package']['weight'] = $product_info['weight'];

				$weight_class_info = $this->model_localisation_package->getWeightClass($product_info['weight_class_id']);
				$data['package']['weight_class'] = $weight_class_info ? $weight_class_info['title'] : 'Unknown';

			}
			if ($product_info['length'] > 0) {
				$data['package']['length'] = $product_info['length'];
				$data['package']['width'] = $product_info['width'];
				$data['package']['height'] = $product_info['height'];

				$length_class_info = $this->model_localisation_package->getLengthClass($product_info['length_class_id']);
				$data['package']['length_class'] = $length_class_info ? $length_class_info['title'] : 'Unknown';

			}

			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
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

			$datab['breadcrumbs'][] = [
				'text' => $product_info['name'],
				'href' => $this->url->link('product/product', $url . '&product_id=' . $this->request->get['product_id'])
			];

			$this->document->setTitle($product_info['meta_title']);
			$this->document->setDescription($product_info['meta_description']);
			$this->document->setKeywords($product_info['meta_keyword']);
			$this->document->addLink($this->url->link('product/product', 'product_id=' . $this->request->get['product_id']), 'canonical');



			$data['heading_title'] = $product_info['name'];

			$data['text_minimum'] = sprintf($this->language->get('text_minimum'), $product_info['minimum']);
			$data['text_login'] = sprintf($this->language->get('text_login'), $this->url->link('account/login'), $this->url->link('account/register'));
			$data['text_reviews'] = sprintf($this->language->get('text_reviews'), (int) $product_info['reviews']);

			$data['tab_review'] = sprintf($this->language->get('tab_review'), $product_info['reviews']);

			$data['error_upload_size'] = sprintf($this->language->get('error_upload_size'), $this->config->get('config_file_max_size'));

			$data['config_file_max_size'] = ((int) $this->config->get('config_file_max_size') * 1024 * 1024);

			$data['upload'] = $this->url->link('tool/upload');

			$data['product_id'] = (int) $this->request->get['product_id'];

			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($product_info['manufacturer_id']);

			if ($manufacturer_info) {
				$data['manufacturer'] = $manufacturer_info['name'];
			} else {
				$data['manufacturer'] = '';
			}

			$data['manufacturers'] = $this->url->link('product/manufacturer.info', 'manufacturer_id=' . $product_info['manufacturer_id']);
			$data['model'] = $product_info['model'];
			$data['sku'] = $product_info['sku'];
			$data['reward'] = $product_info['reward'];
			$data['points'] = $product_info['points'];
			$data['description'] = html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8');
			$data['discount'] = $product_info['discount'];



			if ($product_info['quantity'] <= 0) {
				$this->load->model('localisation/stock_status');

				$stock_status_info = $this->model_localisation_stock_status->getStockStatus($product_info['stock_status_id']);

				if ($stock_status_info) {
					$data['stock'] = $stock_status_info['name'];
				} else {
					$data['stock'] = '';
				}
			} elseif ($this->config->get('config_stock_display')) {
				$data['stock'] = $product_info['quantity'];
			} else {
				$data['stock'] = $this->language->get('text_instock');
			}

			$data['rating'] = (int) $product_info['rating'];
			$data['review_status'] = (int) $this->config->get('config_review_status');

			$data['review'] = $this->load->controller('product/review');

			$data['add_to_wishlist'] = $this->url->link('account/wishlist.add');
			$data['add_to_compare'] = $this->url->link('product/compare.add');

			$this->load->model('tool/image');
			// Video poster creation
			$fileExtension = strtolower(pathinfo($product_info['image'], PATHINFO_EXTENSION));
			$poster = '';

			if (in_array($fileExtension, ['mp4', 'mkv', 'avi'])) {

				// Prepare the resized video thumbnail, the URL is the same as the video
				$image_format = $this->config->get('config_image_filetype');
				if ($image_format == 'as_uploaded') {
					$image_format = ".png";  // Default to PNG if 'as_uploaded' is chosen
				}
				$image = $product_info['image'];

				$poster = substr_replace($product_info['image'], '.png', strrpos($product_info['image'], '.'));  // Only modify the $poster variable

			}

			if (is_file(DIR_IMAGE . html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'))) {
				$data['popup'] = $this->model_tool_image->resize(html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
			} else {
				$data['popup'] = '';
			}
			$data['images'] = [];

			$data['images'][] = [
				'popup' => $this->model_tool_image->resize(html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height')),
				'thumb' => $this->model_tool_image->resize(html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height')),
				'poster' => $this->model_tool_image->resize(html_entity_decode($poster, ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'))
			];

			if (is_file(DIR_IMAGE . html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'))) {
				$data['thumb'] = $this->model_tool_image->resize(html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
				$data['poster'] = $this->model_tool_image->resize(html_entity_decode($poster, ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));

			} else {
				$data['thumb'] = '';
			}
			$data['thumb_width'] = $this->config->get('config_image_additional_width');
			$data['thumb_height'] = $this->config->get('config_image_additional_height');

			$data['picont_width'] = $this->config->get('config_image_thumb_width');
			$data['picont_height'] = $this->config->get('config_image_thumb_height');

			$results = $this->model_catalog_product->getImages($this->request->get['product_id']);

			foreach ($results as $result) {
				if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {

					$fileExtension = strtolower(pathinfo($result['image'], PATHINFO_EXTENSION));
					$poster = '';

					if (in_array($fileExtension, ['mp4', 'mkv', 'avi'])) {

						// Prepare the resized video thumbnail, the URL is the same as the video
						$image_format = $this->config->get('config_image_filetype');
						if ($image_format == 'as_uploaded') {
							$image_format = ".png";  // Default to PNG if 'as_uploaded' is chosen
						}


						$poster = substr_replace($result['image'], '.png', strrpos($result['image'], '.'));  // Only modify the $poster variable

					}


					$this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
					$data['images'][] = [

						'popup' => $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height')),

						'poster' => $this->model_tool_image->resize(html_entity_decode($poster, ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height')),
						'thumb' => $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'))


					];
				}
			}


			//For js calculations
			$data['taxrates'] = $this->tax->getRates(0, $product_info['tax_class_id']);

			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				// Calculate the tax amount and format it
				$withtax = $this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax'));
				$tax_amount = $withtax - $product_info['price'];

				// Format the tax amount according to the store's currency
				$data['tax_amount'] = $this->currency->format($tax_amount, $this->session->data['currency']);
				$data['price'] = $this->currency->format($withtax, $this->session->data['currency']);
			} else {
				$data['price'] = false;
			}

			if ((float) $product_info['special']) {
				$special_info = $this->model_catalog_product->getSpecial($product_info['product_id']);


				$data['special_ends'] = $special_info['date_end'];

				if ($special_info['apply'] == 1) {
					$data['specialfull'] = number_format($special_info['price'], 0);
				}
				if ($special_info['type'] == 1) {
					$data['special_off'] = number_format($special_info['price'], 0);
				}

				$data['special'] = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$data['special'] = false;
			}

			if ($this->config->get('config_tax')) {
				$data['tax'] = $this->currency->format((float) $product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
			} else {
				$data['tax'] = false;
			}

			$discounts = $this->model_catalog_product->getDiscounts($this->request->get['product_id']);

			$data['discounts'] = [];

			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				foreach ($discounts as $discount) {


					$data['discounts'][] = [
						'quantity' => $discount['quantity'],
						'price' => $this->currency->format($this->tax->calculate($discount['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])
					];
				}
			}

			$data['options'] = [];

			// Check if product is variant

			$product_id = (int) $this->request->get['product_id'];


			$product_options = $this->model_catalog_product->getOptions($product_id);
			$variations = $this->model_catalog_product->getVariations($product_id);

			$data['variations'] = $variations;

			foreach ($product_options as $option) {




				if ((int) $this->request->get['product_id'] && !isset($product_info['override']['variant'][$option['product_option_id']])) {
					$product_option_value_data = [];

					foreach ($option['product_option_value'] as $option_value) {

						if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float) $option_value['price']) {
							$price = $this->currency->format($this->tax->calculate($option_value['price'], $product_info['tax_class_id'], $this->config->get('config_tax') ? 'P' : false), $this->session->data['currency']);
						} else {
							$price = false;
						}

						if (isset($option_value['image']) && is_file(DIR_IMAGE . html_entity_decode($option_value['image'], ENT_QUOTES, 'UTF-8'))) {
							$image = $this->model_tool_image->resize(html_entity_decode($option_value['image'], ENT_QUOTES, 'UTF-8'), 80, 80);
							$this->model_tool_image->resize(html_entity_decode($option_value['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
							$this->model_tool_image->resize(html_entity_decode($option_value['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
							$this->model_tool_image->resize(html_entity_decode($option_value['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'));

						} else {
							$image = '';
						}

						$product_option_value_data[] = [
							'product_option_value_id' => $option_value['product_option_value_id'],
							'option_value_id' => $option_value['option_value_id'],
							'name' => $option_value['name'],
							'image' => $image,
							'stock' => $option_value['subtract'] ? $option_value['quantity'] : 69,
							'subtract' => $option_value['subtract'],
							'price' => $this->currency->format($option_value['price'], $this->session->data['currency']),
							'price_prefix' => $option_value['price_prefix']
						];


					}


					$data['options'][] = [
						'product_option_id' => $option['product_option_id'],
						'product_option_value' => $product_option_value_data,
						'option_id' => $option['option_id'],
						'name' => $option['name'],
						'type' => $option['type'],
						'value' => $option['value'],
						'required' => $option['required']
					];
				}
			}

			// Subscriptions
			$data['subscription_plans'] = [];

			$results = $this->model_catalog_product->getSubscriptions($this->request->get['product_id']);

			foreach ($results as $result) {
				$description = '';

				if ($result['trial_status']) {
					$trial_price = $this->currency->format($this->tax->calculate($result['trial_price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_cycle = $result['trial_cycle'];
					$trial_frequency = $this->language->get('text_' . $result['trial_frequency']);
					$trial_duration = $result['trial_duration'];

					$description .= sprintf($this->language->get('text_subscription_trial'), $trial_price, $trial_cycle, $trial_frequency, $trial_duration);
				}

				$price = $this->currency->format($this->tax->calculate($result['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$cycle = $result['cycle'];
				$frequency = $this->language->get('text_' . $result['frequency']);
				$duration = $result['duration'];

				if ($duration) {
					$description .= sprintf($this->language->get('text_subscription_duration'), $price, $cycle, $frequency, $duration);
				} else {
					$description .= sprintf($this->language->get('text_subscription_cancel'), $price, $cycle, $frequency);
				}

				$data['subscription_plans'][] = [
					'subscription_plan_id' => $result['subscription_plan_id'],
					'name' => $result['name'],
					'description' => $description
				];
			}

			if ($product_info['minimum']) {
				$data['minimum'] = $product_info['minimum'];
			} else {
				$data['minimum'] = 1;
			}

			$data['share'] = $this->url->link('product/product', 'product_id=' . (int) $this->request->get['product_id']);

			$data['attribute_groups'] = $this->model_catalog_product->getAttributes($this->request->get['product_id']);

			$data['products'] = [];

			$results = $this->model_catalog_product->getRelated($this->request->get['product_id']);

			foreach ($results as $result) {
				if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {
					$image = $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_related_width'), $this->config->get('config_image_related_height'));
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('config_image_related_width'), $this->config->get('config_image_related_height'));
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
					'thumb' => $image,
					'name' => $result['name'],
					'description' => oc_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('config_product_description_length')) . '..',
					'price' => $price,
					'special' => $special,
					'tax' => $tax,
					'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating' => $result['rating'],
					'href' => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				];

				$data['products'][] = $this->load->controller('product/thumb', $product_data);
			}

			$data['tags'] = [];
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
			if ($product_info['tag']) {
				$tags = explode(',', $product_info['tag']);

				foreach ($tags as $tag) {
					$data['tags'][] = [
						'tag' => trim($tag),
						'href' => $this->url->link('product/search', 'tag=' . trim($tag))
					];
				}
			}

			if ($this->config->get('config_product_report_status')) {
				$this->model_catalog_product->addReport($this->request->get['product_id'], $this->request->server['REMOTE_ADDR']);
			}
			$data['display_without_tax'] = $this->config->get('config_tax_display_without_tax');
			$data['display_amount_tax'] = $this->config->get('config_tax_display_amount_tax');
			$data['language'] = $this->config->get('config_language');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);



			$this->response->setOutput($this->load->view('product/product', $data));


		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
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

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/product', $url . '&product_id=' . $product_id)
			];

			$this->document->setTitle($this->language->get('text_error'));

			$data['continue'] = $this->url->link('common/home');
			$data['heading_title'] = $this->language->get('text_error');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');
			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}
	/*  
	 * @return void
	 */
	public function getImage(): void
	{
		//Helper function for fetching dynamically images at any size, for your
		//scripts and themes
		$this->load->model('tool/image');

		$width = $this->request->get['width'];
		$height = $this->request->get['height'];
		$image = urldecode($this->request->get['image']);
		if (!isset($this->request->get['crop'])) {
			$result = $this->model_tool_image->resize(html_entity_decode($image, ENT_QUOTES, 'UTF-8'), $width, $height);
		} else {
			$result = $this->model_tool_image->resize(html_entity_decode($image, ENT_QUOTES, 'UTF-8'), $width, $height, '', true);
		}
		$path = preg_replace('#.*?(' . preg_quote('image/cache', '#') . '.*?)$#', '$1', $result);

		$imageContent = file_get_contents(DIR_VENTOCART . $path);
		if (is_file(DIR_VENTOCART . $path) && $imageContent !== false) {
			// Set headers to indicate it's an image
			header('Content-Type: image/jpeg');
			header('Content-Length: ' . strlen($imageContent));

			// Output the image content
			echo $imageContent;
		} else {
			// If fetching failed, handle the error
			echo 'Error fetching image';
		}
	}
}
