<?php
namespace Ventocart\Admin\Controller\Catalog;
class Information extends \Ventocart\System\Engine\Controller
{
	public function index(): void
	{
		$this->load->language('catalog/information');

		$this->document->setTitle($this->language->get('heading_title'));

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/information', 'user_token=' . $this->session->data['user_token'] . $url)
		];

		$data['add'] = $this->url->link('catalog/information.form', 'user_token=' . $this->session->data['user_token'] . $url);
		$data['delete'] = $this->url->link('catalog/information.delete', 'user_token=' . $this->session->data['user_token']);

		$data['list'] = $this->getList();

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/information', $data));
	}

	public function list(): void
	{
		$this->load->language('catalog/information');

		$this->response->setOutput($this->getList());
	}

	protected function getList(): string
	{
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'id.title';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['action'] = $this->url->link('catalog/information.list', 'user_token=' . $this->session->data['user_token'] . $url);

		$data['informations'] = [];

		$filter_data = [
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_pagination_admin'),
			'limit' => $this->config->get('config_pagination_admin')
		];

		$this->load->model('catalog/information');

		$information_total = $this->model_catalog_information->getTotalInformations();

		$results = $this->model_catalog_information->getInformations($filter_data);

		foreach ($results as $result) {
			$data['informations'][] = [
				'information_id' => $result['information_id'],
				'title' => $result['title'],

				'edit' => $this->url->link('catalog/information.form', 'user_token=' . $this->session->data['user_token'] . '&information_id=' . $result['information_id'] . $url)
			];
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_title'] = $this->url->link('catalog/information.list', 'user_token=' . $this->session->data['user_token'] . '&sort=id.title' . $url);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $information_total,
			'page' => $page,
			'limit' => $this->config->get('config_pagination_admin'),
			'url' => $this->url->link('catalog/information.list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($information_total) ? (($page - 1) * $this->config->get('config_pagination_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_pagination_admin')) > ($information_total - $this->config->get('config_pagination_admin'))) ? $information_total : ((($page - 1) * $this->config->get('config_pagination_admin')) + $this->config->get('config_pagination_admin')), $information_total, ceil($information_total / $this->config->get('config_pagination_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		return $this->load->view('catalog/information_list', $data);
	}

	public function form(): void
	{
		$this->load->language('catalog/information');

		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addScript('view/javascript/tinymce/tinymce.min.js');

		$data['text_form'] = !isset($this->request->get['information_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$script_path = $_SERVER['SCRIPT_NAME']; // /cp-admin/index.php
		$admin_dir = basename(dirname($script_path)); // cp-admin
		$data['admin_dir'] = $admin_dir;
		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/information', 'user_token=' . $this->session->data['user_token'] . $url)
		];

		$data['save'] = $this->url->link('catalog/information.save', 'user_token=' . $this->session->data['user_token']);
		$data['back'] = $this->url->link('catalog/information', 'user_token=' . $this->session->data['user_token'] . $url);

		if (isset($this->request->get['information_id'])) {
			$this->load->model('catalog/information');

			$information_info = $this->model_catalog_information->getInformation($this->request->get['information_id']);
		}

		if (isset($this->request->get['information_id'])) {
			$data['information_id'] = (int) $this->request->get['information_id'];
		} else {
			$data['information_id'] = 0;
		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->get['information_id'])) {
			$data['information_description'] = $this->model_catalog_information->getDescriptions($this->request->get['information_id']);
		} else {
			$data['information_description'] = [];
		}
		$theme = $this->model_setting_setting->getConfigValue('THEME_NAME');
		$directory = DIR_VENTOCART . 'themes/' . $theme . '/plates/information/pages';

		if (!empty($information_info)) {
			$data['selected_template'] = $information_info['template'] ?? '';
			if (!is_file($directory . '/' . $data['selected_template'])) {
				$data['selected_template'] = '';
			} else {
				$template_data = $this->extractTemplateVariables($directory . '/' . $data['selected_template']);
				// Loop through language id's
				// Loop through language descriptions (each language's content)
				foreach ($data['information_description'] as $language_id => &$description) {

					// Decode existing json (if it's a JSON string)
					$existing_data = [];
					if (is_string($description['description'])) {
						$decoded = json_decode($description['description'], true);
						if (json_last_error() === JSON_ERROR_NONE) {
							$existing_data = $decoded;
						} else {
							$existing_data = $template_data;
						}
					}

					// Sanitize: Remove keys that are not in template
					foreach ($existing_data as $key => $value) {
						if (!array_key_exists($key, $template_data)) {
							unset($existing_data[$key]);
						}
					}

					// Fill in missing keys from template_data
					foreach ($template_data as $key => $default) {
						if (!array_key_exists($key, $existing_data)) {
							$existing_data[$key] = $default;
						}
					}

					// Re-encode and save back
					$description['description'] = json_encode($existing_data, JSON_UNESCAPED_UNICODE);
					$description['description'] = htmlspecialchars($description['description'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
				}
			}

			$data['bottom'] = $information_info['bottom'] ?? 0;
			$data['status'] = $information_info['status'] ?? true;

			$data['parent_id'] = isset($information_info['parent_id']) ? $information_info['parent_id'] : 0;
			$data['topmenu'] = isset($information_info['topmenu']) ? $information_info['topmenu'] : 0;
			$data['parent_name'] = isset($information_info['parent_name']) ? $information_info['parent_name'] : '';


			$this->load->model('design/footer');
			$linkkey = 'information_id_' . $information_info['information_id'];
			$footerdata = $this->model_design_footer->getKeyParent($linkkey);
			$this->load->language('catalog/information');
			if ($footerdata) {
				$data['footer_link_id'] = $footerdata['key'];
				$data['footer_link_name'] = $footerdata['text'];
			}
		}


		$page_templates = [];

		// Scan directory and filter out . and ..
		if (is_dir($directory)) {
			$files = scandir($directory);
			foreach ($files as $file) {
				if ($file === '.' || $file === '..') {
					continue;
				}
				if (is_file($directory . '/' . $file) && preg_match('/\.(php|tpl|twig)$/', $file)) {
					$page_templates[] = $file;
				}
			}
		}
		$data['templates'] = $page_templates;
		if (isset($this->request->get['information_id'])) {
			$data['information_seo_url'] = $this->model_catalog_information->getSeoUrls($this->request->get['information_id']);
		} else {
			$data['information_seo_url'] = [];
		}


		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/information_form', $data));
	}

	public function save(): void
	{
		$this->load->language('catalog/information');

		$json = [];


		$theme = $this->model_setting_setting->getConfigValue('THEME_NAME');
		$directory = DIR_VENTOCART . 'themes/' . $theme . '/plates/information/pages';


		if (!$this->user->hasPermission('modify', 'catalog/information')) {
			$json['error']['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['information_description'] as $language_id => $value) {
			if ((oc_strlen(trim($value['title'])) < 1) || (oc_strlen($value['title']) > 64)) {
				$json['error']['title_' . $language_id] = $this->language->get('error_title');
			}

			if ((oc_strlen(trim($value['meta_title'])) < 1) || (oc_strlen($value['meta_title']) > 255)) {
				$json['error']['meta_title_' . $language_id] = $this->language->get('error_meta_title');
			}
		}

		if ($this->request->post['information_seo_url']) {
			$this->load->model('design/seo_url');

			foreach ($this->request->post['information_seo_url'] as $language_id => $keyword) {

				if ((oc_strlen(trim($keyword)) < 1) || (oc_strlen($keyword) > 64)) {
					$json['error']['keyword_' . $language_id] = $this->language->get('error_keyword');
				}

				if (preg_match('/[^a-zA-Z0-9\/_-]|[\p{Cyrillic}]+/u', $keyword)) {
					$json['error']['keyword_' . $language_id] = $this->language->get('error_keyword_character');
				}

				$seo_url_info = $this->model_design_seo_url->getSeoUrlByKeyword($keyword);

				if ($seo_url_info && (!isset($this->request->post['information_id']) || $seo_url_info['key'] != 'information_id' || $seo_url_info['value'] != (int) $this->request->post['information_id'])) {
					$json['error']['keyword_' . $language_id] = $this->language->get('error_keyword_exists');
				}

			}
		}

		if (isset($json['error']) && !isset($json['error']['warning'])) {
			$json['error']['warning'] = $this->language->get('error_warning');
		}

		if (!$json) {
			// Load necessary models
			$this->load->model('catalog/information');

			// If no 'information_id' is provided, add a new information entry, otherwise edit the existing one
			if (empty($this->request->post['information_id'])) {
				// Add new information entry
				$json['information_id'] = $this->model_catalog_information->addInformation($this->request->post);
			} else {
				// Edit existing information entry
				$this->model_catalog_information->editInformation($this->request->post['information_id'], $this->request->post);
				$json['information_id'] = $this->request->post['information_id']; // Use existing ID in case of edit
			}

			// If a footer link ID is provided, update the footer link
			if (isset($this->request->post['footer_link_id'])) {
				// Load footer model
				$this->load->model('design/footer');
				$linkkey = 'information_id_' . $json['information_id'];
				if ($this->request->post['footer_link_id'] == "0") {
					$this->model_design_footer->deleteLinkKey($linkkey);
				}
				if ($this->request->post['footer_link_id']) {
					// Prepare element array with translations for each language
					$element = [];
					foreach ($this->request->post['information_description'] as $language_id => $info_desc) {
						$element[$language_id] = $info_desc['title'];  // Assuming 'title' contains the translation
					}

					// Create a unique linkkey using the newly generated information ID


					// Call the model's method to update footer link
					$this->model_design_footer->updateToKey($this->request->post['footer_link_id'], $element, $linkkey, 'information/information&information_id=' . $json['information_id']);
				}
			}
			$this->load->language('catalog/information');
			$json['success'] = $this->language->get('text_success');
		}


		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function delete(): void
	{
		$this->load->language('catalog/information');

		$json = [];

		if (isset($this->request->post['selected'])) {
			$selected = $this->request->post['selected'];
		} else {
			$selected = [];
		}

		if (!$this->user->hasPermission('modify', 'catalog/information')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/store');

		foreach ($selected as $information_id) {
			if ($this->config->get('config_account_id') == $information_id) {
				$json['error'] = $this->language->get('error_account');
			}

			if ($this->config->get('config_checkout_id') == $information_id) {
				$json['error'] = $this->language->get('error_checkout');
			}

			if ($this->config->get('config_affiliate_id') == $information_id) {
				$json['error'] = $this->language->get('error_affiliate');
			}

			if ($this->config->get('config_return_id') == $information_id) {
				$json['error'] = $this->language->get('error_return');
			}


		}

		if (!$json) {
			$this->load->model('catalog/information');

			foreach ($selected as $information_id) {
				$this->model_catalog_information->deleteInformation($information_id);
			}

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
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
