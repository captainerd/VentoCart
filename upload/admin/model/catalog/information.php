<?php
namespace Ventocart\Admin\Model\Catalog;
class Information extends \Ventocart\System\Engine\Model
{
	public function addInformation(array $data): int
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "information` SET `sort_order` = '" . (int) $data['sort_order'] . "', `bottom` = '" . (isset($data['bottom']) ? (int) $data['bottom'] : 0) . "', `status` = '" . (bool) (isset($data['status']) ? $data['status'] : 0) . "'");

		$information_id = $this->db->getLastId();

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
		$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "information` WHERE `information_id` = '" . (int) $information_id . "'");

		return $query->row;
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
