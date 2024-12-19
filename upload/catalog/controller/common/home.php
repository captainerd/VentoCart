<?php
namespace Ventocart\Catalog\Controller\Common;
/**
 * Class Home
 *
 * @package Ventocart\Catalog\Controller\Common
 */
class Home extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));
		$api_output = $this->customer->isApiClient();

		/* Product related */
		$this->document->addLink('https://fonts.googleapis.com/css?family=Aldrich', 'stylesheet', 'text/css');
		$this->document->addLink('/catalog/view/stylesheet/photoswipe.css', 'stylesheet', 'text/css');
		$this->document->addLink('/catalog/view/stylesheet/splider.css', 'stylesheet', 'text/css');

		$this->document->addScript("catalog/view/javascript/product.js");

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if (!$api_output) {
			$this->response->setOutput($this->load->view('common/home', $data));
		} else {
			$allowedKeys = [
				'header',
				'content_top',
				'column_left',
				'column_right',
				'content_bottom',


			];



			$data = array_intersect_key($data, array_flip($allowedKeys));

			$data['loggedIn'] = $this->customer->isLogged();
			$data['test'] = $this->customer->isApiSigned();
			$data['test2'] = $this->customer->isApiClient();
			$data['menu'] = $this->load->controller('common/menu');
			$jsonData = json_encode($data);

			// Manually replace the &amp; with &
			$jsonData = str_replace('&amp;', '&', $jsonData);

			$this->response->setOutput($jsonData);
		}
	}
}