<?php
namespace Ventocart\Catalog\Controller\Common;
/**
 * Class Footer
 *
 * @package Ventocart\Catalog\Controller\Common
 */
class Footer extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): string
	{
		$this->load->language('common/footer');

		$this->load->model('cms/article');

		$data['blog'] = $this->model_cms_article->getTotalArticles();



		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/returns.add');

		if ($this->config->get('config_gdpr_id')) {
			$data['gdpr'] = $this->url->link('information/gdpr');
		} else {
			$data['gdpr'] = '';
		}

		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['manufacturer'] = $this->url->link('product/manufacturer');


		if ($this->config->get('config_affiliate_status')) {
			$data['affiliate'] = $this->url->link('account/affiliate');
		} else {
			$data['affiliate'] = '';
		}
		if ($this->config->get('config_checkout_guest')) {

			$data['guestorder'] = $this->url->link('guest/order');

		} else {

			$data['guestorder'] = false;
		}
		$data['url'] = $this->url;
		$data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

		// Who's Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['HTTP_X_REAL_IP'])) {
				$ip = $this->request->server['HTTP_X_REAL_IP'];
			} elseif (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}
		$data['theme_name'] = THEME_NAME;


		$data['scripts'] = $this->document->getScripts('footer');
		if ($this->config->get('module_gdpr_status')) {

			$data['cookie'] = $this->load->controller('extension/ventocart/module/gdpr');

		} else {
			$data['cookie'] = '';
		}

		return $this->load->view('common/footer', $data);
	}
}
