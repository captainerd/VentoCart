<?php

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
	protected $namespace;

	/**
	 * Constructor
	 *
	 * @param object $registry
	 */
	public function __construct(\Ventocart\System\Engine\Registry $registry)
	{
		$this->registry = $registry;

		$this->namespace = strtolower(APPLICATION) . "/";
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
		// Sanitize the route
		$route = preg_replace('/[^a-zA-Z0-9_|\/\.]/', '', str_replace('|', '.', $route));
		$key = 'controller_' . str_replace('/', '_', $route);
		$method = 'index';

		// Check if the controller is already loaded in the registry
		if (!$this->registry->has($key)) {
			$className = 'Ventocart\\' . $this->config->get('application') . '\\Controller\\' . str_replace(['_', '/'], ['', '\\'], ucwords($route, '_/'));
			$className = explode('.', $className);
			$method = end($className);

			if (count($className) == 1) {
				$method = 'index';
			}
			$className = $className[0];
			if (class_exists($className)) {

				$controller = new $className($this->registry);

				// Wrap the controller instance with the ControllerWrapper
				$wrappedController = new \Ventocart\System\Engine\Wrapper($controller, $route, $this->registry);

				$this->registry->set($key, $wrappedController);
			}
		} else {
			$wrappedController = $this->registry->get($key);
		}
		if (isset($wrappedController)) {
			return $wrappedController->$method(...$args);
		}
	}


	/**
	 * Model
	 *
	 * @param string $route
	 *
	 * @return void
	 */
	public function model(string $route)
	{
		$key = 'model_' . str_replace('/', '_', $route);


		// Check if the model is already loaded in the registry
		if (!$this->registry->has($key)) {
			$className = 'Ventocart\\' . $this->config->get('application') . '\\Model\\' . str_replace(['_', '/'], ['', '\\'], ucwords($route, '_/'));

			// Load the model if it exists
			if (class_exists($className)) {
				$instance = new $className($this->registry);
				// Wrap the instance with the ModelWrapper
				$wrappedInstance = new \Ventocart\System\Engine\Wrapper($instance, $route, $this->registry);

				// Store the wrapped instance in the registry
				$this->registry->set($key, $wrappedInstance);
			} else {
				throw new \Exception('Error: Could not load model ' . $className . '!');
			}
		}

		// Retrieve and return the wrapped model instance
		return $this->registry->get($key);
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


		$this->registry->event->trigger($route . "/before", [&$data]);
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', $route);
		$language_keys = $this->language->all();
		$data = array_merge($language_keys, $data);

		$output = $this->template->render($route, $data, $code);

		$this->registry->event->trigger($route . "/after", [&$output]);

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
		if (empty($code)) {
			$code = $this->config->get('config_language');
		}

		$output = $this->language->load($route, $prefix, $code);

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


		$output = $this->config->load($route);


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

	}



}
