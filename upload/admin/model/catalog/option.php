<?php
namespace Ventocart\Admin\Model\Catalog;
/*
Revamped Options Self-Referencing Table Structure
Usage:

	option_id, name, type, language_id: These columns are used to store core information about each option.
	group_id: This column references the master option group, providing a way to group related options together (e.g., "color").
	option_n: Used to represent the position of the option in the translation sequence, as sort order and as reference. The master option (group) has option_n = -1.

Example:

Consider an example where option_id=10, group_id=1, and option_n=3. This indicates that it's 
the third option-value for the option with option_id=10 in the language specified by language_id.
Note:

sort_order and image columns have no effect on products directly. They are specific to the option filters menu.
	
*/

class Option extends \Ventocart\System\Engine\Model
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
						`image` = '" . $this->db->escape($voption['image']) . "', 
						`group_id` = '" . (int) $group_id . "', 
						`language_id` = '" . (int) $language_id . "', 
						`type` = '" . $this->db->escape($data['type']) . "', 
						`option_n` = '" . (int) $voption['sort_order'] . "'
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
					`name` = '" . $this->db->escape($value['name']) . "' 
				WHERE 
					`option_n` = '-1' AND 
					`group_id` = '" . (int) $option_id . "' AND 
					`language_id` = '" . (int) $language_id . "'
			");
		}

		if (isset($data['option_value']))

			foreach ($data['option_value'] as $index => $voption) {

				if (isset($voption['delete'])) {
					$this->db->query("DELETE FROM `" . DB_PREFIX . "options` WHERE `option_n` = '" . (int) $index . "' AND `group_id` = '" . (int) $option_id . "' AND `language_id` = '" . (int) $language_id . "'");

					continue;
				}
				if (empty($voption['option_value_description'])) {
					continue;
				}
				foreach ($voption['option_value_description'] as $language_id => $option_value_description) {

					$selectQuery = "SELECT option_id
				FROM `" . DB_PREFIX . "options` 
				WHERE `option_n` = '" . (int) $voption['sort_order'] . "' AND 
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
						`image` = '" . $this->db->escape($voption['image']) . "', 
						`group_id` = '" . (int) $option_id . "', 
						`language_id` = '" . (int) $language_id . "', 
						`type` = '" . $this->db->escape($data['type']) . "', 
						`option_n` = '" . (int) $voption['sort_order'] . "' 
					WHERE 
						`option_n` = '" . (int) $voption['sort_order'] . "' AND 
						`group_id` = '" . (int) $option_id . "' AND 
						`language_id` = '" . (int) $language_id . "'
				");
					} else {
						// No rows exist, perform INSERT
						$this->db->query("
					INSERT INTO `" . DB_PREFIX . "options` 
					SET 
						`name` = '" . $this->db->escape($option_value_description['name']) . "', 
						`image` = '" . $this->db->escape($voption['image']) . "', 
						`group_id` = '" . (int) $option_id . "', 
						`type` = '" . $this->db->escape($data['type']) . "', 
						`language_id` = '" . (int) $language_id . "', 
						`option_n` = '" . (int) $voption['sort_order'] . "'
				");
					}
				}
			}
	}


	public function deleteOption(int $option_id): void
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "options` WHERE `option_id` = '" . (int) $option_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "options` WHERE `group_id` = '" . (int) $option_id . "'");
		$this->db->query("
		DELETE FROM `" . DB_PREFIX . "product_options`
		WHERE `option_id` NOT IN (
		SELECT `option_id` FROM `" . DB_PREFIX . "options`)");

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
			`group_id` = (
				SELECT `group_id`
				FROM `" . DB_PREFIX . "options`
				WHERE `option_id` = '" . (int) $option_id . "'
				ORDER BY option_n LIMIT 1
			)
	");


		return $query->rows;
	}

	private function addLanguageEntries($option_id)
	{
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
				$language_id = (int) $language['language_id'];
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
							`option_n` = '" . $this->db->escape($option['option_n']) . "'
					 
					");
				}
			}
		}
	}


	public function getOption(int $option_id, bool $title = false): array
	{
		if (!$title) {
			$query = $this->db->query("
			SELECT o1.option_id, o1.option_n, o1.group_id, o2.*
			FROM `" . DB_PREFIX . "options` o1
			LEFT JOIN `" . DB_PREFIX . "options` o2 ON o1.group_id = o2.group_id
			WHERE 
				o1.option_id = '" . (int) $option_id . "'
				AND o2.language_id = '" . (int) $this->config->get('config_language_id') . "'  
				AND o2.option_n = o1.option_n  
	");
		} else {

			$query = $this->db->query("
			SELECT o1.option_id, o1.option_n, o1.group_id, o2.*
			FROM `" . DB_PREFIX . "options` o1
			LEFT JOIN `" . DB_PREFIX . "options` o2 ON o1.group_id = o2.group_id
			WHERE 
				o1.option_id = '" . (int) $option_id . "'
				AND o2.language_id = '" . (int) $this->config->get('config_language_id') . "'  	 
		");
		}
		return $query->row;
	}

	public function getValues(int $option_id): array
	{

		$query = $this->db->query("
			SELECT o1.option_id, o1.option_n, o1.group_id, o2.*
			FROM `" . DB_PREFIX . "options` o1
			LEFT JOIN `" . DB_PREFIX . "options` o2 ON o1.group_id = o2.group_id
			WHERE 
				o1.option_id = '" . (int) $option_id . "'
				AND o2.option_n <> -1
				AND o2.language_id = '" . (int) $this->config->get('config_language_id') . "'  
			 
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
			'type'
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