<?php
namespace Ventocart\Admin\Model\Sale;
/**
 * Class Returns
 *
 * @package Ventocart\Admin\Model\Sale
 */
class Returns extends \Ventocart\System\Engine\Model {
	/**
	 * @param array $data
	 *
	 * @return int
	 */
	public function addReturn(array $data): int {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "return` SET `order_id` = '" . (int)$data['order_id'] . "', `product_id` = '" . (int)$data['product_id'] . "', `customer_id` = '" . (int)$data['customer_id'] . "', `firstname` = '" . $this->db->escape((string)$data['firstname']) . "', `lastname` = '" . $this->db->escape((string)$data['lastname']) . "', `email` = '" . $this->db->escape((string)$data['email']) . "', `telephone` = '" . $this->db->escape((string)$data['telephone']) . "', `product` = '" . $this->db->escape((string)$data['product']) . "', `model` = '" . $this->db->escape((string)$data['model']) . "', `quantity` = '" . (int)$data['quantity'] . "', `opened` = '" . (int)$data['opened'] . "', `return_reason_id` = '" . (int)$data['return_reason_id'] . "', `return_action_id` = '" . (int)$data['return_action_id'] . "', `return_status_id` = '" . (int)$data['return_status_id'] . "', `comment` = '" . $this->db->escape((string)$data['comment']) . "', `date_ordered` = '" . $this->db->escape((string)$data['date_ordered']) . "', `date_added` = NOW(), `date_modified` = NOW()");

		return $this->db->getLastId();
	}

	/**
	 * @param int   $return_id
	 * @param array $data
	 *
	 * @return void
	 */
	public function editReturn(int $return_id, array $data): void {
		$this->db->query("UPDATE `" . DB_PREFIX . "return` SET `order_id` = '" . (int)$data['order_id'] . "', `product_id` = '" . (int)$data['product_id'] . "', `customer_id` = '" . (int)$data['customer_id'] . "', `firstname` = '" . $this->db->escape((string)$data['firstname']) . "', `lastname` = '" . $this->db->escape((string)$data['lastname']) . "', `email` = '" . $this->db->escape((string)$data['email']) . "', `telephone` = '" . $this->db->escape((string)$data['telephone']) . "', `product` = '" . $this->db->escape((string)$data['product']) . "', `model` = '" . $this->db->escape((string)$data['model']) . "', `quantity` = '" . (int)$data['quantity'] . "', `opened` = '" . (int)$data['opened'] . "', `return_reason_id` = '" . (int)$data['return_reason_id'] . "', `return_action_id` = '" . (int)$data['return_action_id'] . "', `comment` = '" . $this->db->escape((string)$data['comment']) . "', `date_ordered` = '" . $this->db->escape((string)$data['date_ordered']) . "', `date_modified` = NOW() WHERE `return_id` = '" . (int)$return_id . "'");
	}

	/**
	 * @param int $return_id
	 *
	 * @return void
	 */
	public function deleteReturn(int $return_id): void {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "return` WHERE `return_id` = '" . (int)$return_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "return_history` WHERE `return_id` = '" . (int)$return_id . "'");
	}

	/**
	 * @param int $return_id
	 *
	 * @return array
	 */
	public function getReturn(int $return_id): array {
		$query = $this->db->query("SELECT DISTINCT *, (SELECT CONCAT(`c`.`firstname`, ' ', `c`.`lastname`) FROM `" . DB_PREFIX . "customer` `c` WHERE `c`.`customer_id` = `r`.`customer_id`) AS `customer`, (SELECT `c`.`language_id` FROM `" . DB_PREFIX . "customer` `c` WHERE `c`.`customer_id` = `r`.`customer_id`) AS `language_id`, (SELECT `rs`.`name` FROM `" . DB_PREFIX . "return_status` `rs` WHERE `rs`.`return_status_id` = `r`.`return_status_id` AND `rs`.`language_id` = '" . (int)$this->config->get('config_language_id') . "') AS `return_status` FROM `" . DB_PREFIX . "return` `r` WHERE `r`.`return_id` = '" . (int)$return_id . "'");

		return $query->row;
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function getReturns(array $data = []): array {
		$sql = "SELECT *, CONCAT(`r`.`firstname`, ' ', `r`.`lastname`) AS `customer`, (SELECT `rs`.`name` FROM `" . DB_PREFIX . "return_status` `rs` WHERE `rs`.`return_status_id` = `r`.`return_status_id` AND `rs`.`language_id` = '" . (int)$this->config->get('config_language_id') . "') AS `return_status` FROM `" . DB_PREFIX . "return` `r`";

		$implode = [];

		if (!empty($data['filter_return_id'])) {
			$implode[] = "`r`.`return_id` = '" . (int)$data['filter_return_id'] . "'";
		}

		if (!empty($data['filter_order_id'])) {
			$implode[] = "`r`.`order_id` = '" . (int)$data['filter_order_id'] . "'";
		}

		if (!empty($data['filter_customer'])) {
			$implode[] = "LCASE(CONCAT(`r`.`firstname`, ' ', `r`.`lastname`)) LIKE '" . $this->db->escape(oc_strtolower($data['filter_customer']) . '%') . "'";
		}

		if (!empty($data['filter_product'])) {
			$implode[] = "LCASE(`r`.`product` = '" . $this->db->escape(oc_strtolower($data['filter_product'])) . "'";
		}

		if (!empty($data['filter_model'])) {
			$implode[] = "LCASE(`r`.`model` = '" . $this->db->escape(oc_strtolower($data['filter_model'])) . "'";
		}

		if (!empty($data['filter_return_status_id'])) {
			$implode[] = "`r`.`return_status_id` = '" . (int)$data['filter_return_status_id'] . "'";
		}

		if (!empty($data['filter_date_from'])) {
			$implode[] = "DATE(`r`.`date_added`) >= DATE('" . $this->db->escape((string)$data['filter_date_from']) . "')";
		}

		if (!empty($data['filter_date_to'])) {
			$implode[] = "DATE(`r`.`date_added`) <= DATE('" . $this->db->escape((string)$data['filter_date_to']) . "')";
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$sort_data = [
			'r.return_id',
			'r.order_id',
			'customer',
			'r.product',
			'r.model',
			'return_status',
			'r.date_added',
			'r.date_modified'
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY `r`.`return_id`";
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

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	/**
	 * @param array $data
	 *
	 * @return int
	 */
	public function getTotalReturns(array $data = []): int {
		$sql = "SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "return` `r`";

		$implode = [];

		if (!empty($data['filter_return_id'])) {
			$implode[] = "`r`.`return_id` = '" . (int)$data['filter_return_id'] . "'";
		}

		if (!empty($data['filter_customer'])) {
			$implode[] = "LCASE(CONCAT(`r`.`firstname`, ' ', `r`.`lastname`)) LIKE '" . $this->db->escape(oc_strtolower($data['filter_customer']) . '%') . "'";
		}

		if (!empty($data['filter_order_id'])) {
			$implode[] = "`r`.`order_id` = '" . $this->db->escape((string)$data['filter_order_id']) . "'";
		}

		if (!empty($data['filter_product'])) {
			$implode[] = "`r`.`product` = '" . $this->db->escape((string)$data['filter_product']) . "'";
		}

		if (!empty($data['filter_model'])) {
			$implode[] = "`r`.`model` = '" . $this->db->escape((string)$data['filter_model']) . "'";
		}

		if (!empty($data['filter_return_status_id'])) {
			$implode[] = "`r`.`return_status_id` = '" . (int)$data['filter_return_status_id'] . "'";
		}

		if (!empty($data['filter_date_from'])) {
			$implode[] = "DATE(`r`.`date_added`) >= DATE('" . $this->db->escape((string)$data['filter_date_from']) . "')";
		}

		if (!empty($data['filter_date_to'])) {
			$implode[] = "DATE(`r`.`date_added`) <= DATE('" . $this->db->escape((string)$data['filter_date_to']) . "')";
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$query = $this->db->query($sql);

		return (int)$query->row['total'];
	}

	/**
	 * @param int $return_status_id
	 *
	 * @return int
	 */
	public function getTotalReturnsByReturnStatusId(int $return_status_id): int {
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "return` WHERE `return_status_id` = '" . (int)$return_status_id . "'");

		return (int)$query->row['total'];
	}

	/**
	 * @param int $return_reason_id
	 *
	 * @return int
	 */
	public function getTotalReturnsByReturnReasonId(int $return_reason_id): int {
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "return` WHERE `return_reason_id` = '" . (int)$return_reason_id . "'");

		return (int)$query->row['total'];
	}

	/**
	 * @param int $return_action_id
	 *
	 * @return int
	 */
	public function getTotalReturnsByReturnActionId(int $return_action_id): int {
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "return` WHERE `return_action_id` = '" . (int)$return_action_id . "'");

		return (int)$query->row['total'];
	}

	/**
	 * @param int    $return_id
	 * @param int    $return_status_id
	 * @param string $comment
	 * @param bool   $notify
	 *
	 * @return void
	 */
	public function addHistory(int $return_id, int $return_status_id, string $comment, bool $notify): void {
		$this->db->query("UPDATE `" . DB_PREFIX . "return` SET `return_status_id` = '" . (int)$return_status_id . "', `date_modified` = NOW() WHERE `return_id` = '" . (int)$return_id . "'");
		$this->db->query("INSERT INTO `" . DB_PREFIX . "return_history` SET `return_id` = '" . (int)$return_id . "', `return_status_id` = '" . (int)$return_status_id . "', `notify` = '" . (int)$notify . "', `comment` = '" . $this->db->escape(strip_tags($comment)) . "', `date_added` = NOW()");
	}

	/**
	 * @param int $return_id
	 * @param int $start
	 * @param int $limit
	 *
	 * @return array
	 */
	public function getHistories(int $return_id, int $start = 0, int $limit = 10): array {
		if ($start < 0) {
			$start = 0;
		}

		if ($limit < 1) {
			$limit = 10;
		}

		$query = $this->db->query("SELECT `rh`.`date_added`, `rs`.`name` AS `status`, `rh`.`comment`, `rh`.`notify` FROM `" . DB_PREFIX . "return_history` `rh` LEFT JOIN `" . DB_PREFIX . "return_status` `rs` ON `rh`.`return_status_id` = `rs`.`return_status_id` WHERE `rh`.`return_id` = '" . (int)$return_id . "' AND `rs`.`language_id` = '" . (int)$this->config->get('config_language_id') . "' ORDER BY `rh`.`date_added` DESC LIMIT " . (int)$start . "," . (int)$limit);

		return $query->rows;
	}

	/**
	 * @param int $return_id
	 *
	 * @return int
	 */
	public function getTotalHistories(int $return_id): int {
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "return_history` WHERE `return_id` = '" . (int)$return_id . "'");

		return (int)$query->row['total'];
	}

	/**
	 * @param int $return_status_id
	 *
	 * @return int
	 */
	public function getTotalHistoriesByReturnStatusId(int $return_status_id): int {
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "return_history` WHERE `return_status_id` = '" . (int)$return_status_id . "'");

		return (int)$query->row['total'];
	}
}
