<?php
namespace Ventocart\Catalog\Model\Setting;
/**
 * Class Setting
 *
 * @package Ventocart\Catalog\Model\Setting
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
			 
				 *
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
			  * @param string $key
		  
			  *
			  * @return string
			  */
	public function getValue(string $key): string
	{
		$query = $this->db->query("SELECT `value` FROM `" . DB_PREFIX . "setting` WHERE    `key` = '" . $this->db->escape($key) . "'");

		if ($query->num_rows) {
			return $query->row['value'];
		} else {
			return '';
		}
	}
}
