<?php
/**
 * @package     VentoCart
 * @author      Daniel Kerr
 * @copyright   Copyright (c) 2005 - 2017, VentoCart, Ltd. (https://www.ventocart.com/)
 * @license     https://opensource.org/licenses/GPL-3.0
 * @link        https://www.ventocart.com
 */
namespace Ventocart\System\Engine;
/**
 * Class Action
 *
 * @package Ventocart\System\Engine
 */
class Action
{
	/**
	 * @var string
	 */
	private string $route;

	/**
	 * @var string
	 */
	private string $method;

	/**
	 * Constructor
	 *
	 * @param string $route
	 */
	public function __construct(string $route)
	{
		$route = preg_replace('/[^a-zA-Z0-9_|\/\.]/', '', $route);

		$pos = strrpos($route, '.');

		if ($pos !== false) {
			$this->route = substr($route, 0, $pos);
			$this->method = substr($route, $pos + 1);
		} else {
			$this->route = $route;
			$this->method = 'index';
		}
	}

	/**
	 * getId
	 *
	 * @return string
	 *
	 */
	public function getId(): string
	{
		return $this->route;
	}

	/**
	 * Execute the controller action
	 *
	 * @param \Ventocart\System\Engine\Registry $registry
	 * @param array $args
	 * @return mixed|\Exception
	 */
	public function execute(\Ventocart\System\Engine\Registry $registry, array &$args = [])
	{
		// Stop any magical methods being called
		if (substr($this->method, 0, 2) == '__') {
			return new \Exception('Error: Calls to magic methods are not allowed!');
		}

		// Create a key to store the controller object
		$key = 'controller_' . str_replace('/', '_', $this->route);


		try {
			$controller = $registry->get($key) ?? $this->initializeController($registry, $key);

			$callable = [$controller, $this->method];

			if (is_callable($callable)) {
				return call_user_func_array($callable, $args);
			} else {




				return new \Exception('Error: Could not call route ' . $this->route . '!');
			}
		} catch (\Exception $e) {
			return $e;
		}
	}

	/**
	 * Initialize the controller and store it in the registry
	 *
	 * @param \Ventocart\System\Engine\Registry $registry
	 * @param string $key
	 * @return object|\Exception
	 */
	private function initializeController(\Ventocart\System\Engine\Registry $registry, string $key)
	{
		$bridge = $registry->get('bridgeLive'); // Get the bridge if it exists

		if ($bridge) {

			try {
				// Use bridge to load the controller
				$controller = $bridge->controllerInstance($this->route);
				$registry->set($key, $controller);
				return $controller;
			} catch (\Exception $e) {

				return $e; // Return the exception
			}
		} else {
			try {
				$controller = $registry->get('factory')->controller($this->route);
				$registry->set($key, $controller);

				return $controller;
			} catch (\Exception $e) {
				return $e; // Return the exception
			}
		}
	}
}
