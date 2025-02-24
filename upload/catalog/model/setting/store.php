<?php
namespace Ventocart\Catalog\Model\Setting;
/**
 * Class StoreStore
 *
 * @package Ventocart\Catalog\Model\Setting
 */
class Store extends \Ventocart\System\Engine\Model
{
	/**
				   
					   * @return array
					   */
	public function getStore(): array
	{


		return [

			'name' => $this->config->get('config_name'),
			'url' => defined('HTTP_CATALOG') ? HTTP_CATALOG : HTTP_SERVER
		];

	}

	/**
	 * @param string $url
	 *
	 * @return array
	 */
	public function getStoreByHostname(string $url): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "store` WHERE REPLACE(`url`, 'www.', '') = '" . $this->db->escape($url) . "'");

		return $query->row;
	}

	/**
	 * @return array
	 */
	public function getStores(array $data = [], bool $withDefault = false): array
	{
		$sql = "SELECT * FROM `" . DB_PREFIX . "store`  ORDER BY `url`";

		$store_data = $this->cache->get('store.' . md5($sql));

		if (!$store_data) {
			$query = $this->db->query($sql);

			$store_data = $query->rows;

			$this->cache->set('store.' . md5($sql), $store_data);
		}
		if (count($store_data) > 0 && $withDefault) {
			// Add the default store at the beginning of the array
			array_unshift($store_data, [

				'name' => $this->config->get('config_name'),
				'url' => defined('HTTP_CATALOG') ? HTTP_CATALOG : HTTP_SERVER
			]);
		}

		return $store_data;
	}


}
