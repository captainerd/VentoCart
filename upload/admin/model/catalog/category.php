<?php
namespace Ventocart\Admin\Model\Catalog;

class Category extends \Ventocart\System\Engine\Model
{
	public function addCategory(array $data): int
	{

		if (isset($data['redirect_url']) && $data['redirect_url'] != "") {
			foreach ($data['category_description'] as $language_id => $value) {
				$data['category_description'][$language_id]['meta_title'] = '[link=' . $data['redirect_url'] . ']';
			}

		}
		// Get the new path after the update


		$this->db->query("INSERT INTO `" . DB_PREFIX . "category` SET `parent_id` = '" . (int) $data['parent_id'] . "', `top` = '" . (isset($data['top']) ? (int) $data['top'] : 0) . "', `column` = '" . (int) $data['column'] . "', `sort_order` = '" . (int) $data['sort_order'] . "', `status` = '" . (bool) (isset($data['status']) ? $data['status'] : 0) . "', `date_modified` = NOW(), `date_added` = NOW()");

		$category_id = $this->db->getLastId();




		$parent_path = $this->getCategoryPath($data['parent_id']);
		if ($data['parent_id'] == 0) {
			$path_new = $category_id; // skip because we dont have parent
		} else {
			$path_new = $parent_path . "_" . $category_id;
		}


		// Update the category with the new path
		$this->db->query("
			 UPDATE `" . DB_PREFIX . "category` 
			 SET 
				 `path` = '" . $this->db->escape($path_new) . "' 
			 WHERE `category_id` = '" . (int) $category_id . "'
		 ");


		if (isset($data['image'])) {
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `image` = '" . $this->db->escape((string) $data['image']) . "' WHERE `category_id` = '" . (int) $category_id . "'");
		}

		foreach ($data['category_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "category_description` SET `category_id` = '" . (int) $category_id . "', `language_id` = '" . (int) $language_id . "', `name` = '" . $this->db->escape($value['name']) . "', `description` = '" . $this->db->escape($value['description']) . "', `meta_title` = '" . $this->db->escape($value['meta_title']) . "', `meta_description` = '" . $this->db->escape($value['meta_description']) . "', `meta_keyword` = '" . $this->db->escape($value['meta_keyword']) . "'");
		}


		if (isset($data['category_filter'])) {
			foreach ($data['category_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'filter'");
			}
		}

		if (isset($data['category_option_filter'])) {
			foreach ($data['category_option_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'option' ");
			}
		}

		if (isset($data['category_attribute_filter'])) {
			foreach ($data['category_attribute_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'attribute' ");
			}
		}

		if (isset($data['category_manufacturer_filter'])) {
			foreach ($data['category_manufacturer_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'manufacturer' ");
			}
		}



		$this->load->model('design/seo_url');

		foreach ($data['category_seo_url'] as $language_id => $keyword) {

			$seo_url_info = $this->model_design_seo_url->getSeoUrlByKeyValue('path', $parent_path, $language_id);

			if ($seo_url_info) {
				$keyword = $seo_url_info['keyword'] . '/' . $keyword;
			}

			$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET   `language_id` = '" . (int) $language_id . "', `key` = 'path', `value`= '" . $this->db->escape($path_new) . "', `keyword` = '" . $this->db->escape($this->convertToSeoFriendly($keyword)) . "'");

		}



		return $category_id;
	}
	public function updateSort($category_id, $newsort)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `sort_order` = '" . (int) $newsort . "' WHERE `category_id` = '" . (int) $category_id . "'");
	}
	public function editCategory(int $category_id, array $data): void
	{


		if (isset($data['redirect_url']) && $data['redirect_url'] != "") {
			foreach ($data['category_description'] as $language_id => $value) {
				$data['category_description'][$language_id]['meta_title'] = '[link=' . $data['redirect_url'] . ']';
			}

		}
		$path_old = $this->getCategoryPath($category_id);

		$path_new = $this->getCategoryPath($data['parent_id']) . "_" . $category_id;
		if ($data['parent_id'] == 0) {
			$path_new = $category_id; // skip because we dont have parent
		}

		$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `parent_id` = '" . (int) $data['parent_id'] . "', `top` = '" . (isset($data['top']) ? (int) $data['top'] : 0) . "', `column` = '" . (int) $data['column'] . "', `sort_order` = '" . (int) $data['sort_order'] . "', `status` = '" . (bool) (isset($data['status']) ? $data['status'] : 0) . "', `date_modified` = NOW() WHERE `category_id` = '" . (int) $category_id . "'");

		// Get the new path after the update


		// Update the category with the new path
		$this->db->query("
			 UPDATE `" . DB_PREFIX . "category` 
			 SET 
				 `path` = '" . $this->db->escape($path_new) . "' 
			 WHERE `category_id` = '" . (int) $category_id . "'
		 ");

		if (isset($data['image'])) {
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `image` = '" . $this->db->escape((string) $data['image']) . "' WHERE `category_id` = '" . (int) $category_id . "'");
		}

		$this->db->query("DELETE FROM `" . DB_PREFIX . "category_description` WHERE `category_id` = '" . (int) $category_id . "'");

		foreach ($data['category_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "category_description` SET `category_id` = '" . (int) $category_id . "', `language_id` = '" . (int) $language_id . "', `name` = '" . $this->db->escape($value['name']) . "', `description` = '" . $this->db->escape($value['description']) . "', `meta_title` = '" . $this->db->escape($value['meta_title']) . "', `meta_description` = '" . $this->db->escape($value['meta_description']) . "', `meta_keyword` = '" . $this->db->escape($value['meta_keyword']) . "'");
		}



		$this->db->query("DELETE FROM `" . DB_PREFIX . "category_filter` WHERE `category_id` = '" . (int) $category_id . "'");

		if (isset($data['category_filter'])) {
			foreach ($data['category_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'filter' ");
			}
		}
		if (isset($data['category_option_filter'])) {
			foreach ($data['category_option_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'option' ");
			}
		}

		if (isset($data['category_attribute_filter'])) {
			foreach ($data['category_attribute_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'attribute' ");
			}
		}

		if (isset($data['category_manufacturer_filter'])) {
			foreach ($data['category_manufacturer_filter'] as $filter_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_filter` SET `category_id` = '" . (int) $category_id . "', `filter_id` = '" . (int) $filter_id . "', `type` = 'manufacturer' ");
			}
		}





		// Delete the old path

		$this->load->model('design/seo_url');
		$path_parent = $this->getCategoryPath($data['parent_id']);

		if ($data['parent_id'] == 0) {
			$path_parent = $category_id;
		}


		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'path' AND `value` = '" . $path_old . "'");

		foreach ($data['category_seo_url'] as $language_id => $keyword) {

			$parent_info = $this->model_design_seo_url->getSeoUrlByKeyValue('path', $path_parent, $language_id);

			if ($parent_info) {
				$keyword = $parent_info['keyword'] . '/' . $keyword;
			}


			// Generate the SQL query
			$sql = "
				INSERT INTO `" . DB_PREFIX . "seo_url` ( `language_id`, `key`, `value`, `keyword`) 
				VALUES (
			  
					'" . (int) $language_id . "', 
					'path', 
					'" . $this->db->escape($path_new) . "', 
					'" . $this->db->escape($keyword) . "'
				)
				ON DUPLICATE KEY UPDATE 
					`value` = '" . $this->db->escape($path_new) . "', 
					`keyword` = '" . $this->db->escape($keyword) . "';  
			";
			$this->db->query($sql);
			// update all of its children urls with the new /parent/children
			$this->updateSeoChildren($category_id, $keyword, $language_id);

		}


	}
	public function updateSeoChildren(int $category_id, string $category_path, int $language_id)
	{
		// Get all child categories where parent_id = $category_id
		$query = $this->db->query("
			SELECT `category_id` 
			FROM `" . DB_PREFIX . "category` 
			WHERE `parent_id` = '" . (int) $category_id . "'
		");

		// Loop through each child category
		foreach ($query->rows as $row) {
			$child_category_id = $row['category_id'];

			// Step 1: Get the old path and its keyword for the child
			$child_query = $this->db->query("
				SELECT c.`path`, su.`keyword`
				FROM `" . DB_PREFIX . "category` c
				LEFT JOIN `" . DB_PREFIX . "seo_url` su 
					ON su.`value` = c.`path` 
					AND su.`language_id` = '" . (int) $language_id . "' 
				WHERE c.`category_id` = '" . (int) $child_category_id . "'
				AND su.`key` = 'path'
			");

			if (!$child_query->num_rows) {
				continue; // Skip if no path or keyword is found for the child
			}

			$my_old_path = $child_query->row['path'];
			$my_keyword = $child_query->row['keyword'];

			// Extract the last part of the keyword as 'me' its the last name of path ffparnet/fparent/parent/me <- me.
			$exploded_path = explode('/', $my_keyword);
			$me = end($exploded_path);

			// Step 3: Build the new SEO path for the child (all the /parents/full/path plus /me)
			$new_path = $category_path . '/' . $me;

			// Step 4: Update the child's path in the SEO URL table
			$this->db->query("
				UPDATE `" . DB_PREFIX . "seo_url` 
				SET `keyword` = '" . $this->db->escape($new_path) . "' 
				WHERE `value` = '" . $this->db->escape($my_old_path) . "' 
				AND `key` = 'path'
				AND `language_id` = '" . (int) $language_id . "' 
 
			");

			// Recursive call to update the child's children
			$this->updateSeoChildren($child_category_id, $new_path, $language_id);
		}
	}


	public function deleteCategory(int $category_id): void
	{
		$query = $this->db->query("
		SELECT * 
		FROM `" . DB_PREFIX . "category` 
		WHERE `path` LIKE  '%" . (int) $category_id . "_%'
	");

		foreach ($query->rows as $result) {
			$this->deleteCategory($result['category_id']);
		}
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'path' AND `value` = '" . $this->getCategoryPath($category_id) . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "category` WHERE `category_id` = '" . (int) $category_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "category_description` WHERE `category_id` = '" . (int) $category_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "category_filter` WHERE `category_id` = '" . (int) $category_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_category` WHERE `category_id` = '" . (int) $category_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "coupon_category` WHERE `category_id` = '" . (int) $category_id . "'");




	}


	public function getCategory(int $category_id): array
	{
		$query = $this->db->query("
		SELECT 
			c.*, 
			cd2.*, 
			cd_parent.`name` AS `path` 
		FROM `" . DB_PREFIX . "category` c
		LEFT JOIN `" . DB_PREFIX . "category_description` cd2 
			ON c.`category_id` = cd2.`category_id`
		LEFT JOIN `" . DB_PREFIX . "category_description` cd_parent 
			ON c.`parent_id` = cd_parent.`category_id` 
			AND cd_parent.`language_id` = '" . (int) $this->config->get('config_language_id') . "'
		WHERE c.`category_id` = '" . (int) $category_id . "'
		AND cd2.`language_id` = '" . (int) $this->config->get('config_language_id') . "'
	");
		$pattern = '/\[link=(.*?)\]/';
		$query->row['redirect_url'] = '';
		if (preg_match($pattern, $query->row['meta_title'], $matches)) {
			$query->row['redirect_url'] = $matches[1];
			$query->row['meta_title'] = '';
		}

		return $query->row;
	}



	public function getCategories(array $data = []): array
	{
		// Base SQL query to select categories with their descriptions
		$sql = "
		SELECT 
			c.*, 
			cd.`name` 
		FROM `" . DB_PREFIX . "category` c
		LEFT JOIN `" . DB_PREFIX . "category_description` cd 
			ON c.`category_id` = cd.`category_id`
		WHERE cd.`language_id` = '" . (int) $this->config->get('config_language_id') . "'
		";

		// Apply filter for category name if provided in $data
		if (!empty($data['filter_name'])) {
			$sql .= " AND cd.`name` LIKE '" . $this->db->escape((string) $data['filter_name']) . "%'"; // Adding "%" for LIKE matching
		}

		// Apply filter for category id if provided in $data
		if (!empty($data['filter_category_id'])) {
			$sql .= " AND c.`category_id` = '" . (int) $data['filter_category_id'] . "'";
		}

		// Apply filter for parent id if provided in $data
		if (!empty($data['filter_parent_id'])) {
			$sql .= " AND c.`parent_id` = '" . (int) $data['filter_parent_id'] . "'";
		}

		// Apply filter for status if provided in $data
		if (isset($data['filter_status'])) {
			$sql .= " AND c.`status` = '" . (int) $data['filter_status'] . "'";
		}

		// Group categories by category_id to avoid duplicates
		$sql .= " GROUP BY c.`category_id`";

		// Sorting logic
		$sort_data = [
			'name',
			'sort_order',
			'category_id' // Add category_id for sorting if needed
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY `" . $data['sort'] . "`";
		} else {
			$sql .= " ORDER BY `sort_order`"; // Default sort
		}

		// Order direction (ASC or DESC)
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		// Pagination logic (if start or limit are provided)
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20; // Default limit
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		// Execute query and return results
		$query = $this->db->query($sql);

		return $query->rows;
	}


	public function getDescriptions(int $category_id): array
	{
		$category_description_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "category_description` WHERE `category_id` = '" . (int) $category_id . "'");

		foreach ($query->rows as &$result) {
			$pattern = '/\[link=(.*?)\]/';

			$redirect = '';
			if (preg_match($pattern, $result['meta_title'], $matches)) {
				$redirect = $matches[1];
				$result['meta_title'] = '';
			}

			$category_description_data[$result['language_id']] = [
				'name' => $result['name'],
				'meta_title' => $result['meta_title'],
				'meta_description' => $result['meta_description'],
				'meta_keyword' => $result['meta_keyword'],
				'description' => $result['description'],
				'redirect_url' => $redirect
			];

		}

		return $category_description_data;
	}

	public function getFilters(int $category_id): array
	{
		$category_filter_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "category_filter` WHERE `category_id` = '" . (int) $category_id . "'");

		foreach ($query->rows as $result) {
			$category_filter_data[] = ['id' => $result['filter_id'], 'type' => $result['type']];
		}

		return $category_filter_data;
	}



	public function getSeoUrls(int $category_id): array
	{
		$category_seo_url_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'path' AND `value` = '" . $this->db->escape($this->getCategoryPath($category_id)) . "'");

		foreach ($query->rows as $result) {
			$category_seo_url_data[$result['language_id']] = $result['keyword'];
		}

		return $category_seo_url_data;
	}




	public function getTotalCategories(): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "category`");

		return (int) $query->row['total'];
	}



	private function convertToSeoFriendly($text)
	{
		// Transliterate non-Latin characters
		$text = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $text);

		// Convert to lowercase
		$text = strtolower($text);

		// Replace spaces with dashes, but preserve existing slashes
		$text = preg_replace('/[^a-z0-9\/]+/', '-', $text);

		// Remove leading and trailing dashes or slashes
		$text = trim($text, '-/');

		return $text;
	}

	public function getCategoryPerentPath($category_id)
	{
		$sql = $this->db->query("
			SELECT c2.path 
			FROM " . DB_PREFIX . "category c1
			LEFT JOIN " . DB_PREFIX . "category c2
			ON c1.parent_id = c2.category_id
			WHERE c1.category_id = '" . (int) $category_id . "'
		");

		if ($sql->num_rows) {

			return $sql->row['path'];
		} else {
			return $category_id;
		}
	}
	public function getCategoryPath($category_id)
	{
		$sql = $this->db->query("
			SELECT path
			FROM " . DB_PREFIX . "category 
			WHERE category_id = '" . (int) $category_id . "'
		");

		if ($sql->num_rows) {
			return $sql->row['path'];
		} else {
			return 0; // Return null if no path is found
		}
	}

}
