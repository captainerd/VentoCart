<?php

namespace Ventocart\System\Engine;
/**
 * Class Controller
 *
 * @mixin \Ventocart\System\Engine\Registry
 */
class Controller
{
	/**
	 * @var object|\Ventocart\System\Engine\Registry
	 */
	protected $registry;
	protected $langdata;
	/**
	 * Constructor
	 *
	 * @param object $registry
	 */
	public function __construct(\Ventocart\System\Engine\Registry $registry)
	{
		$this->registry = $registry;
		$this->langdata = $this->registry->language->data;
	}
	/**
	 * __flush
	 *
	 *
	 * @return void
	 */
	public function __flush(): void
	{
		if ($this->langdata) {
			$this->registry->language->data = $this->langdata;
			$this->langdata = [];
		}
	}
	/**
	 * __get
	 *
	 * @param string $key
	 *
	 * @return object
	 */
	public function __get(string $key): object
	{
		if ($this->registry->has($key)) {
			return $this->registry->get($key);
		} else {
			throw new \Exception('Error: Could not call registry key ' . $key . '!');
		}
	}

	/**
	 * __set
	 *
	 * @param string $key
	 * @param object $value
	 *
	 * @return void
	 */
	public function __set(string $key, object $value): void
	{
		$this->data[$key] = $value;
	}
}
