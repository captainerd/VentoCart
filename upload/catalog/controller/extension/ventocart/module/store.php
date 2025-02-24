<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Store
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Store extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): mixed
	{
		$status = true;

		if ($this->config->get('module_store_admin')) {
			$this->user = new \Ventocart\System\Library\Cart\User($this->registry);

			$status = $this->user->isLogged();
		}

		if ($status) {
			$this->load->language('extension/ventocart/module/store');

			$data['stores'] = [];

			$data['stores'][] = [

				'name' => $this->language->get('text_default'),
				'url' => HTTP_SERVER . 'index.php?route=common/home&session_id=' . $this->session->getId()
			];

			$this->load->model('setting/store');

			$results = $this->model_setting_store->getStores();

			foreach ($results as $result) {
				$data['stores'][] = [

					'name' => $result['name'],
					'url' => $result['url'] . 'index.php?route=common/home&session_id=' . $this->session->getId()
				];
			}

			return $this->load->view('extension/ventocart/module/store', $data);



		} else {
			return '';
		}
	}
}
