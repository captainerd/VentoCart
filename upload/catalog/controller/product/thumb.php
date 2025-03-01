<?php
namespace Ventocart\Catalog\Controller\Product;

/**
 * Class Thumb
 *
 * @package Ventocart\Catalog\Controller\Product
 */
class Thumb extends \Ventocart\System\Engine\Controller
{
	/**
	 * Loads common data for product thumb views
	 *
	 * @param array $data
	 * @param string $template
	 * @return mixed
	 */
	private function loadCommonData(array $data, string $template): mixed
	{
		$this->load->language('product/thumb');

		$data['cart'] = $this->url->link('common/cart.info');
		$data['add_to_cart'] = $this->url->link('checkout/cart.add');
		$data['add_to_wishlist'] = $this->url->link('account/wishlist.add');
		$data['add_to_compare'] = $this->url->link('product/compare.add');
		$data['review_status'] = (int) $this->config->get('config_review_status');

		return $this->load->view($template, $data);
	}

	/**
	 * Thumb view for product grid
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function index(array $data): mixed
	{
		return $this->loadCommonData($data, 'product/thumb');
	}

	/**
	 * Thumb view for list view
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function listview(array $data): mixed
	{
		return $this->loadCommonData($data, 'product/thumb_list');
	}
}
