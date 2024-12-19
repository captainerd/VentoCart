<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Total;
/**
 * Class Handling
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Total
 */
class Handling extends \Ventocart\System\Engine\Model
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
		if (($this->cart->getSubTotal() > (float) $this->config->get('total_handling_total')) && ($this->cart->getSubTotal() > 0)) {
			$this->load->language('extension/ventocart/total/handling');

			$totals[] = [
				'extension' => 'ventocart',
				'code' => 'handling',
				'title' => $this->language->get('text_handling'),
				'value' => (float) $this->config->get('total_handling_fee'),
				'sort_order' => (int) $this->config->get('total_handling_sort_order')
			];

			if ($this->config->get('total_handling_tax_class_id')) {
				$tax_rates = $this->tax->getRates((float) $this->config->get('total_handling_fee'), (int) $this->config->get('total_handling_tax_class_id'));

				foreach ($tax_rates as $tax_rate) {
					if (!isset($taxes[$tax_rate['tax_rate_id']])) {
						$taxes[$tax_rate['tax_rate_id']] = $tax_rate['amount'];
					} else {
						$taxes[$tax_rate['tax_rate_id']] += $tax_rate['amount'];
					}
				}
			}

			$total += (float) $this->config->get('total_handling_fee');
		}
		return [$totals, $taxes, $total];
	}
}
