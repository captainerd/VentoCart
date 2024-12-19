<?php
namespace Ventocart\Admin\Model\Actions\Sale;
/**
 * Class Reward
 *
 * @package Ventocart\Admin\Model\Actions\Sale
 */
class Reward extends \Ventocart\System\Engine\Model
{
	/**
	 * @return void
	 */
	public function index(): array
	{
		$this->load->language('actions/sale/reward');

		$json = [];

		if (isset($this->request->post['reward'])) {
			$reward = abs((int) $this->request->post['reward']);
		} else {
			$reward = 0;
		}

		$available = $this->customer->getRewardPoints();

		$points_total = 0;

		foreach ($this->cart->getProducts() as $product) {
			if ($product['points']) {
				$points_total += $product['points'];
			}
		}

		if ($reward) {
			if ($reward > $available) {
				$json['error'] = sprintf($this->language->get('error_points'), $this->request->post['reward']);
			}

			if ($reward > $points_total) {
				$json['error'] = sprintf($this->language->get('error_maximum'), $points_total);
			}
		}

		if (!$json) {
			if ($reward) {
				$json['success'] = $this->language->get('text_success');

				$this->session->data['reward'] = $reward;
			} else {
				$json['success'] = $this->language->get('text_remove');

				unset($this->session->data['reward']);
			}
		}
		return $json;
	}

	/**
	 * @return void
	 */
	public function maximum(): array
	{
		$this->load->language('actions/sale/reward');

		$json = [];

		$json['maximum'] = 0;

		foreach ($this->cart->getProducts() as $product) {
			if ($product['points']) {
				$json['maximum'] += $product['points'];
			}
		}

		return $json;
	}

	/**
	 * @return void
	 */
	public function available(): array
	{

		return ['points' => $this->customer->getRewardPoints()];
	}
}
