<?php
namespace Opencart\Admin\Model\Catalog;

class Option extends \Opencart\System\Engine\Model
{
	public function addOption(array $data): int
	{
		$group_id = 0;

		foreach ($data['option_description'] as $language_id => $value) {
			$this->db->query("
				INSERT INTO `" . DB_PREFIX . "options` 
				SET 
					`type` = '" . $this->db->escape($data['type']) . "', 
					`language_id` = '" . (int) $language_id . "', 
					`group_id` = '" . (int) $group_id . "', 
					`option_n` = '-1',
					`sort_order` = '" . $this->db->escape($data['sort_order']) . "',
					`name` = '" . $this->db->escape($value['name']) . "'
			");

			if ($group_id == 0) {
				//get group id
				$group_id = $this->db->getLastId();
				//udpate group id to the first
				$this->db->query("UPDATE `" . DB_PREFIX . "options` SET  `group_id` = '" . (int) $group_id . "' WHERE  `option_id` = '" . (int) $group_id . "'");

			}
		}
		if (isset($data['option_value']))
			foreach ($data['option_value'] as $index => $voption) {
				foreach ($voption['option_value_description'] as $language_id => $option_value_description) {
					$this->db->query("
					INSERT INTO `" . DB_PREFIX . "options` 
					SET 
						`name` = '" . $this->db->escape($option_value_description['name']) . "', 
						`group_id` = '" . (int) $group_id . "', 
						`language_id` = '" . (int) $language_id . "', 
						`option_n` = '" . (int) $index . "', 
						`image` = '" . $this->db->escape(html_entity_decode($voption['image'], ENT_QUOTES, 'UTF-8')) . "', 
						`sort_order` = '" . (int) $voption['sort_order'] . "'
				");
				}
			}

		return $group_id;
	}
	public function editOption(int $option_id, array $data): void
	{
		foreach ($data['option_description'] as $language_id => $value) {
			$this->db->query("
				UPDATE `" . DB_PREFIX . "options` 
				SET 
					`type` = '" . $this->db->escape($data['type']) . "', 
					`option_n` = '-1',
					`sort_order` = '" . $this->db->escape($data['sort_order']) . "',
					`name` = '" . $this->db->escape($value['name']) . "' 
				WHERE 
					`option_n` = '-1' AND 
					`group_id` = '" . (int) $option_id . "' AND 
					`language_id` = '" . (int) $language_id . "'
			");
		}

		if (isset($data['option_value']))
			foreach ($data['option_value'] as $index => $voption) {
				foreach ($voption['option_value_description'] as $language_id => $option_value_description) {

					$selectQuery = "SELECT option_id
				FROM `" . DB_PREFIX . "options` 
				WHERE `option_n` = '" . (int) $index . "' AND 
			 `group_id` = '" . (int) $option_id . "' AND  `language_id` = '" . (int) $language_id . "'";

					// Execute the SELECT query
					$result = $this->db->query($selectQuery);

					// Check if there are rows
					if ($result->num_rows) {
						// Rows exist, perform UPDATE
						$this->db->query("
					UPDATE `" . DB_PREFIX . "options` 
					SET 
						`name` = '" . $this->db->escape($option_value_description['name']) . "', 
						`group_id` = '" . (int) $option_id . "', 
						`language_id` = '" . (int) $language_id . "', 
						`option_n` = '" . (int) $index . "', 
						`image` = '" . $this->db->escape(html_entity_decode($voption['image'], ENT_QUOTES, 'UTF-8')) . "', 
						`sort_order` = '" . (int) $voption['sort_order'] . "'  
					WHERE 
						`option_n` = '" . (int) $index . "' AND 
						`group_id` = '" . (int) $option_id . "' AND 
						`language_id` = '" . (int) $language_id . "'
				");
					} else {
						// No rows exist, perform INSERT
						$this->db->query("
					INSERT INTO `" . DB_PREFIX . "options` 
					SET 
						`name` = '" . $this->db->escape($option_value_description['name']) . "', 
						`group_id` = '" . (int) $option_id . "', 
						`language_id` = '" . (int) $language_id . "', 
						`option_n` = '" . (int) $index . "', 
						`image` = '" . $this->db->escape(html_entity_decode($voption['image'], ENT_QUOTES, 'UTF-8')) . "', 
						`sort_order` = '" . (int) $voption['sort_order'] . "'
				");
					}


				}
			}
	}


	public function deleteOption(int $option_id): void
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "options` WHERE `option_id` = '" . (int) $option_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "options` WHERE `group_id` = '" . (int) $option_id . "'");

	}
	public function getGroup(int $option_id): array
	{

		// Delete Orphan language entries of deleted languages
		$query = $this->db->query("
 			   DELETE FROM `" . DB_PREFIX . "options`
 			   WHERE `language_id` NOT IN (SELECT `language_id` FROM `" . DB_PREFIX . "language`) 
  			    AND (`option_id` = '" . (int) $option_id . "' OR `group_id` = '" . (int) $option_id . "');
			");
		// Make sure there are language entries
		$this->addLanguageEntries($option_id);
	 
		$query = $this->db->query("
			SELECT * 
			FROM `" . DB_PREFIX . "options` 
			WHERE 
				(`option_id` = '" . (int) $option_id . "' OR `group_id` = '" . (int) $option_id . "')");

		return $query->rows;
	}

	private function addLanguageEntries($option_id) {
		// Make sure there are entries for existing languages
		$queryLanguages = $this->db->query("
			SELECT DISTINCT `language_id`
			FROM `" . DB_PREFIX . "language`
		");
	
		// Get existing options for the specified option_id or group_id
	 	$options = $this->db->query("
			SELECT * 
			FROM `" . DB_PREFIX . "options` 
			WHERE 
				(`option_id` = '" . (int) $option_id . "' OR `group_id` = '" . (int) $option_id . "')
		");
	 
		 foreach ($options->rows as $option) {
			foreach ($queryLanguages->rows as $language) {
				$language_id = (int)$language['language_id'];
				$isThere = $this->db->query("
					SELECT *
					FROM `" . DB_PREFIX . "options`
					WHERE
						`option_n` = '" . (int) $option['option_n'] . "'
						AND `group_id` = '" . (int) $option['group_id'] . "'
						AND `language_id` = '" . (int) $language_id . "'
				"); 
		 
				if ($isThere->num_rows == 0) {
			 
					// Insert a new entry into the options table for the missing language_id
				 	$this->db->query("
						INSERT INTO `" . DB_PREFIX . "options` 
						SET 
							`group_id` = '" . (int) $option['group_id'] . "',
							`language_id` = '" . (int) $language_id . "',
							`name` = '" . $this->db->escape($option['name']) . "',
							`type` = '" . $this->db->escape($option['type']) . "',
							`image` = '" . $this->db->escape(isset($option['image']) ? $option['image'] : '') . "',
							`option_n` = '" . $this->db->escape($option['option_n']) . "',
							`sort_order` = '" . (int) $option['sort_order'] . "'
					"); 
				 }
		  } 
		} 
	}


	public function getOption(int $option_id, bool $title = false): array
	{
		if (!$title) {
			$query = $this->db->query("
		SELECT * 
		FROM `" . DB_PREFIX . "options` 
		WHERE 
			(`option_id` = '" . (int) $option_id . "' OR `group_id` = '" . (int) $option_id . "')
			AND `language_id` = '" . (int) $this->config->get('config_language_id') . "'
	");
		} else {

			$query = $this->db->query("
		SELECT * 
		FROM `" . DB_PREFIX . "options` 
		WHERE 
			`option_id` = '" . (int) $option_id . "'
			AND `language_id` = '" . (int) $this->config->get('config_language_id') . "'
	");
			
			$result = $query->row;
			$group_id = (int) $result['group_id'];

			$query = $this->db->query("
        SELECT * 
        FROM `" . DB_PREFIX . "options` 
        WHERE 
            `option_id` = '" . $group_id . "'
            AND `language_id` = '" . (int) $this->config->get('config_language_id') . "'
    ");





		}
		return $query->row;
	}

	public function getValues(int $option_id): array
	{

		$query = $this->db->query("
		SELECT * 
		FROM `" . DB_PREFIX . "options` 
		WHERE `group_id` = '" . (int) $option_id . "' 
		  AND `option_n` != -1 
		  AND `language_id` = '" . (int) $this->config->get('config_language_id') . "'
	");

		return $query->rows;
	}
	public function getOptions(array $data = []): array
	{
		$sql = "
			SELECT * 
			FROM `" . DB_PREFIX . "options`  
			WHERE  option_n='-1' AND  `language_id` = '" . (int) $this->config->get('config_language_id') . "   '
		";

		if (!empty($data['filter_name'])) {
			$sql .= " AND  `name` LIKE '" . $this->db->escape((string) $data['filter_name'] . '%') . "'";
		}

		$sort_data = [
			'name',
			'type',
			'sort_order'
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY `name`";
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


		$query = $this->db->query($sql);

		return $query->rows;
	}



	public function getTotalOptions(): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "options` WHERE option_n='-1'");

		return (int) $query->row['total'];
	}
}