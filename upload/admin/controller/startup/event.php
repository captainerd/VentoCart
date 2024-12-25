<?php
namespace Ventocart\Admin\Controller\Startup;
/**
 * Class Event
 *
 * @package Ventocart\Admin\Controller\Startup
 */
class Event extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		// Add events from the DB
		$this->load->model('setting/event');

		$results = $this->model_setting_event->getEvents();

		foreach ($results as $result) {
			if ($result['status']) {
				$part = explode('/', $result['trigger']);

				if ($part[0] == 'admin' || $part[0] == 'catalog') {
					array_shift($part);

					$this->event->register(implode('/', $part), new \Ventocart\System\Engine\Action($result['action']), $result['sort_order']);
				}


				if ($part[0] == 'system') {
					$this->event->register($result['trigger'], new \Ventocart\System\Engine\Action($result['action']), $result['sort_order']);
				}
			}
		}
	}
}