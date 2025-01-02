<?php
/**
 * @package        VentoCart
 * @author         Daniel Kerr
 * @copyright      Copyright (c) 2005 - 2022, VentoCart, Ltd. (https://www.ventocart.com/)
 * @license        https://opensource.org/licenses/GPL-3.0
 * @link           https://www.ventocart.com
 */
namespace Ventocart\System\Engine;

/**
 * Class Loader
 *
 * @mixin \Ventocart\System\Engine\Registry
 */
class Loader
{
	/**
	 * @var object|\Ventocart\System\Engine\Registry
	 */
	protected $registry;

	/**
	 * Constructor
	 *
	 * @param object $registry
	 */
	public function __construct(\Ventocart\System\Engine\Registry $registry)
	{
		$this->registry = $registry;
	}

	/**
	 * __get
	 *
	 * https://www.php.net/manual/en/language.oop5.overloading.php#object.get
	 *
	 * @param string $key
	 *
	 * @return object
	 */
	public function __get(string $key): object
	{
		return $this->registry->get($key);
	}

	/**
	 * __set
	 *
	 * https://www.php.net/manual/en/language.oop5.overloading.php#object.set
	 *
	 * @param string $key
	 * @param object $value
	 *
	 * @return void
	 */
	public function __set(string $key, object $value): void
	{
		$this->registry->set($key, $value);
	}

	/**
	 * Controller
	 *
	 * https://wiki.php.net/rfc/variadics
	 *
	 * @param string $route
	 * @param mixed  $args
	 *
	 * @return mixed
	 */
	public function controller(string $route, ...$args)
	{
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_|\/\.]/', '', str_replace('|', '.', $route));

		$trigger = $route;

		// Trigger the pre events
		$this->event->trigger('controller/' . $trigger . '/before', [&$route, &$args]);

		// Keep the original trigger
		$action = new \Ventocart\System\Engine\Action($route);

		while ($action) {
			// Execute action
			$output = $action->execute($this->registry, $args);

			// Make action a non-object so it's not infinitely looping
			$action = '';

			// Action object returned then we keep the loop going
			if ($output instanceof \Ventocart\System\Engine\Action) {
				$action = $output;
			}
		}

		// Trigger the post events
		$this->event->trigger('controller/' . $trigger . '/after', [&$route, &$args, &$output]);

		return $output;
	}

	/**
	 * Model
	 *
	 * @param string $route
	 *
	 * @return void
	 */
	public function model(string $route): void
	{
		$key = 'model_' . str_replace('/', '_', $route);

		if (!$this->registry->has($key)) {
			$className = 'Ventocart\\' . $this->config->get('application') . '\\Model\\' . str_replace(['_', '/'], ['', '\\'], ucwords($route, '_/'));

			if (class_exists($className)) {
				$proxy = new \Ventocart\System\Engine\Proxy();
				$instance = new $className($this->registry);
				$methods = get_class_methods($className);

				foreach ($methods as $method) {
					if (substr($method, 0, 2) != '__' && is_callable([$instance, $method])) {
						$proxy->{$method} = function (&...$args) use ($route, $method, $instance) {
							$trigger = $route . '/' . $method;
							$this->event->trigger('model/' . $trigger . '/before', [&$route, &$args]);
							$output = call_user_func_array([$instance, $method], $args);
							$this->event->trigger('model/' . $trigger . '/after', [&$route, &$args, &$output]);
							return $output;
						};
					}
				}

				$proxy->__call = function ($method, $args) use ($instance) {
					if (method_exists($instance, $method)) {
						return call_user_func_array([$instance, $method], $args);
					}
					throw new \BadMethodCallException("Method $method not found in the model.");
				};

				$this->registry->set($key, $proxy);
			} else {
				throw new \Exception('Error: Could not load model ' . $className . '!');
			}
		}
	}

	/**
	 * View
	 *
	 * Loads the template file and generates the html code.
	 *
	 * @param string $route
	 * @param array  $data
	 * @param string $code
	 *
	 * @return string
	 */
	public function view(string $route, array $data = [], string $code = ''): string
	{
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', $route);

		$trigger = $route;

		$output = '';

		// Trigger the pre events
		$this->event->trigger('view/' . $trigger . '/before', [&$route, &$data, &$code, &$output]);

		if (!$output) {
			// Make sure it's only the last event that returns an output if required.
			$output = $this->template->render($route, $data, $code);
		}

		// Trigger the post events
		$this->event->trigger('view/' . $trigger . '/after', [&$route, &$data, &$output]);

		return $output;
	}

	/**
	 * Language
	 *
	 * @param string $route
	 * @param string $prefix
	 * @param string $code
	 *
	 * @return array
	 */
	public function language(string $route, string $prefix = '', string $code = ''): array
	{
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\-\/]/', '', $route);

		$trigger = $route;

		// Trigger the pre events
		$this->event->trigger('language/' . $trigger . '/before', [&$route, &$prefix, &$code]);

		$output = $this->language->load($route, $prefix, $code);

		// Trigger the post events
		$this->event->trigger('language/' . $trigger . '/after', [&$route, &$prefix, &$code, &$output]);

		return $output;
	}

	/**
	 * Library
	 *
	 * @param string $route
	 *
	 * @return void
	 */
	public function library(string $route, &...$args): object
	{
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', $route);

		// Create a new key to store the model object
		$key = 'library_' . str_replace('/', '_', $route);

		if (!$this->registry->has($key)) {
			// Initialize the class
			$library = $this->factory->library($route, $args);

			// Store object
			$this->registry->set($key, $library);
		} else {
			$library = $this->registry->get($key);
		}

		return $library;
	}

	/**
	 * Config
	 *
	 * @param string $route
	 *
	 * @return array
	 */
	public function config(string $route): array
	{
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\-\/]/', '', $route);

		$trigger = $route;

		// Trigger the pre events
		$this->event->trigger('config/' . $trigger . '/before', [&$route]);

		$output = $this->config->load($route);

		// Trigger the post events
		$this->event->trigger('config/' . $trigger . '/after', [&$route, &$output]);

		return $output;
	}

	/**
	 * Helper
	 *
	 * @param string $route
	 *
	 * @return void
	 */
	public function helper(string $route): void
	{
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', $route);

		if (!str_starts_with($route, 'extension/')) {
			$file = DIR_SYSTEM . 'helper/' . $route . '.php';
		} else {
			$parts = explode('/', substr($route, 10));

			$code = array_shift($parts);

			$file = DIR_EXTENSION . $code . '/system/helper/' . implode('/', $parts) . '.php';
		}

		if (is_file($file)) {
			include_once($file);
		} else {
			throw new \Exception('Error: Could not load helper ' . $route . '!');
		}
	}

	/**
	 * Bridge
	 *
	 * @param string $NameSpace
	 * 
	 * @return void
	 */
	public function bridge(string $NameSpace): void
	{

		$bridge = new \Ventocart\System\Engine\Bridge($this->registry, $NameSpace);
		$this->registry->set('bridge', $bridge);
		;
	}

}
