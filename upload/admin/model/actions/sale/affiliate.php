<?php
namespace Ventocart\Admin\Model\Actions\Sale;
/**
 * Class Affiliate
 *
 * @package Ventocart\Admin\Model\Actions\Sale
 */
class Affiliate extends \Ventocart\System\Engine\Model
{
	/**
	 * @return void
	 */
	public function index(): array
	{
		$this->load->language('actions/sale/affiliate');
		$this->load->model('actions/bridge/catalog');
		$this->model_actions_bridge_catalog->setup();

		$json = [];

		if (isset($this->request->post['affiliate_id'])) {
			$affiliate_id = (int) $this->request->post['affiliate_id'];
		} else {
			$affiliate_id = 0;
		}

		if ($affiliate_id) {

			$this->load->model('account/affiliate');

			$affiliate_info = $this->model_account_affiliate->getAffiliate($affiliate_id);

			if (!$affiliate_info) {
				$json['error'] = $this->language->get('error_affiliate');
			}
		}

		if (!$json) {
			if ($affiliate_id) {
				$json['success'] = $this->language->get('text_success');

				$this->session->data['affiliate_id'] = $affiliate_id;
			} else {
				$json['success'] = $this->language->get('text_remove');

				unset($this->session->data['affiliate_id']);
			}
		}

		return $json;
	}
}