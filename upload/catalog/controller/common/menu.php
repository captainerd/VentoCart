<?php
namespace Ventocart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Ventocart\Catalog\Controller\Common
 */
class Menu extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return mixed
	 */
	public function index(): mixed
	{
		$this->load->language('common/header');

		$this->load->language('common/menu');

		$data = $this->basics();

		$data['categories'] = $this->buildMenu(0);





		return $this->load->view('common/menu', $data);


	}

	public function mobile(): string
	{

		$data = $this->basics();
		$this->load->language('common/menu');


		$data['categories'] = $this->buildMenu(0);

		return $this->load->view('common/menu_mobile', $data);


	}

	public function basics(): array
	{

		$data['name'] = $this->config->get('config_name');

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $this->config->get('config_url') . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$data['home'] = $this->url->link('common/home');
		$data['wishlist'] = $this->url->link('account/wishlist');
		$data['logged'] = $this->customer->isLogged();

		if (!$this->customer->isLogged()) {
			$data['register'] = $this->url->link('account/register');
			$data['login'] = $this->url->link('account/login');
			$data['guest_order'] = $this->url->link('guest/order');
		} else {
			$data['account'] = $this->url->link('account/account');
			$data['order'] = $this->url->link('account/order');
			$data['transaction'] = $this->url->link('account/transaction');
			$data['download'] = $this->url->link('account/download');
			$data['logout'] = $this->url->link('account/logout');
		}



		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout');
		$data['contact'] = $this->url->link('information/contact');
		$data['telephone'] = $this->config->get('config_telephone');
		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['search'] = $this->load->controller('common/search');
		$data['cart'] = $this->load->controller('common/cart');


		return $data;
	}
	protected function buildMenu($parent_id)
	{
		$this->load->model('catalog/category');

		$categories = $this->model_catalog_category->getCategories($parent_id);
		$menu = [];

		foreach ($categories as $category) {

			$children_data = $this->buildMenu($category['category_id']);

			$menu[] = [
				'name' => $category['name'],
				'top' => $category['top'],
				'image' => $category['image'],
				'children' => $children_data,
				'column' => $category['column'] ? $category['column'] : 1,
				'href' => (strpos($category['redirect_url'], 'http') === 0)
					? $category['redirect_url']
					: $this->url->link($category['redirect_url'] ? $category['redirect_url'] : 'product/category' . '&path=' . $category['path'])
			];

		}

		return $menu;
	}
}
