<?php
namespace Ventocart\Admin\Controller\Mail;
/**
 * Class Customer
 *
 * @package Ventocart\Admin\Controller\Mail
 */
class Customer extends \Ventocart\System\Engine\Controller
{
	/**
	 * @param string $route
	 * @param array  $args
	 * @param mixed  $output
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function approve(string &$route, array &$args, &$output): void
	{
		if (isset($args[0])) {
			$customer_id = (int) $args[0];
		} else {
			$customer_id = 0;
		}

		$this->load->model('customer/customer');

		$customer_info = $this->model_customer_customer->getCustomer($customer_id);

		if ($customer_info) {

			$store_logo = html_entity_decode($this->config->get('config_logo'), ENT_QUOTES, 'UTF-8');
			$store_name = html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');
			$store_url = HTTP_CATALOG;


			$this->load->model('localisation/language');

			$language_info = $this->model_localisation_language->getLanguage($customer_info['language_id']);

			if ($language_info) {
				$language_code = $language_info['code'];
			} else {
				$language_code = $this->config->get('config_language');
			}

			// Load the language for any mails using a different country code and prefixing it so it does not pollute the main data pool.
			$this->load->language('default', 'mail', $language_code);
			$this->load->language('mail/customer_approve', 'mail', $language_code);

			// Add language vars to the template folder
			$results = $this->language->all('mail');

			foreach ($results as $key => $value) {
				$data[$key] = $value;
			}

			$this->load->model('tool/image');

			if (is_file(DIR_IMAGE . $store_logo)) {
				$data['logo'] = $store_url . 'image/' . $store_logo;
			} else {
				$data['logo'] = '';
			}

			$subject = sprintf($this->language->get('mail_text_subject'), $store_name);

			$data['text_welcome'] = sprintf($this->language->get('mail_text_welcome'), $store_name);

			$data['login'] = $store_url . 'index.php?route=account/login';

			$data['store'] = $store_name;
			$data['store_url'] = $store_url;

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
				$mail->setTo($customer_info['email']);
				$mail->setFrom($this->config->get('config_email'));
				$mail->setSender($store_name);
				$mail->setSubject($subject);
				$mail->setHtml($this->load->view('mail/customer_approve', $data));
				$mail->send();
			}
		}
	}

	/**
	 * @param string $route
	 * @param array  $args
	 * @param mixed  $output
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function deny(string &$route, array &$args, &$output): void
	{
		if (isset($args[0])) {
			$customer_id = (int) $args[0];
		} else {
			$customer_id = 0;
		}

		$this->load->model('customer/customer');

		$customer_info = $this->model_customer_customer->getCustomer($customer_id);

		if ($customer_info) {

			$store_logo = html_entity_decode($this->config->get('config_logo'), ENT_QUOTES, 'UTF-8');
			$store_name = html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');
			$store_url = HTTP_CATALOG;


			$this->load->model('localisation/language');

			$language_info = $this->model_localisation_language->getLanguage($customer_info['language_id']);

			if ($language_info) {
				$language_code = $language_info['code'];
			} else {
				$language_code = $this->config->get('config_language');
			}

			// Load the language for any mails using a different country code and prefixing it so it does not pollute the main data pool.
			$this->load->language('default', 'mail', $language_code);
			$this->load->language('mail/customer_deny', 'mail', $language_code);

			// Add language vars to the template folder
			$results = $this->language->all('mail');

			foreach ($results as $key => $value) {
				$data[$key] = $value;
			}

			$this->load->model('tool/image');

			if (is_file(DIR_IMAGE . $store_logo)) {
				$data['logo'] = $store_url . 'image/' . $store_logo;
			} else {
				$data['logo'] = '';
			}

			$subject = sprintf($this->language->get('mail_text_subject'), $store_name);

			$data['text_welcome'] = sprintf($this->language->get('mail_text_welcome'), $store_name);

			$data['contact'] = $store_url . 'index.php?route=information/contact';

			$data['store'] = $store_name;
			$data['store_url'] = $store_url;

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
				$mail->setTo($customer_info['email']);
				$mail->setFrom($this->config->get('config_email'));
				$mail->setSender($store_name);
				$mail->setSubject($subject);
				$mail->setHtml($this->load->view('mail/customer_deny', $data));
				$mail->send();
			}
		}
	}
}
