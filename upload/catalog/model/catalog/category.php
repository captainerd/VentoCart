<?php
namespace Ventocart\Catalog\Model\Catalog;
/**
 * Class Category
 *
 * @package Ventocart\Catalog\Model\Catalog
 */
class Category extends \Ventocart\System\Engine\Model
{
	/**
	 * @param int $category_id
	 *
	 * @return array
	 */
	public function getCategory(int $category_id): array
	{
		$query = $this->db->query("SELECT DISTINCT * 
		FROM `" . DB_PREFIX . "category` `c` 
		LEFT JOIN `" . DB_PREFIX . "category_description` `cd` ON (`c`.`category_id` = `cd`.`category_id`) 
		WHERE `c`.`category_id` = '" . (int) $category_id . "' 
		AND `cd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'  
		AND `c`.`status` = '1'");


		$pattern = '/\[link=(.*?)\]/';
		$query->row['redirect_url'] = '';
		if ($query->num_rows > 0) {
			if (preg_match($pattern, $query->row['meta_title'], $matches)) {
				$query->row['redirect_url'] = $matches[1];
				$query->row['meta_title'] = '';
			}
			return $query->row;
		} else {
			return [];
		}
	}

	/**
	 * @param int $parent_id
	 *
	 * @return array
	 */
	public function getCategories(int $parent_id = 0): array
	{
		$query = $this->db->query("SELECT * 
		FROM `" . DB_PREFIX . "category` `c` 
		LEFT JOIN `" . DB_PREFIX . "category_description` `cd` ON (`c`.`category_id` = `cd`.`category_id`) 
		WHERE `c`.`parent_id` = '" . (int) $parent_id . "' 
		AND `cd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'  
		AND `c`.`status` = '1' 
		ORDER BY `c`.`sort_order`, LCASE(`cd`.`name`)");

		$categories = [];
		foreach ($query->rows as $row) {
			$pattern = '/\[link=(.*?)\]/';
			$row['redirect_url'] = '';
			if (preg_match($pattern, $row['meta_title'], $matches)) {
				$row['redirect_url'] = $matches[1];
				$row['meta_title'] = '';

			} else {
				$row['redirect_url'] = '';
			}
			$categories[] = $row;

		}

		return $categories;
	}

	/**
	 * @param int $category_id
	 *
	 * @return array
	 */
	public function getFilters(int $category_id): array
	{
		$implode = [];

		$query = $this->db->query("SELECT `filter_id` FROM `" . DB_PREFIX . "category_filter` WHERE `category_id` = '" . (int) $category_id . "'");

		foreach ($query->rows as $result) {
			$implode[] = (int) $result['filter_id'];
		}

		$filter_group_data = [];

		if ($implode) {
			$filter_group_query = $this->db->query("SELECT DISTINCT `f`.`filter_group_id`, `fgd`.`name`, `fg`.`sort_order` FROM `" . DB_PREFIX . "filter` `f` LEFT JOIN `" . DB_PREFIX . "filter_group` `fg` ON (`f`.`filter_group_id` = `fg`.`filter_group_id`) LEFT JOIN `" . DB_PREFIX . "filter_group_description` `fgd` ON (`fg`.`filter_group_id` = `fgd`.`filter_group_id`) WHERE `f`.`filter_id` IN (" . implode(',', $implode) . ") AND `fgd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "' GROUP BY `f`.`filter_group_id` ORDER BY `fg`.`sort_order`, LCASE(`fgd`.`name`)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = [];

				$filter_query = $this->db->query("SELECT DISTINCT `f`.`filter_id`, `fd`.`name` FROM `" . DB_PREFIX . "filter` `f` LEFT JOIN `" . DB_PREFIX . "filter_description` `fd` ON (`f`.`filter_id` = `fd`.`filter_id`) WHERE `f`.`filter_id` IN (" . implode(',', $implode) . ") AND `f`.`filter_group_id` = '" . (int) $filter_group['filter_group_id'] . "' AND `fd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "' ORDER BY `f`.`sort_order`, LCASE(`fd`.`name`)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = [
						'filter_id' => $filter['filter_id'],
						'name' => $filter['name']
					];
				}

				if ($filter_data) {
					$filter_group_data[] = [
						'filter_group_id' => $filter_group['filter_group_id'],
						'name' => $filter_group['name'],
						'filter' => $filter_data
					];
				}
			}
		}

		return $filter_group_data;
	}

	public function getOptionFilters(int $category_id): array
	{
		$query = $this->db->query("
			SELECT `filter_id` 
			FROM `" . DB_PREFIX . "category_filter` 
			WHERE `category_id` = '" . (int) $category_id . "' 
			AND `type` = 'option'
		");

		$filter_options = [];
		foreach ($query->rows as $row) {
			$queryOpt = $this->db->query("
				SELECT 
					o.*, 
					COALESCE(COUNT(CASE WHEN p.status = 1 THEN po.product_id ELSE NULL END), 0) AS product_count 
				FROM 
					`" . DB_PREFIX . "options` o 
				LEFT JOIN 
					`" . DB_PREFIX . "product_options` po 
					ON (o.option_id = po.option_id OR o.group_id = po.option_id) 
				LEFT JOIN 
					`" . DB_PREFIX . "product` p 
					ON po.product_id = p.product_id
				LEFT JOIN 
					`" . DB_PREFIX . "product_to_category` pc 
					ON p.product_id = pc.product_id 
				WHERE 
					o.group_id = '" . (int) $row['filter_id'] . "' 
					AND (o.type = 'checkbox' OR o.type = 'radio' OR o.type = 'select') 
					AND o.language_id = '" . (int) $this->config->get('config_language_id') . "' 
					AND pc.category_id = '" . (int) $category_id . "' 
				GROUP BY 
					o.option_id 
				ORDER BY 
					o.option_n ASC
			");
			// Get option name
			if (!empty($queryOpt->rows)) {
				$group_id = $queryOpt->rows[0]['group_id'];
				$secondQuery = $this->db->query("
			SELECT * 
			FROM `" . DB_PREFIX . "options` 
			WHERE option_id = '" . (int) $group_id . "'
		");

				array_unshift($queryOpt->rows, $secondQuery->row);
				$filter_options[] = $queryOpt->rows;
			}
		}

		return $filter_options;
	}

	public function getManufacturerFilters(int $category_id): array
	{


		$query = $this->db->query("
		SELECT 
			mf.*, 
			cf.*, 
			(SELECT COUNT(*) FROM `" . DB_PREFIX . "product` p WHERE p.manufacturer_id = mf.manufacturer_id AND p.status=1) AS product_count 
		FROM 
			`" . DB_PREFIX . "category_filter` cf 
		LEFT JOIN 
			`" . DB_PREFIX . "manufacturer` mf ON cf.filter_id = mf.manufacturer_id 
		WHERE 
			cf.`category_id` = '" . (int) $category_id . "' 
			AND cf.`type` = 'manufacturer'");

		return $query->rows;
	}

	public function getAttributeFilters(int $category_id): array
	{


		$query = $this->db->query("
		SELECT 
			ad.name, 
			ad.attribute_id, 
			pa.text, 
			pa.value_text 
		FROM 
			`" . DB_PREFIX . "category_filter` cf
		LEFT JOIN 
			`" . DB_PREFIX . "attribute_description` ad ON cf.filter_id = ad.attribute_id
			AND ad.language_id = '" . (int) $this->config->get('config_language_id') . "'
		LEFT JOIN 
			`" . DB_PREFIX . "product_attribute` pa ON ad.attribute_id = pa.attribute_id
			AND pa.language_id = '" . (int) $this->config->get('config_language_id') . "'
		LEFT JOIN
			`" . DB_PREFIX . "product` p ON pa.product_id = p.product_id
		WHERE 
			cf.`category_id` = '" . (int) $category_id . "' 
			AND cf.`type` = 'attribute'
			AND p.status = 1 ORDER BY pa.sort_order ASC
	");


		$attribute_values = [];

		// Collect attribute values
		foreach ($query->rows as $row2) {
			if (!empty($row2['text']) && empty($row2['value_text'])) {
				$attribute_values[$row2['attribute_id']]['values'][$row2['text']]['name'] = $row2['text'];

				if (!isset($attribute_values[$row2['attribute_id']]['values'][$row2['text']]['product_count'])) {
					$attribute_values[$row2['attribute_id']]['values'][$row2['text']]['product_count'] = 0;
				}
				$attribute_values[$row2['attribute_id']]['values'][$row2['text']]['product_count']++;
				$attribute_values[$row2['attribute_id']]['attribute_id'] = $row2['attribute_id'];
				$attribute_values[$row2['attribute_id']]['name'] = $row2['name'];
				$attribute_values[$row2['attribute_id']]['pos'] = 1;

			}
			if (!empty($row2['text']) && !empty($row2['value_text'])) {
				$attribute_values[$row2['attribute_id'] . $row2['text']]['values'][$row2['value_text']]['name'] = $row2['value_text'];
				if (!isset($attribute_values[$row2['attribute_id'] . $row2['text']]['values'][$row2['value_text']]['product_count'])) {
					$attribute_values[$row2['attribute_id'] . $row2['text']]['values'][$row2['value_text']]['product_count'] = 0;
				}
				$attribute_values[$row2['attribute_id'] . $row2['text']]['values'][$row2['value_text']]['product_count']++;
				$attribute_values[$row2['attribute_id'] . $row2['text']]['attribute_id'] = $row2['attribute_id'];
				$attribute_values[$row2['attribute_id'] . $row2['text']]['name'] = $row2['name'] . " " . $row2['text'];
				$attribute_values[$row2['attribute_id'] . $row2['text']]['pos'] = 2;

			}

		}

		return $attribute_values;
	}

	/**
	 * @param int $category_id
	 *
	 * @return int
	 */
	public function getLayoutId(int $category_id): int
	{

		return 0;

	}
}
