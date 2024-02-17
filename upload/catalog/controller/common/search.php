<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Search
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Search extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
		$this->load->language('common/search');

		$data['text_search'] = $this->language->get('text_search');

		if (isset($this->request->get['search'])) {
			$data['search'] = $this->request->get['search'];
		} else {
			$data['search'] = '';
		}

		$data['language'] = $this->config->get('config_language');
		$data['category_id'] = !empty($this->request->get['category_id']) ? $this->request->get['category_id'] : '0';

		return $this->load->view('common/search', $data);
	}
}