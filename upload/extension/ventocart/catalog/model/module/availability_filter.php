<?php
namespace Opencart\Catalog\Model\Extension\VentoCart\Module;
/**
 * Class Latest
 *
 * @package Opencart\Catalog\Model\Extension\VentoCart\Module
 */
class Availabilityfilter extends \Opencart\Catalog\Model\Catalog\Product {
	/**
	 * @param int $limit
	 *
	 * @return array
	 */public function getStatuses(): array {
		$sql = $this->db->query("SELECT DISTINCT stock_status_id, name FROM `" . DB_PREFIX . "stock_status` WHERE `language_id` = '" . (int)$this->config->get('config_language_id') . "'");
		 
		return $sql->rows;
	}
}
