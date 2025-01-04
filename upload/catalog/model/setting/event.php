<?php
namespace Ventocart\Catalog\Model\Setting;
/**
 * Class Event
 *
 * @package Ventocart\Catalog\Model\Setting
 */
class Event extends \Ventocart\System\Engine\Model
{
	/**
	 * @return array
	 */
	public function getEvents(): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "event` WHERE `status` = '1' ORDER BY `sort_order` ASC");

		return $query->rows;
	}

}
