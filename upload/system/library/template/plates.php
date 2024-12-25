<?php
namespace Ventocart\System\Library\Template;

use Ventocart\System\Library\Template\Twig;

/**
 * Class Plates
 *
 * @package Ventocart\System\Library\Template
 */
class Plates
{
	/**
	 * @var string
	 */
	protected string $root;
	/**
	 * @var object|\Twig\Loader\FilesystemLoader
	 */
	protected object $loader;
	/**
	 * @var string
	 */
	protected string $directory;
	/**
	 * @var array
	 */
	protected array $path = [];

	private $adaptor;
	/**
	 * Constructor
	 *
	 * @param    string  $adaptor
	 *
	 */
	public function __construct()
	{
		$this->root = substr(DIR_VENTOCART, 0, -1);


		$this->adaptor = new \League\Plates\Engine($this->root);

	}

	/**
	 * addPath
	 *
	 * @param    string  $namespace
	 * @param    string  $directory
	 *
	 * @return	 void
	 */
	public function addPath(string $namespace, string $directory = ''): void
	{
		if (!$directory) {
			$this->directory = $namespace;
		} else {
			$this->path[$namespace] = $directory;
		}
	}

	/**
	 * Render
	 *
	 * @param	string	$filename
	 * @param	array	$data
	 * @param	string	$code
	 *
	 * @return	string
	 */
	public function render(string $filename, array $data = [], string $code = ''): string
	{

		$file = $this->directory . $filename;
		$namespace = '';

		$parts = explode('/', $filename);

		foreach ($parts as $part) {
			if (!$namespace) {
				$namespace .= $part;
			} else {
				$namespace .= '/' . $part;
			}

			if (isset($this->path[$namespace])) {
				$file = $this->path[$namespace] . substr($filename, strlen($namespace) + 1);
			}
		}


		$file = substr($file, strlen($this->root) + 1);

		//If Plates Template file doesn't exists call fail over to twig
		if (!file_exists(DIR_VENTOCART . '/' . $file . '.php')) {

			if ($code) {
				// render from modified template code
				$loader = new \Twig\Loader\ArrayLoader([$file => $code]);
			} else {
				$loader = new \Twig\Loader\FilesystemLoader('/', $this->root);
			}
			try {
				// Initialize Twig environment
				$config = [
					'charset' => 'utf-8',
					'autoescape' => false,
					'debug' => true,
					'auto_reload' => true,
					'cache' => DIR_CACHE . 'template/'
				];
				$twig = new \Twig\Environment($loader, $config);

				if ($config['debug']) {
					$twig->addExtension(new \Twig\Extension\DebugExtension());
				}
				return $twig->render($file . '.twig', $data);
			} catch (\Plates\Error\SyntaxError $e) {
				throw new \Exception('Error: Could not load twig template ' . $filename . '!');
			}


		}
		try {

			// Return the rendered template
			return $this->adaptor->render($file, $data);
		} catch (\Plates\Error\SyntaxError $e) {
			throw new \Exception('Error: Could not load Plates template ' . $filename . '!');
		}

	}

}
