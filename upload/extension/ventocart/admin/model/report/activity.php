<?php
namespace Ventocart\Admin\Model\Extension\Ventocart\Report;
/**
 * Class Activity
 *
 * @package Ventocart\Admin\Model\Extension\Ventocart\Report
 */
class Activity extends \Ventocart\System\Engine\Model {
	/**
	 * @return array
	 */
	public function getActivities(): array {
		$query = $this->db->query("SELECT `key`, `data`, `date_added` FROM `" . DB_PREFIX . "customer_activity` ORDER BY `date_added` DESC LIMIT 0,5");

		return $query->rows;
	}
}
