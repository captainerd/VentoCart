<?php
namespace Ventocart\Catalog\Controller\Information;
/**
 * Class Contact
 *
 * @package Ventocart\Catalog\Controller\Information
 */
class Contact extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('information/contact');

		$this->document->setTitle($this->language->get('heading_title'));

		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/contact')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['send'] = $this->url->link('information/contact.send');

		$this->load->model('tool/image');

		if ($this->config->get('config_image')) {
			$data['image'] = $this->model_tool_image->resize(html_entity_decode($this->config->get('config_image'), ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_location_width'), $this->config->get('config_image_location_height'));
		} else {
			$data['image'] = false;
		}

		$data['store'] = $this->config->get('config_name');
		$data['address'] = nl2br($this->config->get('config_address'));
		$data['geocode'] = $this->config->get('config_geocode');
		$data['geocode_hl'] = $this->config->get('config_language');
		$data['telephone'] = $this->config->get('config_telephone');
		$data['open'] = nl2br($this->config->get('config_open'));
		$data['comment'] = nl2br($this->config->get('config_comment'));

		$data['locations'] = [];

		$this->load->model('localisation/location');

		foreach ((array) $this->config->get('config_location') as $location_id) {
			$location_info = $this->model_localisation_location->getLocation((int) $location_id);

			if ($location_info) {
				if (is_file(DIR_IMAGE . html_entity_decode($location_info['image'], ENT_QUOTES, 'UTF-8'))) {
					$image = $this->model_tool_image->resize(html_entity_decode($location_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_location_width'), $this->config->get('config_image_location_height'));
				} else {
					$image = '';
				}

				$data['locations'][] = [
					'location_id' => $location_info['location_id'],
					'name' => $location_info['name'],
					'address' => nl2br($location_info['address']),
					'geocode' => $location_info['geocode'],
					'telephone' => $location_info['telephone'],
					'image' => $image,
					'open' => nl2br($location_info['open']),
					'comment' => $location_info['comment']
				];
			}
		}

		$data['name'] = $this->customer->getFirstName();
		$data['email'] = $this->customer->getEmail();
		$this->session->data['email_token'] = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);
		$data['email_field'] = $this->session->data['email_token'];
		// Captcha
		$this->load->model('setting/extension');

		$extension_info = $this->model_setting_extension->getExtensionByCode('captcha', $this->config->get('config_captcha'));

		if ($extension_info && $this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('contact', (array) $this->config->get('config_captcha_page'))) {
			$data['captcha'] = $this->load->controller('extension/' . $extension_info['extension'] . '/captcha/' . $extension_info['code']);
		} else {
			$data['captcha'] = '';
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('information/contact', $data));
	}

	/**
	 * @return void
	 * @throws \Exception
	 */
	public function send(): void
	{
		$this->load->language('information/contact');

		$json = [];

		$keys = [
			'name',
			$this->session->data['email_token'],
			'enquiry'
		];

		foreach ($keys as $key) {
			if (!isset($this->request->post[$key])) {
				$this->request->post[$key] = '';
			}
		}
		if (!empty($this->request->post['email'])) {

			$json['error']['email'] = $this->language->get('error_email');
		}
		if ((oc_strlen($this->request->post['name']) < 3) || (oc_strlen($this->request->post['name']) > 32)) {
			$json['error']['name'] = $this->language->get('error_name');
		}

		if (!filter_var($this->request->post[$this->session->data['email_token']], FILTER_VALIDATE_EMAIL)) {
			$json['error'][$this->session->data['email_token']] = $this->language->get('error_email');
		}

		if ((oc_strlen($this->request->post['enquiry']) < 10) || (oc_strlen($this->request->post['enquiry']) > 3000)) {
			$json['error']['enquiry'] = $this->language->get('error_enquiry');
		}

		// Captcha
		$this->load->model('setting/extension');

		$extension_info = $this->model_setting_extension->getExtensionByCode('captcha', $this->config->get('config_captcha'));

		if ($extension_info && $this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('contact', (array) $this->config->get('config_captcha_page'))) {
			$captcha = $this->load->controller('extension/' . $extension_info['extension'] . '/captcha/' . $extension_info['code'] . '.validate');

			if ($captcha) {
				$json['error']['captcha'] = $captcha;
			}
		}

		if (!$json) {
			$from = $this->request->post[$this->session->data['email_token']];
			if ($this->config->get('config_mail_engine')) {
				$mail_option = [
					'parameter' => $this->config->get('config_mail_parameter'),
					'smtp_hostname' => $this->config->get('config_mail_smtp_hostname'),
					'smtp_username' => $this->config->get('config_mail_smtp_username'),
					'smtp_password' => html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8'),
					'smtp_port' => $this->config->get('config_mail_smtp_port'),
					'smtp_timeout' => $this->config->get('config_mail_smtp_timeout')
				];

				$mail = new \Ventocart\System\Library\Mail($this->config->get('config_mail_engine'), $mail_option);
				$mail->setTo($this->config->get('config_email'));
				// Less spam and fix bug when using SMTP like sendgrid.
				$mail->setFrom($from);
				$mail->setReplyTo($this->request->post[$this->session->data['email_token']]);
				$mail->setSender(html_entity_decode($this->request->post['name'], ENT_QUOTES, 'UTF-8'));
				$mail->setSubject(html_entity_decode(sprintf($this->language->get('email_subject'), $this->request->post['name']), ENT_QUOTES, 'UTF-8'));
				$mail->setText($this->request->post['enquiry']);
				$mail->send();
			}

			$json['redirect'] = $this->url->link('information/contact.success', '', true);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function success(): void
	{
		$this->load->language('information/contact');

		$this->document->setTitle($this->language->get('heading_title'));

		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/contact')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['text_message'] = $this->language->get('text_message');

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));
	}
}
