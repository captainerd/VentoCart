<?php
namespace Ventocart\Admin\Model\Setting;
/**
 * Class Setting
 *
 * @package Ventocart\Admin\Model\Setting
 */
class Setting extends \Ventocart\System\Engine\Model
{
	/**
		
		* @return array
		*/


	public function getSettings(): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "setting`  ");

		return $query->rows;
	}

	/**
		* @param string $code
		 
		* @return array
		*/
	public function getSetting(string $code): array
	{
		$setting_data = [];

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "setting` WHERE  `code` = '" . $this->db->escape($code) . "'");

		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$setting_data[$result['key']] = $result['value'];
			} else {
				$setting_data[$result['key']] = json_decode($result['value'], true);
			}
		}

		return $setting_data;
	}

	/**
		* @param string $code
		* @param array  $data
	
		*
		* @return void
		*/
	public function editSetting(string $code, array $data): void
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE  `code` = '" . $this->db->escape($code) . "'");

		foreach ($data as $key => $value) {
			if (substr($key, 0, strlen($code)) == $code) {
				if (!is_array($value)) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "setting` SET `code` = '" . $this->db->escape($code) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
				} else {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "setting` SET  `code` = '" . $this->db->escape($code) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(json_encode($value)) . "', `serialized` = '1'");
				}
			}
		}
	}

	/**
		* @param string $code
	
		*
		* @return void
		*/
	public function deleteSetting(string $code): void
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE   `code` = '" . $this->db->escape($code) . "'");
	}

	/**
		* @param string $key
	
		*
		* @return string
		*/
	public function getValue(string $key): string
	{
		$query = $this->db->query("SELECT `value` FROM `" . DB_PREFIX . "setting` WHERE  `key` = '" . $this->db->escape($key) . "'");

		if ($query->num_rows) {
			return $query->row['value'];
		} else {
			return '';
		}
	}

	/**
		* @param string       $code
		* @param string       $key
		* @param string|array $value
	
		*
		* @return void
		*/
	public function editValue(string $code = '', string $key = '', $value = ''): void
	{
		if (!is_array($value)) {
			$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET `value` = '" . $this->db->escape($value) . "', `serialized` = '0'  WHERE `code` = '" . $this->db->escape($code) . "' AND `key` = '" . $this->db->escape($key) . "'");
		} else {
			$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET `value` = '" . $this->db->escape(json_encode($value)) . "', `serialized` = '1' WHERE `code` = '" . $this->db->escape($code) . "' AND `key` = '" . $this->db->escape($key) . "'");
		}
	}

	/**
	 * Updates a specific `define()` value in the config
	 *
	 * @param string $key       The name of the constant to update.
	 * @param string $newValue  The new value to set for the constant.
	 * @return bool             True on success, false on failure.
	 */
	public function updateConfig($key, $newValue)
	{
		$filePath = DIR_VENTOCART . "config.php";
		// Ensure the file exists and is writable
		if (!is_writable($filePath)) {
			throw new \Exception("File does not exist or is not writable: $filePath");
		}

		// Read the file into a string
		$content = file_get_contents($filePath);

		// Match the define pattern
		$pattern = '/define\s*\(\s*[\'"]' . preg_quote($key, '/') . '[\'"]\s*,\s*[\'"](.*?)[\'"]\s*\)\s*;/';
		if (!preg_match($pattern, $content)) {
			throw new \Exception("Constant $key not found in file: $filePath");
		}

		// Replace the old value with the new value
		$replacement = "define('$key', '" . addslashes($newValue) . "');";
		$updatedContent = preg_replace($pattern, $replacement, $content);

		// Write the updated content back to the file
		if (file_put_contents($filePath, $updatedContent) === false) {
			throw new \Exception("Failed to write updated content to file: $filePath");
		}

		return true;
	}
	public function getConfigValue($key)
	{
		$filePath = DIR_VENTOCART . "config.php";

		// Ensure the file exists and is readable
		if (!is_readable($filePath)) {
			throw new \Exception("File does not exist or is not readable: $filePath");
		}

		// Read the file into a string
		$content = file_get_contents($filePath);

		// Match the define pattern
		$pattern = '/define\s*\(\s*[\'"]' . preg_quote($key, '/') . '[\'"]\s*,\s*[\'"](.*?)[\'"]\s*\)\s*;/';
		if (preg_match($pattern, $content, $matches)) {
			return stripslashes($matches[1]); // Return the value without escaping
		} else {
			throw new \Exception("Constant $key not found in file: $filePath");
		}
	}

}
