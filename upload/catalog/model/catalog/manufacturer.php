<?php
namespace Ventocart\Catalog\Model\Catalog;
/**
 * Class Manufacturer
 *
 * @package Ventocart\Catalog\Model\Catalog
 */
class Manufacturer extends \Ventocart\System\Engine\Model
{
	/**
	 * @param int $manufacturer_id
	 *
	 * @return array
	 */
	public function getManufacturer(int $manufacturer_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "manufacturer` `m`   WHERE `m`.`manufacturer_id` = '" . (int) $manufacturer_id . "'");

		return $query->row;
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function getManufacturers(array $data = []): array
	{
		$sql = "SELECT * 
		FROM `" . DB_PREFIX . "manufacturer` `m`";

		$sort_data = [
			'name',
			'sort_order'
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY `" . $data['sort'] . "`";
		} else {
			$sql .= " ORDER BY `name`";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$manufacturer_data = $this->cache->get('manufacturer.' . md5($sql));

		if (!$manufacturer_data) {
			$query = $this->db->query($sql);

			$manufacturer_data = $query->rows;

			$this->cache->set('manufacturer.' . md5($sql), $manufacturer_data);
		}

		return $manufacturer_data;
	}


}
