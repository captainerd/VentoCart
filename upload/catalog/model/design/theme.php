<?php
namespace Ventocart\Catalog\Model\Design;
/**
 * Class Theme
 *
 * @package Ventocart\Catalog\Model\Design
 */
class Theme extends \Ventocart\System\Engine\Model
{
	/**
	 * @param string $route
	 *
	 * @return array
	 */
	public function getTheme(string $route): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "theme` WHERE `store_id` = '" . (int) $this->config->get('config_store_id') . "' AND `route` = '" . $this->db->escape($route) . "'");

		return $query->row;
	}
}