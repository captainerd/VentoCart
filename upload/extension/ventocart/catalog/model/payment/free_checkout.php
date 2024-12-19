<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Payment;
/**
 * Class FreeCheckout
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Payment
 */
class FreeCheckout extends \Ventocart\System\Engine\Model
{
	/**
	 * @param array $address
	 *
	 * @return array
	 */
	public function getMethods(array $address = []): array
	{
		$this->load->language('extension/ventocart/payment/free_checkout');

		$total = $this->cart->getTotal();


		if ((float) $total <= 0.00) {
			$status = true;
		} elseif ($this->cart->hasSubscription()) {
			$status = false;
		} else {
			$status = false;
		}

		$method_data = [];

		if ($status) {
			$option_data['free_checkout'] = [
				'code' => 'free_checkout.free_checkout',
				'name' => $this->language->get('heading_title')
			];

			$method_data = [
				'code' => 'free_checkout',
				'name' => $this->language->get('heading_title'),
				'option' => $option_data,
				'sort_order' => $this->config->get('payment_free_checkout_sort_order')
			];
		}

		return $method_data;
	}
}
