<?php
namespace Ventocart\Admin\Model\Actions\Localisation;
/**
 * Class Currency
 *
 * @package Ventocart\Admin\Model\Actions\Localisation
 */
class Currency extends \Ventocart\System\Engine\Model
{
	/**
	 * @return void
	 */
	public function index(): array
	{
		$this->load->language('actions/localisation/currency');
		$this->load->model('actions/bridge/catalog');
		$this->model_actions_bridge_catalog->setup();

		$json = [];


		if (isset($this->request->post['currency'])) {
			$currency = (string) $this->request->post['currency'];
		} else {
			$currency = '';
		}

		$this->load->model('localisation/currency');

		$currency_info = $this->model_localisation_currency->getCurrencyByCode($currency);

		if (!$currency_info) {
			$json['error'] = $this->language->get('error_currency');
		}

		if (!$json) {
			$this->session->data['currency'] = $currency;

			$json['success'] = $this->language->get('text_success');
		}

		return $json;
	}
}
