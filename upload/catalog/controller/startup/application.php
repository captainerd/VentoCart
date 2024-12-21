<?php
namespace Ventocart\Catalog\Controller\Startup;
/**
 * Class Application
 *
 * @package Ventocart\Catalog\Controller\Startup
 */
class Application extends \Ventocart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		// Weight
		$this->registry->set('weight', new \Ventocart\System\Library\Cart\Weight($this->registry));

		// Length
		$this->registry->set('length', new \Ventocart\System\Library\Cart\Length($this->registry));

		// Cart
		$this->registry->set('cart', new \Ventocart\System\Library\Cart\Cart($this->registry));
	}
}