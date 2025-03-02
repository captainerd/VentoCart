<?php
namespace Ventocart\Admin\Controller\Mail;
/**
 * Class Transaction
 *
 * @package Ventocart\Admin\Controller\Mail
 */
class Transaction extends \Ventocart\System\Engine\Controller
{
	/**
	 * @param string $route
	 * @param array  $args
	 * @param mixed  $output
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function index(string &$route, array &$args, &$output): void
	{
		if (isset($args[0])) {
			$customer_id = $args[0];
		} else {
			$customer_id = 0;
		}

		if (isset($args[1])) {
			$description = $args[1];
		} else {
			$description = '';
		}

		if (isset($args[2])) {
			$amount = $args[2];
		} else {
			$amount = 0;
		}

		if (isset($args[3])) {
			$order_id = $args[3];
		} else {
			$order_id = 0;
		}

		$this->load->model('customer/customer');

		$customer_info = $this->model_customer_customer->getCustomer($customer_id);

		if ($customer_info) {
			$this->load->language('mail/transaction');


			$store_name = html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');
			$store_url = $this->config->get('config_url');


			$this->load->model('localisation/language');

			$language_info = $this->model_localisation_language->getLanguage($customer_info['language_id']);

			if ($language_info) {
				$language_code = $language_info['code'];
			} else {
				$language_code = $this->config->get('config_language');
			}

			$this->load->language('default', 'mail', $language_code);
			$this->load->language('mail/transaction', 'mail', $language_code);

			$subject = sprintf($this->language->get('mail_text_subject'), $store_name);

			$data['text_received'] = sprintf($this->language->get('mail_text_received'), $this->currency->format($amount, $this->config->get('config_currency')));
			$data['text_total'] = sprintf($this->language->get('mail_text_total'), $this->currency->format($this->model_customer_customer->getTransactionTotal($customer_id), $this->config->get('config_currency')));

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
				$mail->setHtml($this->load->view('mail/transaction', $data));
				$mail->send();
			}
		}
	}
}
