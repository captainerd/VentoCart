<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Module;
/**
 * Class Bestseller
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Module
 */
class Bestseller extends \Ventocart\Catalog\Model\Catalog\Product
{
	/**
	 * @param int $limit
	 *
	 * @return array
	 */
	public function getBestSellers(int $limit): array
	{
		// Storing some sub queries so that we are not typing them out multiple times.
		$sql = "SELECT *, `pd`.`name`, `p`.`image`, `pb`.`total`, " . $this->statement['discount'] . ", " . $this->statement['special'] . ", " . $this->statement['reward'] . ", " . $this->statement['review'] . " 
		FROM `" . DB_PREFIX . "product_bestseller` `pb` 
		LEFT JOIN `" . DB_PREFIX . "product` `p` ON (`p`.`product_id` = `pb`.`product_id` AND `p`.`status` = '1' AND `p`.`date_available` <= NOW()) 
		LEFT JOIN `" . DB_PREFIX . "product_description` `pd` ON (`pd`.`product_id` = `p`.`product_id`) 
		WHERE `pd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "' 
		ORDER BY `pb`.`total` DESC LIMIT 0," . (int) $limit;

		$product_data = $this->cache->get('product.' . md5($sql));

		if (!$product_data) {
			$query = $this->db->query($sql);

			$product_data = $query->rows;

			$this->cache->set('product.' . md5($sql), $product_data);
		}

		return $product_data;
	}
}
