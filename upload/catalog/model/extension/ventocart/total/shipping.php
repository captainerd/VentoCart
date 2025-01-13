<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Total;
/**
 * Class Shipping
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Total
 */
class Shipping extends \Ventocart\System\Engine\Model
{
	/**
	 * @param array $totals
	 * @param array $taxes
	 * @param float $total
	 *
	 * @return array
	 */
	public function getTotal(array $totals, array $taxes, float $total): array
	{
		if ($this->cart->hasShipping() && isset($this->session->data['shipping_method'])) {
			$totals[] = [
				'extension' => 'ventocart',
				'code' => 'shipping',
				'title' => $this->session->data['shipping_method']['name'],
				'value' => $this->session->data['shipping_method']['cost'],
				'sort_order' => (int) $this->config->get('total_shipping_sort_order')
			];

			if (isset($this->session->data['shipping_method']['tax_class_id'])) {
				$tax_rates = $this->tax->getRates($this->session->data['shipping_method']['cost'], $this->session->data['shipping_method']['tax_class_id']);

				foreach ($tax_rates as $tax_rate) {
					if (!isset($taxes[$tax_rate['tax_rate_id']])) {
						$taxes[$tax_rate['tax_rate_id']] = $tax_rate['amount'];
					} else {
						$taxes[$tax_rate['tax_rate_id']] += $tax_rate['amount'];
					}
					if ($this->config->get('config_tax')) {
						$totals[count($totals) - 1]['value'] = $totals[count($totals) - 1]['value'] + $taxes[$tax_rate['tax_rate_id']];
					}
				}
			}


			$total += $this->session->data['shipping_method']['cost'];
		}
		return [$totals, $taxes, $total];
	}
}
