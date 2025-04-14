<?php
namespace Ventocart\Catalog\Model\Catalog;
/**
 * Class Information
 *
 * @package Ventocart\Catalog\Model\Catalog
 */
class Information extends \Ventocart\System\Engine\Model
{
	/**
	 * @param int $information_id
	 *
	 * @return array
	 */
	public function getInformation(int $information_id): array
	{


		$query = $this->db->query("SELECT DISTINCT * 
		FROM `" . DB_PREFIX . "information` `i`
		LEFT JOIN `" . DB_PREFIX . "information_description` `id` 
			ON (`i`.`information_id` = `id`.`information_id`)
		WHERE `i`.`information_id` = '" . (int) $information_id . "' 
		  AND `id`.`language_id` = '" . (int) $this->config->get('config_language_id') . "' 
		  AND `i`.`status` = '1'");

		return $query->row;
	}
	public function updateInformation(int $information_id, array $description): void
	{
		$this->db->query(
			"UPDATE `" . DB_PREFIX . "information_description`
         SET `description` = '" . $this->db->escape(json_encode($description)) . "'
         WHERE `information_id` = '" . (int) $information_id . "'
         AND `language_id` = '" . (int) $this->config->get('config_language_id') . "'"
		);
	}

	/**
	 * @return array
	 */
	public function getInformations(): array
	{
		$query = $this->db->query("SELECT * 
                           FROM `" . DB_PREFIX . "information` `i`
                           LEFT JOIN `" . DB_PREFIX . "information_description` `id` 
                               ON (`i`.`information_id` = `id`.`information_id`)
                           WHERE `id`.`language_id` = '" . (int) $this->config->get('config_language_id') . "' 
                             AND `i`.`status` = '1' 
                           ORDER BY `i`.`sort_order`, LCASE(`id`.`title`) ASC");

		return $query->rows;
	}
	public function validateAdmin($admin_token)
	{
		// Check if the admin_token is set
		if (empty($admin_token)) {
			return false;
		}



		// Query to find the session data based on the admin_token
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "session WHERE data LIKE '%\"user_token\":\"" . $this->db->escape($admin_token) . "\"%'");

		// If no matching session data is found, return false
		if ($query->num_rows == 0) {
			return false;
		}

		// Decode the session data
		$session_data = json_decode($query->row['data'], true);

		// Check if user_token exists in session data
		if (!isset($session_data['user_token']) || $session_data['user_token'] != $admin_token) {
			return false;
		}

		// Get user_id from session data
		$user_id = (int) $session_data['user_id'];

		// Check if the user exists in the user table
		$user_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "user WHERE user_id = '" . (int) $user_id . "'");

		// If the user doesn't exist, return false
		if ($user_query->num_rows == 0) {
			return false;
		}

		// Get user_group_id and permissions
		$user_group_id = (int) $user_query->row['user_group_id'];

		// Query to get the permissions for the user group
		$group_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "user_group WHERE user_group_id = '" . (int) $user_group_id . "'");

		// If no user group is found, return false
		if ($group_query->num_rows == 0) {
			return false;
		}

		// Decode the permissions for the user group
		$permissions = json_decode($group_query->row['permission'], true);

		// Check if 'catalog/information' permission exists
		if (isset($permissions['modify']) && in_array('catalog/information', $permissions['modify'])) {
			return true; // Permission exists, valid admin token
		}

		// If no permission for 'catalog/information', return false
		return false;
	}


}
