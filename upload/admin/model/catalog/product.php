<?php
namespace Ventocart\Admin\Model\Catalog;

class Product extends \Ventocart\System\Engine\Model
{
	public function addProduct(array $data): int
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "product` SET  `model` = '" . $this->db->escape((string) $data['model']) . "', `sku` = '" . $this->db->escape((string) $data['sku']) . "', `upc` = '" . $this->db->escape((string) $data['upc']) . "', `ean` = '" . $this->db->escape((string) $data['ean']) . "', `jan` = '" . $this->db->escape((string) $data['jan']) . "', `isbn` = '" . $this->db->escape((string) $data['isbn']) . "', `mpn` = '" . $this->db->escape((string) $data['mpn']) . "', `location` = '" . $this->db->escape((string) $data['location']) . "', `variant` = '" . $this->db->escape(!empty($data['variant']) ? json_encode($data['variant']) : '') . "', `override` = '" . $this->db->escape(!empty($data['override']) ? json_encode($data['override']) : '') . "', `quantity` = '" . (int) $data['quantity'] . "', `minimum` = '" . (int) $data['minimum'] . "', `subtract` = '" . (isset($data['subtract']) ? (bool) $data['subtract'] : 0) . "', `stock_status_id` = '" . (int) $data['stock_status_id'] . "', `date_available` = '" . $this->db->escape((string) $data['date_available']) . "', `manufacturer_id` = '" . (int) $data['manufacturer_id'] . "', `shipping` = '" . (isset($data['shipping']) ? (bool) $data['shipping'] : 0) . "', `price` = '" . (float) $data['price'] . "', `points` = '" . (int) $data['points'] . "', `weight` = '" . (float) $data['weight'] . "', `weight_class_id` = '" . (int) $data['weight_class_id'] . "', `length` = '" . (float) $data['length'] . "', `width` = '" . (float) $data['width'] . "', `height` = '" . (float) $data['height'] . "', `length_class_id` = '" . (int) $data['length_class_id'] . "', `status` = '" . (bool) (isset($data['status']) ? $data['status'] : 0) . "', `tax_class_id` = '" . (int) $data['tax_class_id'] . "', `sort_order` = '" . (int) $data['sort_order'] . "', `date_added` = NOW(), `date_modified` = NOW()");

		$product_id = $this->db->getLastId();


		//No image uploads until product is saved

		// Description
		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "product_description` SET `product_id` = '" . (int) $product_id . "', `language_id` = '" . (int) $language_id . "', `name` = '" . $this->db->escape($value['name']) . "', `description` = '" . $this->db->escape($value['description']) . "', `tag` = '" . $this->db->escape($value['tag']) . "', `meta_title` = '" . $this->db->escape($value['meta_title']) . "', `meta_description` = '" . $this->db->escape($value['meta_description']) . "', `meta_keyword` = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		// Categories
		if (isset($data['product_category'])) {
			foreach ($data['product_category'] as $category_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_to_category` SET `product_id` = '" . (int) $product_id . "', `category_id` = '" . (int) $category_id . "'");
			}
		}

		// Filters
		if (isset($data['product_filter'])) {
			foreach ($data['product_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_filter` SET `product_id` = '" . (int) $product_id . "', `filter_id` = '" . (int) $filter_id . "'");
			}
		}



		// Downloads
		if (isset($data['product_download'])) {
			foreach ($data['product_download'] as $download_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_to_download` SET `product_id` = '" . (int) $product_id . "', `download_id` = '" . (int) $download_id . "'");
			}
		}

		// Related
		if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {

				$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . (int) $product_id . "' AND `related_id` = '" . (int) $related_id . "'");
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_related` SET `product_id` = '" . (int) $product_id . "', `related_id` = '" . (int) $related_id . "'");
				$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . (int) $related_id . "' AND `related_id` = '" . (int) $product_id . "'");
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_related` SET `product_id` = '" . (int) $related_id . "', `related_id` = '" . (int) $product_id . "'");
			}
		}

		// Attributes
		if (isset($data['product_attribute'])) {
			$this->updateOrInsertAttribute($product_id, $data);
		}

		// Options

		if (isset($data['product_option'])) {
			foreach ($data['product_option'] as $product_option) {

				if (!isset($product_option['required']))
					$product_option['required'] = 0;
				// Common properties
				$product_id = (int) $product_id;
				$required = (int) $product_option['required'];

				// Select, radio, checkbox, or image type
				if (in_array($product_option['type'], ['select', 'radio', 'checkbox', 'image'])) {
					if (isset($product_option['product_option_value'])) {
						foreach ($product_option['product_option_value'] as $product_option_value) {


							$this->updateOrInsertProductOption($product_id, $required, $product_option_value);
						}
					}
				} else {
					// Other types
					$this->updateOrInsertProductOptionForOtherTypes($product_id, $required, $product_option);
				}
			}
		}


		// Subscription
		if (isset($data['product_subscription'])) {
			foreach ($data['product_subscription'] as $product_subscription) {
				$query = $this->db->query("SELECT `product_id` FROM `" . DB_PREFIX . "product_subscription` WHERE `product_id` = '" . (int) $product_id . "' AND `customer_group_id` = '" . (int) $product_subscription['customer_group_id'] . "' AND `subscription_plan_id` = '" . (int) $product_subscription['subscription_plan_id'] . "'");

				if (!$query->num_rows) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "product_subscription` SET `product_id` = '" . (int) $product_id . "', `customer_group_id` = '" . (int) $product_subscription['customer_group_id'] . "', `subscription_plan_id` = '" . (int) $product_subscription['subscription_plan_id'] . "', `trial_price` = '" . (float) $product_subscription['trial_price'] . "', `price` = '" . (float) $product_subscription['price'] . "'");
				}
			}
		}

		// Discounts
		if (isset($data['product_discount'])) {
			foreach ($data['product_discount'] as $product_discount) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_discount` SET `product_id` = '" . (int) $product_id . "', `customer_group_id` = '" . (int) $product_discount['customer_group_id'] . "', `quantity` = '" . (int) $product_discount['quantity'] . "', `priority` = '" . (int) $product_discount['priority'] . "', `price` = '" . (float) $product_discount['price'] . "', `date_start` = '" . $this->db->escape($product_discount['date_start']) . "', `date_end` = '" . $this->db->escape($product_discount['date_end']) . "'");
			}
		}

		// Specials
		if (isset($data['product_special'])) {
			foreach ($data['product_special'] as $product_special) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_special` SET `product_id` = '" . (int) $product_id . "', `customer_group_id` = '" . (int) $product_special['customer_group_id'] . "', `priority` = '" . (int) $product_special['priority'] . "', `price` = '" . (float) $product_special['price'] . "', `date_start` = '" . $this->db->escape($product_special['date_start']) . "', `date_end` = '" . $this->db->escape($product_special['date_end']) . "'");
			}
		}



		// Reward
		if (isset($data['product_reward'])) {
			foreach ($data['product_reward'] as $customer_group_id => $product_reward) {
				if ((int) $product_reward['points'] > 0) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "product_reward` SET `product_id` = '" . (int) $product_id . "', `customer_group_id` = '" . (int) $customer_group_id . "', `points` = '" . (int) $product_reward['points'] . "'");
				}
			}
		}

		// SEO URL


		if (isset($data['product_seo_url'])) {
			foreach ($data['product_seo_url'] as $language_id => $keyword) {

				$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET   `language_id` = '" . (int) $language_id . "', `key` = 'product_id', `value` = '" . (int) $product_id . "', `keyword` = '" . $this->db->escape($this->convertToSeoFriendly($keyword)) . "'");

			}
		}



		$this->cache->delete('product');

		return $product_id;
	}


	private function updateOrInsertAttribute($product_id, $data)
	{
		if (!empty($data['product_attribute'])) {

			foreach ($data['product_attribute'] as $product_attribute) {
				if (isset($product_attribute['attribute_id'])) {

					// Removes duplicates
					$this->db->query("DELETE FROM `" . DB_PREFIX . "product_attribute` WHERE `product_id` = '" . (int) $product_id . "' AND `attribute_id` = '" . (int) $product_attribute['attribute_id'] . "'");

					// Insert
					if (isset($product_attribute['product_attribute_description'])) {
						$prev_sort = 0;
						foreach ($product_attribute['product_attribute_description'] as $index => $attribute) {

							foreach ($attribute as $language_id => $attrvalue) {
								$sort_order = isset($attrvalue['sort_order']) ? $attrvalue['sort_order'] : $prev_sort;
								$prev_sort = $sort_order;
								$this->db->query("INSERT INTO `" . DB_PREFIX . "product_attribute` SET `attribute_n` = '" . (int) $index . "',  
						`product_id` = '" . (int) $product_id . "', 
						`attribute_id` = '" . (int) $product_attribute['attribute_id'] . "', 
						`language_id` = '" . (int) $language_id . "', 
						`text` = '" . $this->db->escape($attrvalue['text']) . "', 
						`value_text` = '" . $this->db->escape($attrvalue['value_text']) . "', 
						`sort_order` = '" . $sort_order .
									"'");
							}
						}
					}
				}
			}
		}
	}
	public function editProduct(int $product_id, array $data): void
	{


		$this->db->query("UPDATE `" . DB_PREFIX . "product` SET 
		`model` = '" . $this->db->escape((string) $data['model']) . "', 
		`sku` = '" . $this->db->escape((string) $data['sku']) . "', 
		`upc` = '" . $this->db->escape((string) $data['upc']) . "', 
		`ean` = '" . $this->db->escape((string) $data['ean']) . "', 
		`jan` = '" . $this->db->escape((string) $data['jan']) . "', 
		`isbn` = '" . $this->db->escape((string) $data['isbn']) . "', 
		`mpn` = '" . $this->db->escape((string) $data['mpn']) . "', 
		`location` = '" . $this->db->escape((string) $data['location']) . "', 
		`variant` = '" . $this->db->escape(!empty($data['variant']) ? json_encode($data['variant']) : '') . "', 
		`override` = '" . $this->db->escape(!empty($data['override']) ? json_encode($data['override']) : '') . "', 
		`quantity` = '" . (int) $data['quantity'] . "', 
		`minimum` = '" . (int) $data['minimum'] . "', 
		`subtract` = '" . (isset($data['subtract']) ? (bool) $data['subtract'] : 0) . "', 
		`stock_status_id` = '" . (int) $data['stock_status_id'] . "', 
		`date_available` = '" . $this->db->escape((string) $data['date_available']) . "', 
		`manufacturer_id` = '" . (int) $data['manufacturer_id'] . "', 
		`shipping` = '" . (isset($data['shipping']) ? (bool) $data['shipping'] : 0) . "', 
		`price` = '" . (float) $data['price'] . "', 
		`supply_cost` = '" . (float) $data['supply_cost'] . "', 
		`points` = '" . (int) $data['points'] . "', 
		`weight` = '" . (float) $data['weight'] . "', 
		`weight_class_id` = '" . (int) $data['weight_class_id'] . "', 
		`length` = '" . (float) $data['length'] . "', 
		`width` = '" . (float) $data['width'] . "', 
		
		`height` = '" . (float) $data['height'] . "', 
		`length_class_id` = '" . (int) $data['length_class_id'] . "', 
		`status` = '" . (bool) (isset($data['status']) ? $data['status'] : 0) . "', 
		`tax_class_id` = '" . (int) $data['tax_class_id'] . "', 
		`sort_order` = '" . (int) $data['sort_order'] . "', 
		`date_modified` = NOW() WHERE `product_id` = '" . (int) $product_id . "'");


		//Resort array based on sort_order 
		if (!empty($data['product_image'])) {
			usort($data['product_image'], function ($a, $b) {
				return $a['sort_order'] - $b['sort_order'];
			});
		}

		if (!empty($data['product_image'][0]['image'])) {
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `image` = '" . $this->db->escape((string) $data['product_image'][0]['image']) . "' WHERE `product_id` = '" . (int) $product_id . "'");

			//Remove the "product" main image from the array 

		} else {
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `image` = '' WHERE `product_id` = '" . (int) $product_id . "'");

		}
		if (!empty($data['product_image'])) {
			array_shift($data['product_image']);
		}



		// Description
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_description` WHERE `product_id` = '" . (int) $product_id . "'");

		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "product_description` SET `product_id` = '" . (int) $product_id . "', `language_id` = '" . (int) $language_id . "', `name` = '" . $this->db->escape($value['name']) . "', `description` = '" . $this->db->escape($value['description']) . "', `tag` = '" . $this->db->escape($value['tag']) . "', `meta_title` = '" . $this->db->escape($value['meta_title']) . "', `meta_description` = '" . $this->db->escape($value['meta_description']) . "', `meta_keyword` = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		// Categories
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_category` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_category'])) {
			foreach ($data['product_category'] as $category_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_to_category` SET `product_id` = '" . (int) $product_id . "', `category_id` = '" . (int) $category_id . "'");
			}
		}

		// Filters
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_filter` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_filter'])) {
			foreach ($data['product_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_filter` SET `product_id` = '" . (int) $product_id . "', `filter_id` = '" . (int) $filter_id . "'");
			}
		}





		// Downloads
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_download` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_download'])) {
			foreach ($data['product_download'] as $download_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_to_download` SET `product_id` = '" . (int) $product_id . "', `download_id` = '" . (int) $download_id . "'");
			}
		}

		// Related
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `related_id` = '" . (int) $product_id . "'");

		if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {
				$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . (int) $product_id . "' AND `related_id` = '" . (int) $related_id . "'");
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_related` SET `product_id` = '" . (int) $product_id . "', `related_id` = '" . (int) $related_id . "'");
				$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . (int) $related_id . "' AND `related_id` = '" . (int) $product_id . "'");
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_related` SET `product_id` = '" . (int) $related_id . "', `related_id` = '" . (int) $product_id . "'");
			}
		}

		// Attributes

		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_attribute` WHERE `product_id` = '" . (int) $product_id . "'");


		if (!empty($data['product_attribute'])) {

			$this->updateOrInsertAttribute($product_id, $data);
		}

		// Options

		if (isset($data['product_option'])) {
			foreach ($data['product_option'] as $product_option) {
				// Marked for deletion, delete and proceed.
				if (isset($product_option['delete'])) {
					$this->deleteProductOption($product_id, $product_option['delete']);

					continue;
				}
				if (!isset($product_option['required']))
					$product_option['required'] = 0;
				// Common properties
				$product_id = (int) $product_id;
				$required = (int) $product_option['required'];

				// Select, radio, checkbox, or image type
				if (in_array($product_option['type'], ['select', 'radio', 'checkbox', 'image'])) {
					if (isset($product_option['product_option_value'])) {
						foreach ($product_option['product_option_value'] as $product_option_value) {


							$this->updateOrInsertProductOption($product_id, $required, $product_option_value);
						}
					}
				} else {
					// Other types
					$this->updateOrInsertProductOptionForOtherTypes($product_id, $required, $product_option);
				}
			}
		}



		// Subscription
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_subscription` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_subscription'])) {
			foreach ($data['product_subscription'] as $product_subscription) {
				$query = $this->db->query("SELECT `product_id` FROM `" . DB_PREFIX . "product_subscription` WHERE `product_id` = '" . (int) $product_id . "' AND `customer_group_id` = '" . (int) $product_subscription['customer_group_id'] . "' AND `subscription_plan_id` = '" . (int) $product_subscription['subscription_plan_id'] . "'");

				if (!$query->num_rows) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "product_subscription` SET `product_id` = '" . (int) $product_id . "', `customer_group_id` = '" . (int) $product_subscription['customer_group_id'] . "', `subscription_plan_id` = '" . (int) $product_subscription['subscription_plan_id'] . "', `trial_price` = '" . (float) $product_subscription['trial_price'] . "', `price` = '" . (float) $product_subscription['price'] . "'");
				}
			}
		}

		// Discounts
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_discount` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_discount'])) {
			foreach ($data['product_discount'] as $product_discount) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_discount` SET `product_id` = '" . (int) $product_id . "', `customer_group_id` = '" . (int) $product_discount['customer_group_id'] . "', `quantity` = '" . (int) $product_discount['quantity'] . "', `priority` = '" . (int) $product_discount['priority'] . "', `price` = '" . (float) $product_discount['price'] . "', `date_start` = '" . $this->db->escape($product_discount['date_start']) . "', `date_end` = '" . $this->db->escape($product_discount['date_end']) . "'");
			}
		}

		// Specials
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_special` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_special'])) {
			foreach ($data['product_special'] as $product_special) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_special` 
				SET 
				`product_id` = '" . (int) $product_id . "', 
				`customer_group_id` = '" . (int) $product_special['customer_group_id'] . "', 
				`priority` = '" . (int) $product_special['priority'] . "', 
				`price` = '" . (float) $product_special['price'] . "', 
				`date_start` = '" . $this->db->escape($product_special['date_start']) . "', 
				`date_end` = '" . $this->db->escape($product_special['date_end']) . "',
				`apply` = '" . (int) $product_special['apply'] . "',
				`type` = '" . (int) $product_special['type'] . "'");
			}
		}

		// Images
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_image` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_image'])) {
			foreach ($data['product_image'] as $product_image) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_image` SET `product_id` = '" . (int) $product_id . "', `image` = '" . $this->db->escape($product_image['image']) . "', `sort_order` = '" . (int) $product_image['sort_order'] . "'");
			}
		}

		// Rewards
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_reward` WHERE `product_id` = '" . (int) $product_id . "'");

		if (isset($data['product_reward'])) {
			foreach ($data['product_reward'] as $customer_group_id => $value) {
				if ((int) $value['points'] > 0) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "product_reward` SET `product_id` = '" . (int) $product_id . "', `customer_group_id` = '" . (int) $customer_group_id . "', `points` = '" . (int) $value['points'] . "'");
				}
			}
		}

		// SEO URL
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'product_id' AND `value` = '" . (int) $product_id . "'");

		if (isset($data['product_seo_url'])) {
			foreach ($data['product_seo_url'] as $language_id => $keyword) {

				$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET  `language_id` = '" . (int) $language_id . "', `key` = 'product_id', `value` = '" . (int) $product_id . "', `keyword` = '" . $this->db->escape($this->convertToSeoFriendly($keyword)) . "'");

			}
		}



		$this->cache->delete('product');
	}
	public function addAllOptions($option_id, $product_id)
	{

		// First, select all options where group_id='$option_id' AND language_id = $this->config->get('config_language_id')
		$query = $this->db->query("
			SELECT *
			FROM `" . DB_PREFIX . "options`
			WHERE `group_id` = '" . (int) $option_id . "'
			AND `language_id` = '" . (int) $this->config->get('config_language_id') . "'
		");


		// Loop through the selected options

		foreach ($query->rows as $option) {
			$insertQuery = "";
			// Check if 'type' is not text, textarea, date, time, or datetime

			if (!in_array($option['type'], array('file', 'text', 'textarea', 'date', 'time', 'datetime'))) {
				// Insert values into DB_PREFIX . "product_options" where option_n != -1
				if ($option['option_n'] != -1) {
					$insertQuery = "
					INSERT INTO `" . DB_PREFIX . "product_options` 
					SET 
						`product_id` = '" . (int) $product_id . "', 
						`option_id` = '" . (int) $option['option_id'] . "', 
						`required` = '0',
						`quantity` = '" . (int) 100 . "', 
						`subtract` = '" . (int) 0 . "', 
						`price` = '" . (float) 0 . "', 
						`price_prefix` = '+', 
						`value` = '', 
						`points` = '" . (int) 0 . "', 
						`points_prefix` = '+', 
						`weight` = '" . (float) 0 . "', 
						`weight_prefix` = '+', 
						`sort_order` = '" . (int) 0 . "'
				";
				}
			} else {
				if ($option['option_n'] == -1) {

					$insertQuery = "
					INSERT INTO `" . DB_PREFIX . "product_options` 
					SET 
						`product_id` = '" . (int) $product_id . "', 
						`option_id` = '" . (int) $option['option_id'] . "', 
						`required` = '0',
						`quantity` = '" . (int) 100 . "', 
						`subtract` = '" . (int) 0 . "', 
						`price` = '" . (float) 0 . "', 
						`price_prefix` = '+', 
						`value` = '', 
						`points` = '" . (int) 0 . "', 
						`points_prefix` = '+', 
						`weight` = '" . (float) 0 . "', 
						`weight_prefix` = '+', 
						`sort_order` = '" . (int) 0 . "'
				";
				}
			}
			if (!empty($insertQuery)) {
				$query = $this->db->query($insertQuery);
			}
		}

		return true;
	}
	public function SEOKeywordExists($product_id, $language_id, $seoKeyword)
	{
		$query = $this->db->query("
			SELECT COUNT(*) AS total
			FROM `" . DB_PREFIX . "seo_url`
			WHERE
	  `language_id` = '" . (int) $language_id . "'
				AND `key` = 'product_id'
				AND `value` != '" . (int) $product_id . "'
				AND `keyword` = '" . $this->db->escape($seoKeyword) . "'
		");

		return ($query->row['total'] > 0);
	}

	private function deleteProductOption($product_id, $product_option_id)
	{
		$sql = "DELETE FROM `" . DB_PREFIX . "product_options` WHERE `product_id` = '" . $product_id . "' AND `product_option_id` = '" . $product_option_id . "'";
		$this->db->query($sql);
	}
	// Function to update or insert a product option
	private function updateOrInsertProductOption($product_id, $required, $product_option_value)
	{
		$value_id = isset($product_option_value['option_value_id']) ? $product_option_value['option_value_id'] : $product_option_value['product_option_value_id'];
		$image = isset($product_option_value['image']) ? $product_option_value['image'] : '';
		$this->db->query("
			REPLACE INTO `" . DB_PREFIX . "product_options`
			SET 
				`product_option_id` = '" . (int) $product_option_value['product_option_id'] . "',
				`product_id` = '" . $product_id . "', 
				`option_id` = '" . (int) $value_id . "', 
				`required` = '" . $required . "',
				`quantity` = '" . (int) $product_option_value['quantity'] . "', 
				`subtract` = '" . (int) $product_option_value['subtract'] . "', 
				`price` = '" . (float) $product_option_value['price'] . "', 
				`price_prefix` = '" . $this->db->escape($product_option_value['price_prefix']) . "', 
				`points` = '" . (int) $product_option_value['points'] . "', 
				`points_prefix` = '" . $this->db->escape($product_option_value['points_prefix']) . "', 
				`weight` = '" . (float) $product_option_value['weight'] . "', 
				`weight_prefix` = '" . $this->db->escape($product_option_value['weight_prefix']) . "',
				`sort_order` = '" . (int) $product_option_value['sort_order'] . "',
				`value` = '" . $this->db->escape($image) . "' 
		");
	}
	private function updateOrInsertProductOptionForOtherTypes($product_id, $required, $product_option)
	{
		$product_option_id = isset($product_option['product_option_id']) ? $product_option['product_option_id'] : 0;
		// Common properties
		$product_id = (int) $product_id;
		if (!isset($product_option['value']))
			$product_option['value'] = '';
		$this->db->query("
			REPLACE INTO `" . DB_PREFIX . "product_options`
			SET 
				`product_id` = '" . $product_id . "', 
				`product_option_id` = '" . (int) $product_option_id . "', 
				`option_id` = '" . $this->db->escape($product_option['option_id']) . "',
				`required` = '" . (int) $required . "',
				`sort_order` = '" . (int) $product_option['sort_order'] . "',
				`value` = '" . $this->db->escape($product_option['value']) . "'
		");
	}
	public function copyProduct(int $product_id): void
	{
		$product_info = $this->model_catalog_product->getProduct($product_id);

		if ($product_info) {
			$product_data = $product_info;

			$product_data['sku'] = '';
			$product_data['upc'] = '';
			$product_data['status'] = '0';

			$product_data['product_attribute'] = $this->model_catalog_product->getAttributes($product_id);
			$product_data['product_category'] = $this->model_catalog_product->getCategories($product_id);
			$product_data['product_description'] = $this->model_catalog_product->getDescriptions($product_id);
			$product_data['product_discount'] = $this->model_catalog_product->getDiscounts($product_id);
			$product_data['product_download'] = $this->model_catalog_product->getDownloads($product_id);
			$product_data['product_filter'] = $this->model_catalog_product->getFilters($product_id);
			$product_data['product_image'] = $this->model_catalog_product->getImages($product_id);
			$product_data['product_layout'] = $this->model_catalog_product->getLayouts($product_id);
			$product_data['product_option'] = $this->model_catalog_product->getOptions($product_id);
			$product_data['product_subscription'] = $this->model_catalog_product->getSubscriptions($product_id);
			$product_data['product_related'] = $this->model_catalog_product->getRelated($product_id);
			$product_data['product_reward'] = $this->model_catalog_product->getRewards($product_id);
			$product_data['product_special'] = $this->model_catalog_product->getSpecials($product_id);
			$product_data['product_store'] = $this->model_catalog_product->getStores($product_id);

			$this->model_catalog_product->addProduct($product_data);
		}
	}

	public function deleteProduct(int $product_id): void
	{
		if (isset($this->request->get['all'])) {
			$all = (int) $this->request->get['all'];
		} else {
			$all = 0;
		}
		if (isset($this->request->get['images'])) {
			$images = (int) $this->request->get['images'];
		} else {
			$images = 0;
		}
		$this->db->query("DELETE FROM `" . DB_PREFIX . "shipping_pfixed` WHERE `product_id` = '" . (int) $product_id . "'");
		if ($all == 1) {

			//For a VentoCart revision:
			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_attribute` WHERE `product_id` = '" . (int) $product_id . "'");
			$attributes = $query->rows;

			foreach ($attributes as $attribute) {
				$this->db->query("DELETE FROM `" . DB_PREFIX . "attribute_description` WHERE `attribute_id` = '" . (int) $attribute['attribute_id'] . "'");
				$this->db->query("DELETE FROM `" . DB_PREFIX . "attribute` WHERE `attribute_id` = '" . (int) $attribute['attribute_id'] . "'");
				$this->db->query("DELETE FROM `" . DB_PREFIX . "product_attribute` WHERE `product_id` = '" . (int) $product_id . "' AND `attribute_id` = '" . (int) $attribute['attribute_id'] . "'");
			}

			// Fetch and delete associated options
			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_options` WHERE `product_id` = '" . (int) $product_id . "'");
			$options = $query->rows;


			foreach ($options as $option) {
				if (isset($option["image"])) {
					$imagePath = DIR_IMAGE . $option["image"];
					if (file_exists($imagePath)) {
						unlink($imagePath);
					}
				}

				$this->db->query("DELETE FROM `" . DB_PREFIX . "options` WHERE   `group_id` = '" . (int) $option['option_id'] . "'");
				$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "options` WHERE `option_id` = '" . (int) $option['option_id'] . "'");

				if ($query->row)
					$this->db->query("DELETE FROM `" . DB_PREFIX . "options` WHERE `option_id` = '" . (int) $query->row['group_id'] . "' OR  `group_id` = '" . (int) $query->row['group_id'] . "'");

			}
			$this->db->query("DELETE FROM `" . DB_PREFIX . "product_options` WHERE `product_id` = '" . (int) $product_id . "'");

		}





		if ($images == 1) {

			// Product main image
			$query = $this->db->query("SELECT image FROM `" . DB_PREFIX . "product` WHERE `product_id` = '" . (int) $product_id . "'");
			$imagesq = $query->row;
			$imagePath = DIR_IMAGE . $imagesq["image"];
			if (isset($imagesq["image"]) && file_exists($imagePath) && $imagesq["image"] != "") {
				unlink($imagePath);
			}

			// Fetch and delete associated images
			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_image` WHERE `product_id` = '" . (int) $product_id . "'");
			$imagesq = $query->rows;

			foreach ($imagesq as $image) {
				$imagePath = DIR_IMAGE . $image["image"];
				if (isset($image["image"]) && file_exists($imagePath) && $image["image"] != "") {
					unlink($imagePath);
				}

			}
			if (is_dir(DIR_IMAGE . 'catalog/products/' . $product_id)) {
				$this->deleteDirectory(DIR_IMAGE . 'catalog/products/' . $product_id);
			}
			if (is_dir(DIR_IMAGE . 'catalog/imports/' . $product_id)) {
				$this->deleteDirectory(DIR_IMAGE . 'catalog/imports/' . $product_id);
			}
		}


		//delete variations
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "variations` WHERE `product_id` = '" . (int) $product_id . "'");
		foreach ($query->rows as $variation) {
			$this->db->query("DELETE FROM `" . DB_PREFIX . "variation_options` WHERE `variation_id` = '" . (int) $variation['variation_id'] . "'");

		}

		$this->db->query("DELETE FROM `" . DB_PREFIX . "variations` WHERE `product_id` = '" . (int) $product_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_viewed` WHERE `product_id` = '" . (int) $product_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "product` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_attribute` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_description` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_discount` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_filter` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_image` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_subscription` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `related_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_report` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_reward` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_special` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_category` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_download` WHERE `product_id` = '" . (int) $product_id . "'");


		$this->db->query("DELETE FROM `" . DB_PREFIX . "review` WHERE `product_id` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'product_id' AND `value` = '" . (int) $product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "coupon_product` WHERE `product_id` = '" . (int) $product_id . "'");


		$this->cache->delete('product');
	}




	function deleteDirectory($directoryPath)
	{
		if (!is_dir($directoryPath)) {
			// If it's not a directory, return
			return false;
		}

		// Open the directory
		$directoryHandle = opendir($directoryPath);

		// Loop through the directory
		while (($file = readdir($directoryHandle)) !== false) {
			if ($file != '.' && $file != '..') {
				$filePath = $directoryPath . '/' . $file;

				// If it's a directory, recursively delete it
				if (is_dir($filePath)) {
					$this->deleteDirectory($filePath);
				} else {
					// If it's a file, delete it
					unlink($filePath);
				}
			}
		}

		// Close the directory handle
		closedir($directoryHandle);

		// Delete the main directory
		rmdir($directoryPath);

		return true;
	}


	public function editRating(int $product_id, int $rating): void
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `rating` = '" . (int) $rating . "', `date_modified` = NOW() WHERE `product_id` = '" . (int) $product_id . "'");
	}

	public function getProduct(int $product_id): array
	{
		$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "product` p LEFT JOIN `" . DB_PREFIX . "product_description` pd ON (p.`product_id` = pd.`product_id`) WHERE p.`product_id` = '" . (int) $product_id . "' AND pd.`language_id` = '" . (int) $this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getProducts(array $data = []): array
	{
		// Select only necessary columns
		$sql = "SELECT 
					p.`product_id`, 
					p.`model`, 
					p.`price`, 
					                p.`image`, 
					p.`quantity`, 
					p.`status`, 
					p.`sort_order`,
					IFNULL(pd.`name`, '') AS name,
					IFNULL(p2c.`category_id`, 0) AS category_id
				FROM `" . DB_PREFIX . "product` p
				LEFT JOIN `" . DB_PREFIX . "product_description` pd 
					ON p.`product_id` = pd.`product_id` 
					AND pd.`language_id` = '" . (int) $this->config->get('config_language_id') . "'
				LEFT JOIN `" . DB_PREFIX . "product_to_category` p2c 
					ON p.`product_id` = p2c.`product_id`
				WHERE 1";

		// Filters
		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.`name` LIKE '" . $this->db->escape((string) $data['filter_name'] . '%') . "'";
		}
		if (!empty($data['filter_model'])) {
			$sql .= " AND p.`model` LIKE '" . $this->db->escape((string) $data['filter_model'] . '%') . "'";
		}
		if (!empty($data['filter_price'])) {
			$sql .= " AND p.`price` LIKE '" . $this->db->escape((string) $data['filter_price'] . '%') . "'";
		}
		if (isset($data['filter_quantity']) && $data['filter_quantity'] !== '') {
			$sql .= " AND p.`quantity` = '" . (int) $data['filter_quantity'] . "'";
		}
		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND p.`status` = '" . (int) $data['filter_status'] . "'";
		}
		if (isset($data['filter_category']) && $data['filter_category'] !== '') {
			$sql .= " AND p2c.`category_id` = '" . (int) $data['filter_category'] . "'";
		}

		// Group by product_id to avoid duplicate rows
		$sql .= " GROUP BY p.`product_id`";

		// Sorting options
		$sort_data = ['pd.name', 'p.model', 'p.price', 'p.quantity', 'p.status', 'p.sort_order'];
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY pd.`name`";
		}

		$sql .= (isset($data['order']) && $data['order'] == 'DESC') ? " DESC" : " ASC";

		// Pagination
		if (isset($data['start']) || isset($data['limit'])) {
			$data['start'] = max(0, (int) $data['start']);
			$data['limit'] = max(1, (int) $data['limit']);

			$sql .= " LIMIT " . $data['start'] . "," . $data['limit'];
		}

		// Execute the query
		$query = $this->db->query($sql);
		return $query->rows;
	}



	public function getDescriptions(int $product_id): array
	{
		$product_description_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_description` WHERE `product_id` = '" . (int) $product_id . "'");

		foreach ($query->rows as $result) {
			$product_description_data[$result['language_id']] = [
				'name' => $result['name'],
				'description' => $result['description'],
				'meta_title' => $result['meta_title'],
				'meta_description' => $result['meta_description'],
				'meta_keyword' => $result['meta_keyword'],
				'tag' => $result['tag']
			];
		}

		return $product_description_data;
	}

	public function getCategories(int $product_id): array
	{
		$product_category_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_to_category` WHERE `product_id` = '" . (int) $product_id . "'");

		foreach ($query->rows as $result) {
			$product_category_data[] = $result['category_id'];
		}

		return $product_category_data;
	}

	public function getFilters(int $product_id): array
	{
		$product_filter_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_filter` WHERE `product_id` = '" . (int) $product_id . "'");

		foreach ($query->rows as $result) {
			$product_filter_data[] = $result['filter_id'];
		}

		return $product_filter_data;
	}

	public function getAttributes(int $product_id): array
	{
		$this->load->model('catalog/attribute');
		$product_attribute_data = [];
		$product_attribute_datav = [];
		$product_attribute_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_attribute` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `sort_order` ASC ");
		foreach ($product_attribute_query->rows as $row) {
			$product_attribute_data[$row['attribute_id']][] = $row;
		}

		foreach ($product_attribute_data as $attribute_id => $values) {
			$attribute_info = $this->model_catalog_attribute->getAttribute($attribute_id);
			$product_attribute_description = [];

			foreach ($values as $index => $value) {
				$product_attribute_description[$value['sort_order']][$value['language_id']] = [
					'text' => $value['text'],
					'value_text' => $value['value_text'],
					'sort_order' => $value['sort_order'],
				];

			}
			$product_attribute_datav[] = [
				'attribute_id' => $attribute_id,
				'name' => $attribute_info['name'],
				'product_attribute_description' => $product_attribute_description

			];

		}

		return $product_attribute_datav;
	}


	public function getOptions(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_options` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `sort_order` ASC");

		return $query->rows;
	}


	public function getOptionsLegacy(int $product_id): array
	{
		$product_option_data = [];

		$product_option_query = $this->db->query("
		SELECT 
			po.*, 
			o.*, 
			o3.name AS group_name, 
			og.type AS group_type,
			o2.name AS o2_name,
			o2.*  -- Include other columns from o2 as needed
		FROM 
			`" . DB_PREFIX . "product_options` po
		LEFT JOIN 
			`" . DB_PREFIX . "options` o ON po.option_id = o.option_id
		LEFT JOIN 
			`" . DB_PREFIX . "options` og ON o.group_id = og.option_id
		LEFT JOIN 
			`" . DB_PREFIX . "options` o2 ON 
				o2.option_n = o.option_n
			AND o2.group_id = o.group_id
			AND o2.language_id = '" . (int) $this->config->get('config_language_id') . "'
		LEFT JOIN 
			`" . DB_PREFIX . "options` o3 ON 
				o3.option_n = '-1'
			AND o3.group_id = o.group_id 
			AND o3.language_id = '" . (int) $this->config->get('config_language_id') . "'
		WHERE 
			po.product_id = '" . (int) $product_id . "'
		GROUP BY 
			po.option_id
		ORDER BY 
			po.sort_order
	");



		foreach ($product_option_query->rows as $product_option) {

			$product_option_value_data[$product_option['group_id']][$product_option['product_option_id']] = [
				'product_option_value_id' => $product_option['product_option_id'],
				'option_value_id' => $product_option['product_option_id'],
				'name' => $product_option['name'],
				'image' => '',
				'quantity' => $product_option['quantity'],
				'subtract' => $product_option['subtract'],
				'price' => $product_option['price'],
				'price_prefix' => $product_option['price_prefix'],
				'weight' => $product_option['weight'],
				'weight_prefix' => $product_option['weight_prefix']
			];


			$product_option_data[$product_option['group_id']] = [
				'product_option_id' => $product_option['product_option_id'],
				'product_option_value' => $product_option_value_data[$product_option['group_id']],
				'option_id' => $product_option['product_option_id'],
				'name' => $product_option['group_name'],
				'type' => $product_option['group_type'],
				'value' => $product_option['value'],
				'required' => $product_option['required']
			];
		}

		$option_data = [];
		foreach ($product_option_data as $product_option) {


			if ($product_option) {
				if ($product_option['type'] != "checkbox" && $product_option['type'] != "radio" && $product_option['type'] != "select")
					continue;
				$product_option_value_data = [];

				foreach ($product_option['product_option_value'] as $product_option_value) {

					$product_option_value_data[] = [
						'product_option_value_id' => $product_option_value['product_option_value_id'],
						'option_value_id' => $product_option_value['option_value_id'],
						'name' => $product_option_value['name'],
						'price' => (float) $product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
						'price_prefix' => $product_option_value['price_prefix']
					];

				}

				$option_data[] = [
					'product_option_id' => $product_option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id' => $product_option['option_id'],
					'name' => $product_option['name'],
					'type' => $product_option['type'],
					'value' => $product_option['value'],
					'required' => $product_option['required']
				];
			}
		}
		return $option_data;
	}

	public function getImages(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_image` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `sort_order` ASC");
		$queryProductImage = $this->db->query("SELECT image FROM `" . DB_PREFIX . "product` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `sort_order` ASC");

		array_unshift($query->rows, [
			'image' => $queryProductImage->row['image'],
			'sort_order' => 0,
			'product_id' => $product_id,
		]);

		return $query->rows;
	}

	public function getDiscounts(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_discount` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `quantity`, `priority`, `price`");

		return $query->rows;
	}

	public function getSpecials(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_special` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `priority`, `price`");

		return $query->rows;
	}

	public function getRewards(int $product_id): array
	{
		$product_reward_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_reward` WHERE `product_id` = '" . (int) $product_id . "'");

		foreach ($query->rows as $result) {
			$product_reward_data[$result['customer_group_id']] = ['points' => $result['points']];
		}

		return $product_reward_data;
	}

	public function getDownloads(int $product_id): array
	{
		$product_download_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_to_download` WHERE `product_id` = '" . (int) $product_id . "'");

		foreach ($query->rows as $result) {
			$product_download_data[] = $result['download_id'];
		}

		return $product_download_data;
	}



	private function convertToSeoFriendly($text)
	{
		// Transliterate non-Latin characters
		$text = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $text);

		// Convert to lowercase
		$text = strtolower($text);

		// Remove special characters and replace spaces with dashes
		$text = preg_replace('/[^a-z0-9]+/', '-', $text);

		// Remove leading and trailing dashes
		$text = trim($text, '-');

		return $text;
	}

	public function getSeoUrls(int $product_id): array
	{
		$product_seo_url_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'product_id' AND `value` = '" . (int) $product_id . "'");

		foreach ($query->rows as $result) {
			$product_seo_url_data[$result['language_id']] = $result['keyword'];
		}

		return $product_seo_url_data;
	}



	public function getRelated(int $product_id): array
	{
		$product_related_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . (int) $product_id . "'");

		foreach ($query->rows as $result) {
			$product_related_data[] = $result['related_id'];
		}

		return $product_related_data;
	}

	public function getSubscriptions(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_subscription` WHERE `product_id` = '" . (int) $product_id . "'");

		return $query->rows;
	}

	public function getTotalProducts(array $data = []): int
	{
		$sql = "SELECT COUNT(DISTINCT p.`product_id`) AS `total` 
				FROM `" . DB_PREFIX . "product` p 
				LEFT JOIN `" . DB_PREFIX . "product_description` pd 
					ON (p.`product_id` = pd.`product_id`) 
				LEFT JOIN `" . DB_PREFIX . "product_to_category` p2c 
					ON (p.`product_id` = p2c.`product_id`) 
				WHERE pd.`language_id` = '" . (int) $this->config->get('config_language_id') . "'";

		// Check if a category filter is provided
		if (isset($data['filter_category']) && $data['filter_category'] !== '') {
			$sql .= " AND p2c.`category_id` = '" . (int) $data['filter_category'] . "'";
		}

		// Check if the filter_name is provided
		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.`name` LIKE '" . $this->db->escape((string) $data['filter_name'] . '%') . "'";
		}

		// Check if the filter_model is provided
		if (!empty($data['filter_model'])) {
			$sql .= " AND p.`model` LIKE '" . $this->db->escape((string) $data['filter_model'] . '%') . "'";
		}

		// Check if the filter_price is provided
		if (isset($data['filter_price']) && $data['filter_price'] !== '') {
			$sql .= " AND p.`price` LIKE '" . $this->db->escape((string) $data['filter_price'] . '%') . "'";
		}

		// Check if the filter_quantity is provided
		if (isset($data['filter_quantity']) && $data['filter_quantity'] !== '') {
			$sql .= " AND p.`quantity` = '" . (int) $data['filter_quantity'] . "'";
		}

		// Check if the filter_status is provided
		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND p.`status` = '" . (int) $data['filter_status'] . "'";
		}

		// Execute the query and return the total count
		$query = $this->db->query($sql);

		return (int) $query->row['total'];
	}

	public function getTotalProductsByTaxClassId(int $tax_class_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product` WHERE `tax_class_id` = '" . (int) $tax_class_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByStockStatusId(int $stock_status_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product` WHERE `stock_status_id` = '" . (int) $stock_status_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByWeightClassId(int $weight_class_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product` WHERE `weight_class_id` = '" . (int) $weight_class_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByLengthClassId(int $length_class_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product` WHERE `length_class_id` = '" . (int) $length_class_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByDownloadId(int $download_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product_to_download` WHERE `download_id` = '" . (int) $download_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByManufacturerId(int $manufacturer_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product` WHERE `manufacturer_id` = '" . (int) $manufacturer_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByAttributeId(int $attribute_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product_attribute` WHERE `attribute_id` = '" . (int) $attribute_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsBySubscriptionPlanId(int $subscription_plan_id): int
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT `product_id`) AS `total` FROM `" . DB_PREFIX . "product_subscription` WHERE `subscription_plan_id` = '" . (int) $subscription_plan_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByLayoutId(int $layout_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product_to_layout` WHERE `layout_id` = '" . (int) $layout_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByOptionId(int $option_id): int
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT `product_id`) AS `total` FROM `" . DB_PREFIX . "product_option` WHERE `option_id` = '" . (int) $option_id . "'");

		return (int) $query->row['total'];
	}

	public function getTotalProductsByOptionValueId(int $option_value_id): int
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT `product_id`) AS `total` FROM `" . DB_PREFIX . "product_option_value` WHERE `option_value_id` = '" . (int) $option_value_id . "'");

		return (int) $query->row['total'];
	}

	public function getReports(int $product_id, int $start = 0, int $limit = 10): array
	{
		if ($start < 0) {
			$start = 0;
		}

		if ($limit < 1) {
			$limit = 10;
		}

		$query = $this->db->query("SELECT `ip`,   `country`, `date_added` FROM `" . DB_PREFIX . "product_report` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `date_added` ASC LIMIT " . (int) $start . "," . (int) $limit);

		return $query->rows;
	}

	public function getTotalReports(int $product_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product_report` WHERE `product_id` = '" . (int) $product_id . "'");

		return (int) $query->row['total'];
	}

	public function validateFreeSku(string $sku, $product_id = null)
	{
		// Check if SKU is used by another product
		$productQuery = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product` WHERE sku = '" . $this->db->escape($sku) . "'");

		if ($productQuery->num_rows > 0) {
			// SKU is used by another product
			if ($product_id !== null) {
				// Check if the SKU is used by another product (excluding the provided product_id)
				$usedByProduct = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product` WHERE sku = '" . $this->db->escape($sku) . "' AND product_id != '" . (int) $product_id . "'");

				// If SKU is used by another product, return false
				if ($usedByProduct->num_rows > 0) {
					return false;
				}
			} else {
				// SKU is used by another product
				return false;
			}
		}

		// Continue checking in the variations table
		$variationQuery = $this->db->query("SELECT * FROM `" . DB_PREFIX . "variations` WHERE sku = '" . $this->db->escape($sku) . "'");

		// If SKU is used by a variation and the provided product_id matches, return true
		if ($variationQuery->num_rows > 0 && $product_id !== null) {
			$variationProductId = $this->getVariationProductId($variationQuery->row['variation_id']);
			if ($variationProductId == $product_id) {
				return true;
			}
		}

		// SKU is not used by any products or used by the same product ID, return true
		return true;
	}
	protected function getVariationProductId(int $variation_id)
	{
		$query = $this->db->query("SELECT product_id FROM `" . DB_PREFIX . "variations` WHERE variation_id = '" . (int) $variation_id . "'");
		return ($query->num_rows > 0) ? (int) $query->row['product_id'] : 0;
	}

}
