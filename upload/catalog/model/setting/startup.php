<?php
namespace Ventocart\Catalog\Model\Setting;
/**
 * Class Startup
 *
 * @package Ventocart\Catalog\Model\Setting
 */
class Startup extends \Ventocart\System\Engine\Model {
	/**
	 * @return mixed
	 */
	function getStartups() {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "startup` WHERE `status` = '1' ORDER BY `sort_order` ASC");

		return $query->rows;
	}
}