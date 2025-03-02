<?php
/**
 * @package   VentoCart
 * @author    Daniel Kerr
 * @copyright Copyright (c) 2005 - 2022, VentoCart, Ltd. (https://www.ventocart.com/)
 * @license   https://opensource.org/licenses/GPL-3.0
 * @author    Daniel Kerr
 * @see       https://www.ventocart.com
 */
namespace Ventocart\System\Library;
/**
 * Class URL
 */
class Url
{
	/**
	 * @var string
	 */
	private string $url;
	/**
	 * @var array
	 */
	private array $rewrite = [];

	/**
	 * Constructor
	 *
	 * @param string $url
	 */
	public function __construct(string $url)
	{
		$this->url = $url;
	}

	/**
	 * addRewrite
	 *
	 * Add a rewrite method to the URL system
	 *
	 * @param object $rewrite
	 *
	 * @return void
	 */
	public function addRewrite(\Ventocart\System\Engine\Controller $rewrite): void
	{
		$this->rewrite[] = $rewrite;
	}

	/**
	 * Link
	 * 
	 * Generates a URL
	 *
	 * @param string $route
	 * @param mixed  $args
	 * @param bool   $js
	 *
	 * @return string
	 */
	public function link(string $route, $args = '', bool $js = false): string
	{
		$url = $this->url . 'index.php?route=' . $route;

		if ($args) {
			if (is_array($args)) {
				$url .= '&' . http_build_query($args);
			} else {
				$url .= '&' . trim($args, '&');
			}
		}

		foreach ($this->rewrite as $rewrite) {
			$url = $rewrite->rewrite($url);
		}

		if (!$js) {
			return str_replace('&', '&amp;', $url);
		} else {
			return $url;
		}
	}
}
