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
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function index(array $data): mixed
	{

		$api_output = $this->customer->isApiClient();
		if ($api_output) {
			return $data;
		}
		$this->load->language('product/thumb');

		$data['cart'] = $this->url->link('common/cart.info', 'language=' . $this->config->get('config_language'));

		$data['add_to_cart'] = $this->url->link('checkout/cart.add', 'language=' . $this->config->get('config_language'));
		$data['add_to_wishlist'] = $this->url->link('account/wishlist.add', 'language=' . $this->config->get('config_language'));
		$data['add_to_compare'] = $this->url->link('product/compare.add', 'language=' . $this->config->get('config_language'));

		$data['review_status'] = (int) $this->config->get('config_review_status');


		return $this->load->view('product/thumb', $data);
	}
}
