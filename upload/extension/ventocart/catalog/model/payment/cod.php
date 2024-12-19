<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Payment;
/**
 * Class COD
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Payment
 */
class COD extends \Ventocart\System\Engine\Model
{
	/**
	 * @param array $address
	 *
	 * @return array
	 */
	public function getMethods(array $address = []): array
	{
		$this->load->language('extension/ventocart/payment/cod');

		if ($this->cart->hasSubscription()) {
			$status = false;
		} elseif (!$this->cart->hasShipping()) {
			$status = false;
		} elseif (!$this->config->get('config_checkout_payment_address')) {
			$status = true;
		} elseif (!$this->config->get('payment_cod_geo_zone_id')) {
			$status = true;
		} else {
			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone_to_geo_zone` WHERE `geo_zone_id` = '" . (int) $this->config->get('payment_cod_geo_zone_id') . "' AND `country_id` = '" . (int) $address['country_id'] . "' AND (`zone_id` = '" . (int) $address['zone_id'] . "' OR `zone_id` = '0')");

			if ($query->num_rows) {
				$status = true;
			} else {
				$status = false;
			}
		}

		$method_data = [];

		if ($status) {
			$option_data['cod'] = [
				'code' => 'cod.cod',
				'name' => $this->language->get('heading_title')
			];

			$method_data = [
				'code' => 'cod',
				'name' => $this->language->get('heading_title'),
				'option' => $option_data,
				'sort_order' => $this->config->get('payment_cod_sort_order')
			];
		}

		return $method_data;
	}
}
