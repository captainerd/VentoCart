<?php

namespace Ventocart\System\Library;
/**
 * Class Template
 */
class Template
{
	/**
	 * @var object
	 */
	private object $adaptor;

	/**
	 * Constructor
	 *
	 * @param string $adaptor
	 *
	 */
	public function __construct(string $adaptor)
	{
		$class = 'Ventocart\System\Library\Template\\' . $adaptor;

		if (class_exists($class)) {
			$this->adaptor = new $class();
		} else {
			throw new \Exception('Error: Could not load template adaptor ' . $adaptor . '!');
		}
	}

	/**
	 * addPath
	 *
	 * @param string $namespace
	 * @param string $directory
	 *
	 * @return void
	 */
	public function addPath(string $namespace, string $directory = ''): void
	{

		$this->adaptor->addPath($namespace, $directory);
	}

	/**
	 * Render
	 *
	 * @param string $filename
	 * @param array	 $data
	 * @param string $code
	 *
	 * @return string
	 */
	public function render(string $filename, array $data = [], string $code = ''): string
	{

		return $this->adaptor->render($filename, $data, $code);
	}
}
