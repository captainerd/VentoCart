<?php
namespace Ventocart\Admin\Model\Actions\Sale;
/**
 * Class Coupon
 *
 * @package Ventocart\Admin\Model\Actions\Sale
 */
class Coupon extends \Ventocart\System\Engine\Model
{
	/**
	 * @return void
	 */
	public function index(): array
	{
		$this->load->language('actions/sale/coupon');
		$this->load->bridge('Catalog');

		$json = [];

		if (isset($this->request->post['coupon'])) {
			$coupon = (string) $this->request->post['coupon'];
		} else {
			$coupon = '';
		}

		if ($coupon) {
			$this->laod->model('marketing/coupon');

			$coupon_info = $this->model_marketing_coupon->getCoupon($coupon);

			if (!$coupon_info) {
				$json['error'] = $this->language->get('error_coupon');
			}
		}

		if (!$json) {
			if ($coupon) {
				$json['success'] = $this->language->get('text_success');

				$this->session->data['coupon'] = $coupon;
			} else {
				$json['success'] = $this->language->get('text_remove');

				unset($this->session->data['coupon']);
			}
		}

		return $json;
	}
}
