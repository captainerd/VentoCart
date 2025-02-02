<?php
namespace Ventocart\Admin\Controller\Design;
/**
 * Class Theme
 *
 * @package Ventocart\Admin\Controller\Design
 */
class Theme extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('design/theme');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('design/theme', 'user_token=' . $this->session->data['user_token'])
		];

		$data['stores'] = [];

		$this->load->model('setting/store');

		$results = glob(DIR_VENTOCART . "themes/*");
		$themes = [];

		foreach ($results as $result) {
			$themes[] = str_replace(DIR_VENTOCART . "themes/", '', $result);
		}

		foreach ($themes as $result) {
			$data['themes'][] = [
				'theme_id' => $result,
				'default' => $this->config->get('config_theme') == $result ? true : false,
				'name' => $result == 'basic' ? 'Default' : ucfirst(lcfirst(ucwords(str_replace('_', ' ', $result))))
			];
		}

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('design/theme', $data));
	}



	/**
	 * @return void
	 */
	public function path(): void
	{
		$this->load->language('design/theme');

		$json = [];


		if (isset($this->request->get['path'])) {
			$path = $this->request->get['path'];
		} else {
			$path = '';
		}
		if (isset($this->request->get['theme_id'])) {
			$theme_id = $this->request->get['theme_id'];
		} else {
			$theme_id = 'default';
		}
		// Default templates
		$json['directory'] = [];
		$json['file'] = [];

		$directory = DIR_VENTOCART . 'themes/' . $theme_id;

		if (substr(str_replace('\\', '/', realpath($directory . '/' . $path)), 0, strlen($directory)) == $directory) {
			// We grab the files from the default template directory
			$files = glob(rtrim(DIR_VENTOCART . 'themes/' . $theme_id . '/' . $path, '/') . '/*');

			foreach ($files as $file) {
				if (is_dir($file)) {
					$json['directory'][] = [
						'name' => basename($file),
						'path' => trim($path . '/' . basename($file), '/')
					];
				}

				if (is_file($file)) {
					$json['file'][] = [
						'name' => basename($file),
						'path' => trim($path . '/' . basename($file), '/')
					];
				}
			}
		}

		if (!$path) {

		}



		if ($path) {
			$json['back'] = [
				'name' => $this->language->get('button_back'),
				'path' => urlencode(substr($path, 0, strrpos($path, '/'))),
			];
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function template(): void
	{
		$this->load->language('design/theme');

		$json = [];

		if (isset($this->request->get['theme_id'])) {
			$theme_id = $this->request->get['theme_id'];
		} else {
			$theme_id = 'default';
		}

		if (isset($this->request->get['path'])) {
			$path = $this->request->get['path'];
		} else {
			$path = '';
		}

		// Default template load
		$directory = DIR_VENTOCART . 'themes/' . $theme_id;

		if (is_file($directory . '/' . $path) && (substr(str_replace('\\', '/', realpath($directory . '/' . $path)), 0, strlen($directory)) == $directory)) {
			$json['code'] = file_get_contents(DIR_VENTOCART . 'themes/' . $theme_id . "/" . $path);
		}


		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function save(): void
	{
		$this->load->language('design/theme');

		$json = [];

		if (isset($this->request->get['theme_id'])) {
			$theme_id = $this->request->get['theme_id'];
		} else {
			$theme_id = 'default';
		}

		if (isset($this->request->get['path'])) {
			$path = $this->request->get['path'];
		} else {
			$path = '';
		}
		$code = $this->request->post['code'];
		$code = html_entity_decode($code);
		// Check user has permission
		if (!$this->user->hasPermission('modify', 'design/theme')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('design/theme');

			$pos = strpos($path, '.');
			$file = DIR_VENTOCART . 'themes/' . $theme_id . "/" . $path;
			file_put_contents($file, $code);
			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}



}
