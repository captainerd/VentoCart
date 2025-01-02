<?php
namespace Ventocart\Catalog\Controller\Startup;
/**
 * Class Event
 *
 * @package Ventocart\Catalog\Controller\Startup
 */
class Event extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{

		if (
			$this->request->get['route'] == 'common/home' || empty($this->request->get['route'])
			|| $this->request->get['route'] == 'product/product'
			|| $this->request->get['route'] == 'product/category'
		) {
			return;
		}
		// Add events from the DB
		$this->load->model('setting/event');

		$results = $this->model_setting_event->getEvents();

		foreach ($results as $result) {
			$part = explode('/', $result['trigger']);

			if ($part[0] == 'catalog') {
				array_shift($part);

				$this->event->register(implode('/', $part), new \Ventocart\System\Engine\Action($result['action']), $result['sort_order']);
			}

			if ($part[0] == 'system') {
				$this->event->register($result['trigger'], new \Ventocart\System\Engine\Action($result['action']), $result['sort_order']);
			}
		}
	}
}