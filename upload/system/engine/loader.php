<?php

namespace Ventocart\System\Engine;

use Ventocart\Admin\Controller\Error\Exception;


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
	 * @param string $route
	 * @param mixed  $args
	 *
	 * @return mixed
	 */

	public function controller(string $route, ...$args)
	{
		$key = 'controller_' . $route;
		$method = 'index';
		if (strpos($route, '.') !== false) {
			[$route, $method] = explode('.', $route, 2); // Extract method from route
		}

		if (!$this->registry->has($key)) {
			$controller = $this->factory->controller($route);
			$this->registry->set($key, $controller);

		} else {
			$controller = $this->registry->get($key);
		}

		if (isset($controller)) {
			if (!method_exists($controller, $method)) {
				throw new \Exception("Method '$method' not found in controller '$route'");
			}

			$this->registry->event->trigger($this->config->get('application') . '/controller/' . $route . '/before', [&$args]);

			$output = $controller->$method(...$args);
			$controller->__flush();

			$this->registry->event->trigger($this->config->get('application') . '/controller/' . $route . '/after', [&$args, &$output]);
			return $output;
		}

		return $this->controller('error/not_found');
	}


	/**
	 * postrender
	 *
	 * Finds any placeholder directives like [plugin=information/contact]
	 * and replaces them with the rendered output of the specified controller.
	 *
	 * @param array $data
	 * @return array
	 */
	protected function postrender(array $data): array
	{
		if (APPLICATION === 'Admin') {
			return $data;
		}

		array_walk_recursive($data, function (&$value) {
			if (is_string($value) && preg_match_all('/\[plugin=([^,\]]+)([^]]*)\]/', $value, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $match) {
					// Remove spaces after commas and clean the string
					$match[2] = trim(html_entity_decode($match[2]), ',');
					// If there's more than one argument, split it by commas
					$params = empty($match[2]) ? [] : explode(',', $match[2]);
					$params = array_map(function ($p) {
						return trim(preg_replace('/^[\p{Z}\s\xA0]+|[\p{Z}\s\xA0]+$/u', '', $p));
					}, $params);

					// Handle controller call
					try {
						$result = $this->load->controller($match[1], ...$params);
					} catch (\Exception $e) {
						$result = '';
					}
					// Replace the plugin tag with the result
					if ($result) {
						$value = str_replace($match[0], $result, $value);
					}
				}
			}
		});

		return $data;
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
			$model = $this->factory->model($route);
			// Wrap the instance with the ModelWrapper
			$wrappedInstance = new \Ventocart\System\Engine\Wrapper($model, $route, $this->registry);
			// Store the wrapped instance in the registry
			$this->registry->set($key, $wrappedInstance);
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
		// Apply postrender controller injection before rendering
		$data = $this->postrender($data);

		$this->registry->event->trigger($this->config->get('application') . '/view/' . $route . '/before', [&$data]);
		$output = $this->template->render($route, $data + $this->language->data, $code);
		$this->registry->event->trigger($this->config->get('application') . '/view/' . $route . '/after', [&$args, &$output]);
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

		if (empty($code)) {
			$code = $this->config->get('config_language');
		}

		return $this->language->load($route, $prefix, $code);


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
		// Create a new key to store the model object
		$key = 'library_' . $route;

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
