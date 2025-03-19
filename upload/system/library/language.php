<?php

namespace Ventocart\System\Library;

/**
 * Class Language
 */
class Language
{
	/**
	 * @var string
	 */
	protected string $code;
	/**
	 * @var string
	 */
	protected string $directory;
	/**
	 * @var array
	 */
	protected array $path = [];
	/**
	 * @var array
	 */
	public array $data = [];
	/**
	 * @var array
	 */
	protected array $cache = [];

	/**
	 * Constructor
	 *
	 * @param string $code
	 */
	public function __construct(string $code)
	{
		$this->code = $code;
	}

	/**
	 * Add path to the language file lookup
	 *
	 * @param string $namespace
	 * @param string $directory
	 * @return void
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
	 * Get a language string by key
	 *
	 * @param string $key
	 * @return string
	 */
	public function get(string $key): string
	{
		return isset($this->data[$key]) ? $this->data[$key] : $key;
	}

	/**
	 * Set a language string by key and value
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function set(string $key, $value = ''): void
	{

		$this->data[$key] = $value;

	}

	/**
	 * Get all language strings with an optional prefix
	 *
	 * @param string $prefix
	 * @return array
	 */
	public function all(string $prefix = ''): array
	{
		if (!$prefix) {
			return $this->data;
		}

		$_ = [];
		$length = strlen($prefix);

		foreach ($this->data as $key => $value) {
			if (substr($key, 0, $length) == $prefix) {
				$_[substr($key, $length + 1)] = $value;
			}
		}

		return $_;
	}

	/**
	 * Clear all language data
	 *
	 * @return void
	 */
	public function clear(): void
	{
		$this->data = [];
	}

	/**
	 * Load language data from a file and cache it
	 *
	 * @param string $filename
	 * @param string $prefix
	 * @param string $code
	 * @return array
	 */
	public function load(string $filename, string $prefix = '', string $code = ''): array
	{
		if (!$code) {
			$code = $this->code;
		}

		if (!isset($this->cache[$code][$filename])) {
			$_ = [];
			$file = $this->directory . $code . '/' . $filename . '.php';


			if (is_file($file)) {
				require($file);
			}

			$this->cache[$code][$filename] = $_;
		} else {
			$_ = $this->cache[$code][$filename];
		}

		if ($prefix) {
			foreach ($_ as $key => $value) {
				$_[$prefix . '_' . $key] = $value;

			}
		}

		$this->data = $_ + $this->data;
		return $this->data;
	}




}
