<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Total;
/**
 * Class LowOrderFee
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Total
 */
class LowOrderFee extends \Ventocart\System\Engine\Model
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
		if ($this->cart->getSubTotal() && ($this->cart->getSubTotal() < (float) $this->config->get('total_low_order_fee_total'))) {
			$this->load->language('extension/ventocart/total/low_order_fee');

			$totals[] = [
				'extension' => 'ventocart',
				'code' => 'low_order_fee',
				'title' => $this->language->get('text_low_order_fee'),
				'value' => (float) $this->config->get('total_low_order_fee_fee'),
				'sort_order' => (int) $this->config->get('total_low_order_fee_sort_order')
			];

			if ($this->config->get('total_low_order_fee_tax_class_id')) {
				$tax_rates = $this->tax->getRates($this->config->get('total_low_order_fee_fee'), $this->config->get('total_low_order_fee_tax_class_id'));

				foreach ($tax_rates as $tax_rate) {
					if (!isset($taxes[$tax_rate['tax_rate_id']])) {
						$taxes[$tax_rate['tax_rate_id']] = $tax_rate['amount'];
					} else {
						$taxes[$tax_rate['tax_rate_id']] += $tax_rate['amount'];
					}
				}
			}

			$total += $this->config->get('total_low_order_fee_fee');
		}
		return [$totals, $taxes, $total];
	}
}
