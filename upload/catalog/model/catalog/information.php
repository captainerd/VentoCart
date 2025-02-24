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


}
