<?php
namespace Ventocart\Catalog\Controller\Extension\VentoCart\Module;
/**
 * Class Filter
 *
 * @package Ventocart\Catalog\Controller\Extension\VentoCart\Module
 */
class Availabilityfilter extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return mixed
	 */
	public function index(): mixed
	{

		$this->load->language('extension/ventocart/module/availability_filter');
		$data['language'] = $this->config->get('config_language');

		$data['selected_availabilities'] = [];
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string) $this->request->get['path']);
		} else {
			$this->request->get['path'] = '';
			$parts = [];
		}

		$category_id = end($parts);
		if (isset($this->request->get['filter_availability'])) {
			$data['selected_availabilities'] = $this->request->get['filter_availability'];
		}

		$this->load->model('extension/ventocart/module/availability_filter');

		$data['statuses'] = $this->model_extension_ventocart_module_availability_filter->getStatuses($category_id);


		return $this->load->view('extension/ventocart/module/availability_filter', $data);


	}
}
