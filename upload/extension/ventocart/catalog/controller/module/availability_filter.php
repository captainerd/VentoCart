<?php
namespace Opencart\Catalog\Controller\Extension\VentoCart\Module;
/**
 * Class Filter
 *
 * @package Opencart\Catalog\Controller\Extension\VentoCart\Module
 */
class Availabilityfilter extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {


			$this->load->language('extension/ventocart/module/option_filter');
        	$data['language'] = $this->config->get('config_language');
  
			$data['selected_availabilities'] = [];

			if (isset($this->request->get['filter_availability'])) {
				$data['selected_availabilities'] = $this->request->get['filter_availability'];
			}
			$this->load->model('catalog/product');

			$this->load->model('extension/ventocart/module/availability_filter');
			$data['statuses'] = $this->model_extension_ventocart_module_availability_filter->getStatuses();
			 

				return $this->load->view('extension/ventocart/module/availability_filter', $data);
		 
	}
}
