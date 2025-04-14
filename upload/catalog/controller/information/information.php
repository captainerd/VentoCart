<?php
namespace Ventocart\Catalog\Controller\Information;
/**
 * Class Information
 *
 * @package Ventocart\Catalog\Controller\Information
 */
class Information extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): ?object
	{
		$this->load->language('information/information');

		if (isset($this->request->get['information_id'])) {
			$information_id = (int) $this->request->get['information_id'];
		} else {
			$information_id = 0;
		}

		$this->load->model('catalog/information');

		$information_info = $this->model_catalog_information->getInformation($information_id);

		if (!empty($information_info['template'])) {
			$template_data = html_entity_decode($information_info['description']);

			$template_data = json_decode($template_data, true);
			if (empty($template_data)) {
				return $this->load->controller('error/not_found');
			}

			$template_data_fix = $this->extractTemplateVariables(DIR_TEMPLATE . '/plates/information/pages/' . $information_info['template']);
			$template_data = $template_data + $template_data_fix;


			$information_info['template'] = pathinfo($information_info['template'], PATHINFO_FILENAME);
			$information_info['description'] = $template_data; // $this->load->view('information/pages/' . $information_info['template'], $template_data);
		}

		if ($information_info) {
			$this->document->setTitle($information_info['meta_title']);
			$this->document->setDescription($information_info['meta_description']);
			$this->document->setKeywords($information_info['meta_keyword']);

			$datab['breadcrumbs'] = [];

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
			];

			$datab['breadcrumbs'][] = [
				'text' => $information_info['title'],
				'href' => $this->url->link('information/information', 'information_id=' . $information_id)
			];

			$data['heading_title'] = $information_info['title'];



			$data['continue'] = $this->url->link('common/home');
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');



			if (!is_array($information_info['description'])) {


				$data['description'] = html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');
				$this->response->setOutput($this->load->view('information/information', $data));
			} else {
				$data = $information_info['description'] + $data;
				$this->response->setOutput($this->load->view('information/pages/' . $information_info['template'], $data));

			}
		} else {
			$this->request->get['route'] = 'error/not_found';
			return $this->load->controller('error/not_found');
		}

		return null;
	}

	/**
	 * @return void
	 */
	public function info(): void
	{
		if (isset($this->request->get['information_id'])) {
			$information_id = (int) $this->request->get['information_id'];
		} else {
			$information_id = 0;
		}

		$this->load->model('catalog/information');

		$information_info = $this->model_catalog_information->getInformation($information_id);

		if ($information_info) {
			$data['title'] = $information_info['title'];
			$data['description'] = html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');

			$this->response->addHeader('X-Robots-Tag: noindex');
			$this->response->setOutput($this->load->view('information/information_info', $data));
		}
	}


	public function edit(): void
	{

		$this->load->language('information/information');



		if (isset($this->request->get['information_id'])) {
			$information_id = (int) $this->request->get['information_id'];
		} else {
			$information_id = 0;
		}

		$this->load->model('catalog/information');
		if (isset($this->request->post['updateData'])) {
			$raw_json = html_entity_decode($this->request->post['updateData']);
			$update_data = json_decode($raw_json, true);

			// Sanity checks
			if (json_last_error() === JSON_ERROR_NONE && is_array($update_data)) {

				$this->model_catalog_information->updateInformation($information_id, $update_data);
				$data['updated'] = true;

			} else {
				$data['failed'] = true;

			}
		}


		if (isset($this->request->get['admin_token'])) {
			// Validate admin token
			$is_valid = $this->model_catalog_information->validateAdmin($this->request->get['admin_token']);

			if (!$is_valid) {

				// If the token is invalid, redirect to error page
				$this->response->redirect($this->url->link('error/not_found'));
			}
		} else {

			// If no token is set, redirect to error page
			$this->response->redirect($this->url->link('error/not_found'));
		}



		if (isset($this->request->get['iframe'])) {
			$data['iframe'] = true;
			$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
			$host = $_SERVER['HTTP_HOST'];
			$requestUri = $_SERVER['REQUEST_URI'];
			$data['theme_name'] = THEME_NAME;


			$data['iframeurl'] = $this->removeIframeParam("$protocol://$host$requestUri");

			$this->response->setOutput($this->load->view('information/edit_information', $data));


		} else {
			$data['iframe'] = false;
		}

		if (isset($this->request->get['language_id'])) {
			$this->config->set('config_language_id', (int) $this->request->get['language_id']);
		}

		$information_info = $this->model_catalog_information->getInformation($information_id);

		if (isset($this->request->post['viewData'])) {
			$information_info['description'] = $this->request->post['viewData'];

		}
		if (!empty($information_info['template'])) {
			$template_data = html_entity_decode($information_info['description']);


			$template_data = json_decode($template_data, true);
			if (empty($template_data)) {
				$template_data = [];
			}
			$template_data_fix = $this->extractTemplateVariables(DIR_TEMPLATE . '/plates/information/pages/' . $information_info['template']);
			$template_data = $template_data + $template_data_fix;




			$information_info['template'] = pathinfo($information_info['template'], PATHINFO_FILENAME);
			foreach ($template_data as $key => $value) {
				if ($value === '') {
					$template_data[$key] = '&nbsp;';  // Replace empty string with HTML space symbol
				}
			}

		}

		if ($information_info) {
			$this->document->setTitle($information_info['meta_title']);
			$this->document->setDescription($information_info['meta_description']);
			$this->document->setKeywords($information_info['meta_keyword']);

			$datab['breadcrumbs'] = [];

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
			];

			$datab['breadcrumbs'][] = [
				'text' => $information_info['title'],
				'href' => $this->url->link('information/information', 'information_id=' . $information_id)
			];

			$data['heading_title'] = $information_info['title'];

			$data['description'] = html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');

			$data['continue'] = $this->url->link('common/home');
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['admin_dir'] = $this->request->get['admin_dir'];
			$data['template_data'] = $template_data;
			$this->load->model('localisation/language');
			$data['language'] = $this->model_localisation_language->getLanguage($this->request->get['language_id']);


			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
			$data['description'] = $this->load->view('information/pages/' . $information_info['template'], $template_data + $data);
			$this->response->setOutput($this->load->view('information/edit_information', $data));

		} else {
			$this->request->get['route'] = 'error/not_found';
			$this->load->controller('error/not_found');
		}

		return;
	}


	private function removeIframeParam($url)
	{
		$parts = parse_url($url);
		parse_str($parts['query'] ?? '', $query);
		unset($query['iframe']);
		$new_query = http_build_query($query);

		return
			($parts['scheme'] ?? 'http') . '://' .
			($parts['host'] ?? '') .
			($parts['port'] ?? '' ? ':' . $parts['port'] : '') .
			($parts['path'] ?? '') .
			($new_query ? '?' . $new_query : '');
	}
	private function extractTemplateVariables($templatePath)
	{
		if (!is_file($templatePath)) {
			return [];
		}

		$content = file_get_contents($templatePath);

		// Match all data-ve="type|key"
		preg_match_all('/data-ve=["\'](string|array)\|([a-zA-Z0-9_]+)["\']/', $content, $matches, PREG_SET_ORDER);

		$result = [];

		foreach ($matches as $match) {
			$type = $match[1];
			$key = $match[2];

			// Only set if not already found (avoid duplicates)
			if (!isset($result[$key])) {
				$result[$key] = ($type === 'array') ? [] : '';
			}
		}

		return $result;
	}

}