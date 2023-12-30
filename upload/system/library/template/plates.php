<?php
namespace Opencart\System\Library\Template;

use Opencart\System\Library\Template\Twig;

/**
 * Class Plates
 *
 * @package Opencart\System\Library\Template
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

	protected bool $convert = false;
	private $adaptor;
	/**
	 * Constructor
	 *
	 * @param    string  $adaptor
	 *
	 */
	public function __construct()
	{
		$this->root = substr(DIR_OPENCART, 0, -1);
	 

		$this->adaptor = new \League\Plates\Engine($this->root);
		 
	}

	/**
	 * addPath
	 *
	 * @param    string  $namespace
	 * @param    string  $directory
	 *
	 * @return	 void
	 */public function addPath(string $namespace, string $directory = ''): void
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
		if (!file_exists($file . '.php') && $this->convert == false) {
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

			//Run the conversion function
			if ($this->convert == true) {
				$this->deTwigfy($file);
			}
			// Return the rendered template
			return $this->adaptor->render($file, $data);
		} catch (\Plates\Error\SyntaxError $e) {
			throw new \Exception('Error: Could not load Plates template ' . $filename . '!');
		}

	}

	//A tea, a wig and two plates walk into foo-bar, helper function to convert twig to plates
	private function deTwigfy($filename)
	{
					/* Conversion:

					- No form post/action= or button/back submit, should be escaping, having $this->e($var)
					- No links that perform actions and hold get values should have $this->e()
					- Everything other MUST have $this->e() to improve secuirty against XSS attacks
					- language entries that hold html may ignore $this->e() 
					   this function ignores the above rules, inspection and debuging must be done manually.
					*/
 
		if (file_exists($filename . '.php')) {
			return;
		}

		if (!file_exists($filename . '.twig')) {
			return;
		}
		$deTwigfy = file_get_contents($filename . '.twig');

		$deTwigfy = preg_replace('/\{\{\s*\(\s*([^|\s]+)\s*\/\s*([^|\s]+)\s*\)\|round\s*\}\}/', '<?= $this->e(round($1 / $$2)) ?>', $deTwigfy);

		// Replace {% if x and x|batch(items)|length > x %}
		$deTwigfy = preg_replace('/\{%\s*if\s+(\w+)\s+and\s+(\w+)\|batch\((\w+)\)\|length\s*>\s*1\s*%\}/', '<?php if (!empty($$1) && count(array_chunk($$2, $$3)) > 1): ?>', $deTwigfy);

		$deTwigfy = preg_replace('/if \(\$([a-zA-Z_][a-zA-Z0-9_]*)\.([a-zA-Z_][a-zA-Z0-9_]*)\):/', 'if ($$1[\'$2\']):', $deTwigfy);
		$deTwigfy = preg_replace('/\$([a-zA-Z_][a-zA-Z0-9_]*)\.([a-zA-Z_][a-zA-Z0-9_]*)/', '$$1[\'$2\']', $deTwigfy);
		$deTwigfy = preg_replace('/\{%\s*if\s*([^\s]+)\s*or\s*([^\s]+)\s*%\}/', '<?php if ($1 || $2): ?>', $deTwigfy);
		$deTwigfy = preg_replace('/\{%\s*elseif\s*([^\s]+)\.([^\s]+)\s*and\s*([^\s]+)\.([^\s]+)\s*==\s*([^\s]+)\s*%\}/', '<?php elseif ($1[\'$2\'] && $3[\'$4\'] == $5): ?>', $deTwigfy);

		$deTwigfy = preg_replace('/\{%\s*for\s*([^\s]+)\s*in\s*([^\s]+)\.([^\s]+)\s*%\}/', '<?php foreach ($2[\'$3\'] as $1): ?>', $deTwigfy);
		$deTwigfy = preg_replace('/\{%\s*elseif\s*([^%]+)\s*%\}/', '<?php elseif ($1): ?>', $deTwigfy);

		// Replace {% if ... %}
		$deTwigfy = preg_replace('/\{%\s*if\s+([^\s]+)\s*%\}/', '<?php if ($$1): ?>', $deTwigfy);
		$deTwigfy = preg_replace('/\{%\s*if\s+(\w+)\s*==\s*0\s*%\}/', '<?php if ($$1 == 0): ?>', $deTwigfy);

		// Replace {% if not ... %}
		$deTwigfy = preg_replace('/\{%\s*if\s+not\s+([^\s]+)\s*%\}/', '<?php if (!$$1): ?>', $deTwigfy);

		// Replace {% else %}
		$deTwigfy = preg_replace('/\{%\s*else\s*%\}/', '<?php else: ?>', $deTwigfy);

		// Replace {% endif %}
		$deTwigfy = preg_replace('/\{%\s*endif\s*%\}/', '<?php endif; ?>', $deTwigfy);

		// Replace {% for ... %}
		$deTwigfy = preg_replace('/\{%\s*for\s+(\w+)\s+in\s+(\w+)\s*%\}/', '<?php foreach ($$2 as $$1): ?>', $deTwigfy);

		// Replace {% endfor %}
		$deTwigfy = preg_replace('/\{%\s*endfor\s*%\}/', '<?php endforeach; ?>', $deTwigfy);

		// Replace {{ variable|json }}
		$deTwigfy = preg_replace('/{{\s*([^|}]+)\s*\|\s*json\s*}}/', '<?= json_encode($1) ?>', $deTwigfy);

		// Replace {{ variable|js }}
		$deTwigfy = preg_replace('/{{\s*([^|}]+)\s*\|\s*js\s*}}/', '<?= json_encode($1, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>', $deTwigfy);

		// Replace {% set ... %}
		$deTwigfy = preg_replace('/\{%\s*set\s+(\w+)\s*=\s*(.+?)\s*%\}/', '<?php $$1 = $$2; ?>', $deTwigfy);

		// Replace {% for ... in ...|batch(...) %}
		$deTwigfy = preg_replace('/\{%\s*for\s+(\w+)\s+in\s+(\w+)\s*\|\s*batch\((\w+)\)\s*%\}/', '<?php foreach (array_chunk($$2, $$3) as $$1): ?>', $deTwigfy);

		$deTwigfy = preg_replace('/{{\s*([^}]+)\s*}}/', '<?= $this->e($$1) ?>', $deTwigfy);
		$deTwigfy = preg_replace('/\$this->e\((\$\w+)\.(\w+)\s*\)/', '$this->e($1[\'$2\'])', $deTwigfy);

		$deTwigfy = preg_replace('/<\?=\s+\$this->e\((\$[\w]+)\s*\|\s*escape\(\'js\'\)\s*\)\s+\?>/', '<?= $this->e($this->escapeJs($1)) ?>', $deTwigfy);

		$deTwigfy = preg_replace('/\{%\s*if\s*(.*?)\s*==\s*(.*?)\s*%\}/', '<?php if ($$1 == $$2): ?>', $deTwigfy);

		$deTwigfy = preg_replace('/\$([0-9]+)/', '$1', $deTwigfy);
		$deTwigfy = preg_replace('/<\?php\s+if\s+\((\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*(?:\[[\'a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\])*)\.([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*==\s*([^\s\)]+)\)\s*:\s*\?>/s', "<?php if (\$1['$2'] == $$3): ?>", $deTwigfy);

		$deTwigfy = preg_replace('/<\?php\s+if\s+\(([^;]+)\s+\|\|\s+([^;]+)\):\s*\?>/s', '<?php if ($$1 || $$2): ?>', $deTwigfy);

		//rebuild known blocks that do not need html escaping

		$deTwigfy = str_replace('$this->e($header )', ' $header   ', $deTwigfy);
		$deTwigfy = str_replace('$this->e($column_left )', ' $column_left ', $deTwigfy);
		$deTwigfy = str_replace('$this->e($content_top )', ' $content_top ', $deTwigfy);

		$deTwigfy = str_replace('$this->e($breadcrumb)', ' $breadcrumb ', $deTwigfy);

		$deTwigfy = str_replace('$this->e($content_bottom )', ' $content_bottom ', $deTwigfy);
		$deTwigfy = str_replace('$this->e($column_right )', ' $column_right ', $deTwigfy);
		$deTwigfy = str_replace('$this->e($footer )', ' $footer ', $deTwigfy);

		//artifacts - corrections
		$deTwigfy = preg_replace('/(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\.([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', '$1[\'$2\']', $deTwigfy);

		$deTwigfy = str_replace("$$'", "'", $deTwigfy);
		$deTwigfy = str_replace("$'", "'", $deTwigfy);
		$deTwigfy = str_replace("$$", "$", $deTwigfy);

		//foreach x as x
		$deTwigfy = preg_replace('/foreach\s*\(\s*(\w+)\s*\[\s*(\'[^\']+\')\s*\]\s*as\s*(\w+)\s*\)/', 'foreach ($$1[$2] as $$3)', $deTwigfy);
		file_put_contents($filename . '.php', $deTwigfy, LOCK_EX);

		return $filename;
	}


}
