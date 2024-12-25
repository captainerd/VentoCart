<?php
namespace Ventocart\Admin\Model\Setting;
/**
 * Class Store
 *
 * @package Ventocart\Admin\Model\Setting
 */
class Store extends \Ventocart\System\Engine\Model
{
	/**
	 * @param array $data
	 *
	 * @return int
	 */
	public function addStore(array $data): int
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "store` SET `name` = '" . $this->db->escape((string) $data['config_name']) . "', `url` = '" . $this->db->escape((string) $data['config_url']) . "'");

		$store_id = $this->db->getLastId();

		// Layout Route
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "layout_route` WHERE `store_id` = '0'");

		foreach ($query->rows as $layout_route) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "layout_route` SET `layout_id` = '" . (int) $layout_route['layout_id'] . "', `route` = '" . $this->db->escape($layout_route['route']) . "', `store_id` = '" . (int) $store_id . "'");
		}

		$this->cache->delete('store');

		return $store_id;
	}

	/**
	 * @param int   $store_id
	 * @param array $data
	 *
	 * @return void
	 */
	public function editStore(int $store_id, array $data): void
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "store` SET `name` = '" . $this->db->escape((string) $data['config_name']) . "', `url` = '" . $this->db->escape((string) $data['config_url']) . "' WHERE `store_id` = '" . (int) $store_id . "'");

		$this->cache->delete('store');
	}

	/**
	 * @param int $store_id
	 *
	 * @return void
	 */
	public function deleteStore(int $store_id): void
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "store` WHERE `store_id` = '" . (int) $store_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "category_to_layout` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "category_to_store` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_affiliate_report` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_ip` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_search` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "download_report` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "gdpr` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "information_to_layout` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "information_to_store` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "layout_route` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "manufacturer_to_layout` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "manufacturer_to_store` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "marketing_report` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_report` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_layout` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_store` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "subscription` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "theme` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "translation` WHERE `store_id` = '" . (int) $store_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `store_id` = '" . (int) $store_id . "'");

		$this->cache->delete('store');
	}

	/**
	 * @param int $store_id
	 *
	 * @return array
	 */
	public function getStore(int $store_id): array
	{
		if ($store_id == 0) {
			return [
				'store_id' => 0,
				'name' => $this->config->get('config_name'),
				'url' => defined('HTTP_CATALOG') ? HTTP_CATALOG : HTTP_SERVER
			];
		}
		$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "store` WHERE `store_id` = '" . (int) $store_id . "'");

		return $query->row;
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function getStores(array $data = [], bool $withDefault = false): array
	{
		$sql = "SELECT * FROM `" . DB_PREFIX . "store` WHERE store_id > '0' ORDER BY `url`";

		$store_data = $this->cache->get('store.' . md5($sql));

		if (!$store_data) {
			$query = $this->db->query($sql);

			$store_data = $query->rows;

			$this->cache->set('store.' . md5($sql), $store_data);
		}
		if (count($store_data) > 0 && $withDefault) {
			// Add the default store at the beginning of the array
			array_unshift($store_data, [
				'store_id' => 0,
				'name' => $this->config->get('config_name'),
				'url' => defined('HTTP_CATALOG') ? HTTP_CATALOG : HTTP_SERVER
			]);
		}

		return $store_data;
	}

	public function getTotalStores(): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "store`");

		return (int) $query->row['total'];
	}

	/**
	 * @param int $layout_id
	 *
	 * @return int
	 */
	public function getTotalStoresByLayoutId(int $layout_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_layout_id' AND `value` = '" . (int) $layout_id . "' AND `store_id` != '0'");

		return (int) $query->row['total'];
	}

	/**
	 * @param string $language
	 *
	 * @return int
	 */
	public function getTotalStoresByLanguage(string $language): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_language' AND `value` = '" . $this->db->escape($language) . "' AND `store_id` != '0'");

		return (int) $query->row['total'];
	}

	/**
	 * @param string $currency
	 *
	 * @return int
	 */
	public function getTotalStoresByCurrency(string $currency): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_currency' AND `value` = '" . $this->db->escape($currency) . "' AND `store_id` != '0'");

		return (int) $query->row['total'];
	}

	/**
	 * @param int $country_id
	 *
	 * @return int
	 */
	public function getTotalStoresByCountryId(int $country_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_country_id' AND `value` = '" . (int) $country_id . "' AND `store_id` != '0'");

		return (int) $query->row['total'];
	}

	/**
	 * @param int $zone_id
	 *
	 * @return int
	 */
	public function getTotalStoresByZoneId(int $zone_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_zone_id' AND `value` = '" . (int) $zone_id . "' AND `store_id` != '0'");

		return (int) $query->row['total'];
	}

	/**
	 * @param int $customer_group_id
	 *
	 * @return int
	 */
	public function getTotalStoresByCustomerGroupId(int $customer_group_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_customer_group_id' AND `value` = '" . (int) $customer_group_id . "' AND `store_id` != '0'");

		return (int) $query->row['total'];
	}

	/**
	 * @param int $information_id
	 *
	 * @return int
	 */
	public function getTotalStoresByInformationId(int $information_id): int
	{
		$account_query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_account_id' AND `value` = '" . (int) $information_id . "' AND `store_id` != '0'");

		$checkout_query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_checkout_id' AND `value` = '" . (int) $information_id . "' AND `store_id` != '0'");

		return ($account_query->row['total'] + $checkout_query->row['total']);
	}

	/**
	 * @param int $order_status_id
	 *
	 * @return int
	 */
	public function getTotalStoresByOrderStatusId(int $order_status_id): int
	{
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "setting` WHERE `key` = 'config_order_status_id' AND `value` = '" . (int) $order_status_id . "' AND `store_id` != '0'");

		return (int) $query->row['total'];
	}
}
