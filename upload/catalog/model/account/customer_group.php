<?php
namespace Ventocart\Catalog\Model\Account;
/**
 * Class Customer Group
 *
 * @package Ventocart\Catalog\Model\Account
 */
class CustomerGroup extends \Ventocart\System\Engine\Model {
	/**
	 * @param int $customer_group_id
	 *
	 * @return array
	 */
	public function getCustomerGroup(int $customer_group_id): array {
		$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "customer_group` `cg` LEFT JOIN `" . DB_PREFIX . "customer_group_description` `cgd` ON (`cg`.`customer_group_id` = `cgd`.`customer_group_id`) WHERE `cg`.`customer_group_id` = '" . (int)$customer_group_id . "' AND `cgd`.`language_id` = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	/**
	 * @return array
	 */
	public function getCustomerGroups(): array {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_group` `cg` LEFT JOIN `" . DB_PREFIX . "customer_group_description` `cgd` ON (`cg`.`customer_group_id` = `cgd`.`customer_group_id`) WHERE `cgd`.`language_id` = '" . (int)$this->config->get('config_language_id') . "' ORDER BY `cg`.`sort_order` ASC, `cgd`.`name` ASC");

		return $query->rows;
	}
}
