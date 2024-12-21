<?php
namespace Ventocart\Catalog\Model\Extension\VentoCart\Module;
/**
 * Class Latest
 *
 * @package Ventocart\Catalog\Model\Extension\VentoCart\Module
 */
class Availabilityfilter extends \Ventocart\Catalog\Model\Catalog\Product {
	/**
	 * @param int $limit
	 *
	 * @return array
	 */public function getStatuses(): array {
		$sql = $this->db->query("
    SELECT 
        ss.stock_status_id, 
        ss.name, 
        (SELECT COUNT(*) FROM `" . DB_PREFIX . "product` p WHERE p.stock_status_id = ss.stock_status_id AND p.status='1') AS product_count 
    FROM 
        `" . DB_PREFIX . "stock_status` ss 
    WHERE 
        ss.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $sql->rows;
	}
}
