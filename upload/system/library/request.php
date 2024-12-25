<?php
/**
 * @package        VentoCart
 * @author         Daniel Kerr
 * @copyright      Copyright (c) 2005 - 2022, VentoCart, Ltd. (https://www.ventocart.com/)
 * @license        https://opensource.org/licenses/GPL-3.0
 * @link           https://www.ventocart.com
 */
namespace Ventocart\System\Library;
/**
 * Class Request
 */
class Request
{
	/**
	 * @var array
	 */
	public array $get = [];
	/**
	 * @var array
	 */
	public array $post = [];
	/**
	 * @var array
	 */
	public array $cookie = [];
	/**
	 * @var array
	 */

	public array $headers = [];
	/**
	 * @var array
	 */

	public array $files = [];
	/**
	 * @var array
	 */
	public array $server = [];

	/**
	 * Constructor
	 */

	public function __construct()
	{
		$this->get = $this->clean($_GET);
		$this->post = $this->clean($_POST);
		$this->cookie = $this->clean($_COOKIE);
		$this->files = $this->clean($_FILES);
		$this->server = $this->clean($_SERVER);
		$this->headers = $this->clean($this->getHeaders());
	}


	private function getHeaders()
	{

		$headers = [];
		foreach ($_SERVER as $key => $value) {
			if (substr($key, 0, 5) === 'HTTP_') {
				$headerName = substr($key, 5);
				$headers[$headerName] = $value;
			}
		}
		return $headers;

	}

	/**
	 * Clean
	 *
	 * @param mixed $data
	 *
	 * @return mixed
	 */
	public function clean($data)
	{
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				unset($data[$key]);

				$data[$this->clean($key)] = $this->clean($value);
			}
		} else {
			$data = trim(htmlspecialchars($data, ENT_COMPAT, 'UTF-8'));
		}

		return $data;
	}
}
