<?php
namespace Ventocart\Admin\Controller\Error;
/**
 * Class Permission
 *
 * @package Ventocart\Admin\Controller\Error
 */
class Permission extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('error/permission');

		$this->document->setTitle($this->language->get('heading_title'));

		if (!isset($this->session->data['user_token'])) {
			$this->request->get['route'] = 'common/logout';
			$this->load->controller('common/logout');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('error/permission', $data));
	}
}
