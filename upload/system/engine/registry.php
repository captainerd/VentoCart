<?php
/**
 * @package		VentoCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2022, VentoCart, Ltd. (https://www.ventocart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.ventocart.com
 */
namespace Ventocart\System\Engine;
/**
 * Class Registry
 *
 * @property \Ventocart\System\Engine\Config $config
 * @property \Ventocart\System\Engine\Event $event
 * @property \Ventocart\System\Engine\Loader $load
 * @property \Ventocart\System\Engine\Registry $autoloader
 * @property \Ventocart\System\Library\Cache $cache
 * @property \Ventocart\System\Library\Cart\Cart $cart
 * @property \Ventocart\System\Library\Cart\Currency $currency
 * @property \Ventocart\System\Library\Cart\Customer $customer
 * @property \Ventocart\System\Library\Cart\Length $length
 * @property \Ventocart\System\Library\Cart\Tax $tax
 * @property \Ventocart\System\Library\Cart\Weight $weight
 * @property \Ventocart\System\Library\DB $db
 * @property \Ventocart\System\Library\Document $document
 * @property \Ventocart\System\Library\Language $language
 * @property \Ventocart\System\Library\Log $log
 * @property \Ventocart\System\Library\Request $request
 * @property \Ventocart\System\Library\Response $response
 * @property \Ventocart\System\Library\Session $session
 * @property \Ventocart\System\Library\Template $template
 * @property \Ventocart\System\Library\Url $url
 * @property ?\Ventocart\System\Library\Cart\User $user
 */
class Registry
{
	/**
	 * @var array
	 */
	private array $data = [];

	/**
	 * __get
	 *
	 * https://www.php.net/manual/en/language.oop5.overloading.php#object.get
	 *
	 * @param string $key
	 *
	 * @return ?object
	 */
	public function __get(string $key): ?object
	{
		return $this->get($key);
	}

	/**
	 * __set
	 *
	 * https://www.php.net/manual/en/language.oop5.overloading.php#object.set
	 *
	 * @param string $key
	 * @param object $value
	 *
	 * @return   void
	 */
	public function __set(string $key, object $value): void
	{
		$this->set($key, $value);
	}

	/**
	 * __isset
	 *
	 * https://www.php.net/manual/en/language.oop5.overloading.php#object.set
	 *
	 * @param string $key
	 *
	 * @return bool
	 */
	public function __isset(string $key): bool
	{
		return $this->has($key);
	}

	/**
	 * Get
	 *
	 * @param string $key
	 *
	 * @return ?object
	 */
	public function get(string $key): ?object
	{
		return isset($this->data[$key]) ? $this->data[$key] : null;
	}

	/**
	 * Set
	 *
	 * @param string $key
	 * @param object $value
	 *
	 * @return void
	 */
	public function set(string $key, object $value): void
	{
		$this->data[$key] = $value;
	}

	/**
	 * Has
	 *
	 * @param string $key
	 *
	 * @return bool
	 */
	public function has(string $key): bool
	{
		return isset($this->data[$key]);
	}

	/**
	 * Unset
	 *
	 * Unsets registry value by key.
	 *
	 * @param string $key
	 *
	 * @return void
	 */
	public function unset(string $key): void
	{
		unset($this->data[$key]);
	}
}
