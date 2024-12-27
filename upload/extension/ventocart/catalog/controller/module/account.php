<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Account
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Account extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): string
	{
		$this->load->language('extension/ventocart/module/account');

		$data['logged'] = $this->customer->isLogged();
		$data['register'] = $this->url->link('account/register');
		$data['login'] = $this->url->link('account/login');
		$data['logout'] = $this->url->link('account/logout');
		$data['forgotten'] = $this->url->link('account/forgotten');
		$data['account'] = $this->url->link('account/account');
		$data['edit'] = $this->url->link('account/edit');
		$data['password'] = $this->url->link('account/password');
		$data['address'] = $this->url->link('account/address');
		$data['wishlist'] = $this->url->link('account/wishlist');
		$data['order'] = $this->url->link('account/order');
		$data['download'] = $this->url->link('account/download');
		$data['reward'] = $this->url->link('account/reward');
		$data['return'] = $this->url->link('account/returns');
		$data['transaction'] = $this->url->link('account/transaction');
		$data['newsletter'] = $this->url->link('account/newsletter');
		$data['subscription'] = $this->url->link('account/subscription');

		return $this->load->view('extension/ventocart/module/account', $data);
	}
}
