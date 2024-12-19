<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Total;
/**
 * Class Total
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Total
 */
class Total extends \Ventocart\System\Engine\Model
{
	/**
	 * @param array $totals
	 * @param array $taxes
	 * @param float $total
	 *
	 * @return void
	 */
	public function getTotal(array $totals, array $taxes, float $total): array
	{
		$this->load->language('extension/ventocart/total/total');

		$totals[] = [
			'extension' => 'ventocart',
			'code' => 'total',
			'title' => $this->language->get('text_total'),
			'value' => $total,
			'sort_order' => (int) $this->config->get('total_total_sort_order')
		];
		return [$totals, $taxes, $total];
	}
}
