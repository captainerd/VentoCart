<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Total;
/**       
 * Class SubTotal
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Total
 */
class SubTotal extends \Ventocart\System\Engine\Model
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
		$this->load->language('extension/ventocart/total/sub_total');

		$sub_total = $this->cart->getSubTotal();



		$totals[] = [
			'extension' => 'ventocart',
			'code' => 'sub_total',
			'title' => $this->language->get('text_sub_total'),
			'value' => $sub_total,
			'sort_order' => (int) $this->config->get('total_sub_total_sort_order')
		];

		$total += $sub_total;
		return [$totals, $taxes, $total];
	}

}
