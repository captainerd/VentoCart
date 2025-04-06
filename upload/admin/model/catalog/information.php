<?php
namespace Ventocart\Admin\Model\Catalog;
class Information extends \Ventocart\System\Engine\Model
{
	public function addInformation(array $data): int
	{




		$this->db->query("INSERT INTO `" . DB_PREFIX . "information` SET `sort_order` = '" . (int) $data['sort_order'] . "', `bottom` = '" . (isset($data['bottom']) ? (int) $data['bottom'] : 0) . "', `status` = '" . (bool) (isset($data['status']) ? $data['status'] : 0) . "'");

		$information_id = $this->db->getLastId();

		$this->load->model('catalog/category');
		// Check if topmenu is enabled and handle category creation
		if (isset($data['topmenu']) && $data['topmenu'] == 1) {
			// Load Category model
			$this->load->model('catalog/category');

			// Prepare category data based on the information
			$category_data = [
				'parent_id' => (int) $data['parent_id'],
				'top' => 1,
				'column' => 1,
				'sort_order' => 0,
				'status' => 1,
				'redirect_url' => "information/information&information_id=$information_id",
				'category_description' => array_map(fn($desc) => ['description' => '', 'meta_description' => '', 'meta_keyword' => '', 'name' => $desc['title']] + $desc, $data['information_description']),
				'category_seo_url' => [],
			];

			// Add the category using the Category model
			$this->model_catalog_category->addCategory($category_data);
		}


		foreach ($data['information_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "information_description` SET `information_id` = '" . (int) $information_id . "', `language_id` = '" . (int) $language_id . "', `title` = '" . $this->db->escape($value['title']) . "', `description` = '" . $this->db->escape($value['description']) . "', `meta_title` = '" . $this->db->escape($value['meta_title']) . "', `meta_description` = '" . $this->db->escape($value['meta_description']) . "', `meta_keyword` = '" . $this->db->escape($value['meta_keyword']) . "'");
		}



		// SEO URL
		if (isset($data['information_seo_url'])) {
			foreach ($data['information_seo_url'] as $language_id => $keyword) {

				$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET   `language_id` = '" . (int) $language_id . "', `key` = 'information_id', `value` = '" . (int) $information_id . "', `keyword` = '" . $this->db->escape($keyword) . "'");

			}
		}

		$this->cache->delete('information');

		return $information_id;
	}

	public function editInformation(int $information_id, array $data): void
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "information` SET `sort_order` = '" . (int) $data['sort_order'] . "', `bottom` = '" . (isset($data['bottom']) ? (int) $data['bottom'] : 0) . "', `status` = '" . (bool) (isset($data['status']) ? $data['status'] : 0) . "' WHERE `information_id` = '" . (int) $information_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "information_description` WHERE `information_id` = '" . (int) $information_id . "'");

		foreach ($data['information_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "information_description` SET `information_id` = '" . (int) $information_id . "', `language_id` = '" . (int) $language_id . "', `title` = '" . $this->db->escape($value['title']) . "', `description` = '" . $this->db->escape($value['description']) . "', `meta_title` = '" . $this->db->escape($value['meta_title']) . "', `meta_description` = '" . $this->db->escape($value['meta_description']) . "', `meta_keyword` = '" . $this->db->escape($value['meta_keyword']) . "'");
		}


		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'information_id' AND `value` = '" . (int) $information_id . "'");

		if (isset($data['information_seo_url'])) {
			foreach ($data['information_seo_url'] as $language_id => $keyword) {

				$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET   `language_id` = '" . (int) $language_id . "', `key` = 'information_id', `value` = '" . (int) $information_id . "', `keyword` = '" . $this->db->escape($keyword) . "'");

			}
		}

		// Check if topmenu is enabled and handle category creation or deletion
		if (!empty($data['topmenu'])) {
			$this->load->model('catalog/category');

			// Build the pattern
			$redirect_url = "information/information&information_id=$information_id";
			$pattern = '[link=' . $redirect_url . ']';

			// Update existing redirect category name=title
			$descriptions = array_map(function ($desc) {
				return ['name' => $desc['title'], 'description' => '', 'meta_description' => '', 'meta_keyword' => ''];
			}, $data['information_description']);

			// Find category with that redirect
			$query = $this->db->query("SELECT category_id FROM `" . DB_PREFIX . "category_description` WHERE `meta_title` = '" . $this->db->escape($pattern) . "' LIMIT 1");

			if ($query->num_rows) {
				$category_id = $query->row['category_id'];

				if (isset($data['parent_id'])) {
					$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `parent_id` = '" . (int) $data['parent_id'] . "' WHERE `category_id` = '" . (int) $category_id . "'");
				}

				// Update its name/title
				foreach ($descriptions as $language_id => $desc) {
					$this->db->query("UPDATE `" . DB_PREFIX . "category_description` SET `name` = '" . $this->db->escape($desc['name']) . "' WHERE `category_id` = '" . (int) $category_id . "' AND `language_id` = '" . (int) $language_id . "'");
				}
			} else {
				// Doesn't exist, create it
				$category_data = [
					'parent_id' => (int) ($data['parent_id'] ?? 0),
					'top' => 1,
					'column' => 1,
					'sort_order' => 0,
					'status' => 1,
					'redirect_url' => $redirect_url,
					'category_description' => $descriptions,
					'category_seo_url' => [],
				];
				$this->model_catalog_category->addCategory($category_data);
			}
		} else {
			$pattern = '[link=information/information&information_id=' . $information_id . ']';

			// Find and delete matching category
			$query = $this->db->query("SELECT category_id FROM `" . DB_PREFIX . "category_description` WHERE `meta_title` = '" . $this->db->escape($pattern) . "'");

			foreach ($query->rows as $row) {
				$category_id = (int) $row['category_id'];
				$this->db->query("DELETE FROM `" . DB_PREFIX . "category_description` WHERE `category_id` = '$category_id'");
				$this->db->query("DELETE FROM `" . DB_PREFIX . "category` WHERE `category_id` = '$category_id'");
			}
		}


		$this->cache->delete('information');
	}

	public function deleteInformation(int $information_id): void
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "information` WHERE `information_id` = '" . (int) $information_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "information_description` WHERE `information_id` = '" . (int) $information_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'information_id' AND `value` = '" . (int) $information_id . "'");

		$this->cache->delete('information');
	}

	public function getInformation(int $information_id): array
	{
		$language_id = (int) $this->config->get('config_language_id');
		$redirect = 'information/information&information_id=' . (int) $information_id;
		$pattern = '[link=' . $redirect . ']';

		// Base query for the information
		$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "information` WHERE `information_id` = '" . (int) $information_id . "'");
		$info = $query->row ?? [];

		// Now, check if a category with that redirect exists
		$cat_query = $this->db->query("
		SELECT 
			c.category_id, 
			c.parent_id, 
			pcd.name AS parent_name
		FROM `" . DB_PREFIX . "category_description` cd
		LEFT JOIN `" . DB_PREFIX . "category` c ON c.category_id = cd.category_id
		LEFT JOIN `" . DB_PREFIX . "category_description` pcd ON pcd.category_id = c.parent_id AND pcd.language_id = '$language_id'
		WHERE cd.meta_title = '" . $this->db->escape($pattern) . "'
		AND cd.language_id = '$language_id'
		LIMIT 1
	");

		if ($cat_query->num_rows) {
			$info['topmenu'] = 1;
			$info['category_id'] = $cat_query->row['category_id'];
			$info['parent_id'] = $cat_query->row['parent_id'];
			$info['parent_name'] = $cat_query->row['parent_name'];
		} else {
			$info['topmenu'] = 0;
			$info['category_id'] = 0;
			$info['parent_id'] = 0;
			$info['parent_name'] = '';
		}

		return $info;
	}


	public function getInformations(array $data = []): array
	{
		$sql = "SELECT * FROM `" . DB_PREFIX . "information` i LEFT JOIN `" . DB_PREFIX . "information_description` id ON (i.`information_id` = id.`information_id`) WHERE id.`language_id` = '" . (int) $this->config->get('config_language_id') . "'";

		$sort_data = [
			'id.title',
			'i.sort_order'
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY id.`title`";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$information_data = $this->cache->get('information.' . md5($sql));

		if (!$information_data) {
			$query = $this->db->query($sql);

			$information_data = $query->rows;

			$this->cache->set('information.' . md5($sql), $information_data);
		}

		return $information_data;
	}

	public function getDescriptions(int $information_id): array
	{
		$information_description_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "information_description` WHERE `information_id` = '" . (int) $information_id . "'");

		foreach ($query->rows as $result) {
			$information_description_data[$result['language_id']] = [
				'title' => $result['title'],
				'description' => $result['description'],
				'meta_title' => $result['meta_title'],
				'meta_description' => $result['meta_description'],
				'meta_keyword' => $result['meta_keyword']
			];
		}

		return $information_description_data;
	}


	public function getSeoUrls(int $information_id): array
	{
		$information_seo_url_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "seo_url` WHERE `key` = 'information_id' AND `value` = '" . (int) $information_id . "'");

		foreach ($query->rows as $result) {
			$information_seo_url_data[$result['language_id']] = $result['keyword'];
		}

		return $information_seo_url_data;
	}



	public function getTotalInformations(): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "information`");

		return (int) $query->row['total'];
	}

	public function getTotalInformationsByLayoutId(int $layout_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "information_to_layout` WHERE `layout_id` = '" . (int) $layout_id . "'");

		return (int) $query->row['total'];
	}
}
