<?php
namespace Ventocart\Catalog\Model\Localisation;
/**
 * Class Location
 *
 * @package Ventocart\Catalog\Model\Localisation
 */
class Location extends \Ventocart\System\Engine\Model {
	/**
	 * @param int $location_id
	 *
	 * @return array
	 */
	public function getLocation(int $location_id): array {
		$query = $this->db->query("SELECT `location_id`, `name`, `address`, `geocode`, `telephone`, `image`, `open`, `comment` FROM `" . DB_PREFIX . "location` WHERE `location_id` = '" . (int)$location_id . "'");

		return $query->row;
	}
}
