<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Total;
/**
 * Class Tax
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Total
 */
class Tax extends \Ventocart\System\Engine\Model
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
		foreach ($taxes as $key => $value) {
			if ($value > 0) {
				$totals[] = [
					'extension' => 'ventocart',
					'code' => 'tax',
					'title' => $this->language->get($this->tax->getRateName($key)),
					'value' => $value,
					'sort_order' => (int) $this->config->get('total_tax_sort_order')
				];

				$total += $value;
			}
		}
		return [$totals, $taxes, $total];
	}
}
