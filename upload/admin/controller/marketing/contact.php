<?php
namespace Ventocart\Admin\Controller\Marketing;
/**
 * Class Contact
 *
 * @package Ventocart\Admin\Controller\Marketing
 */
class Contact extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('marketing/contact');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->document->addScript('view/javascript/tinymce/tinymce.min.js');

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];


		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('marketing/contact', 'user_token=' . $this->session->data['user_token'])
		];

		$this->load->model('setting/store');

		$data['stores'] = $this->model_setting_store->getStores();

		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('marketing/contact', $data));
	}

	/**
	 * @return void
	 * @throws \Exception
	 */
	public function send(): void
	{
		$this->load->language('marketing/contact');

		$json = [];
		if (!isset($this->request->get['download'])) {
			if (!$this->user->hasPermission('modify', 'marketing/contact')) {
				$json['error']['warning'] = $this->language->get('error_permission');
			}

			if (!$this->request->post['subject']) {
				$json['error']['subject'] = $this->language->get('error_subject');
			}

			if (!$this->request->post['message']) {
				$json['error']['message'] = $this->language->get('error_message');
			}

		} else {
			if (!isset($this->request->get['store_id'])) {
				$json['error']['message'] = $this->language->get('error_store_id');
			} else {
				$this->request->post['store_id'] = $this->request->get['store_id'];
				$this->request->post['to'] = $this->request->get['to'];
			}
		}



		if (!$json) {
			$this->load->model('setting/store');
			$this->load->model('setting/setting');
			$this->load->model('customer/customer');
			$this->load->model('marketing/affiliate');
			$this->load->model('sale/order');

			$store_id = $this->request->post['store_id'];

			$store_info = $this->model_setting_store->getStore($store_id);

			$setting = $this->model_setting_setting->getSetting('config', $store_id);


			$store_url = $store_info['url'];


			if (!preg_match('/^https?:\/\//', $store_url)) {
				// Check the current scheme and prepend it if for some reason is missing
				$current_scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
				$store_url = $current_scheme . '://' . ltrim($store_url, '/');
			}

			$store_email = isset($setting['config_email']) ? $setting['config_email'] : $this->config->get('config_email');

			if (isset($this->request->get['page'])) {
				$page = (int) $this->request->get['page'];
			} else {
				$page = 1;
			}

			$limit = 5;

			$email_total = 0;

			$emails = [];



			switch ($this->request->post['to']) {
				case 'customer_guest':
					$customer_data = [
						'filter_newsletter' => 1,
						'start' => ($page - 1) * $limit,
						'limit' => $limit,
						'emails' => 1,
						'store_id' => $store_id,
					];
					if (isset($this->request->get['download'])) {
						$customer_data = [
							'filter_newsletter' => 1,
							'emails' => 1,
							'store_id' => $store_id,
						];
					}

					$email_total = $this->model_customer_customer->getTotalGuests($customer_data);

					$results = $this->model_customer_customer->getGuests($customer_data);

					foreach ($results as $result) {
						$emails[] = $result['email'];
					}
					break;

				case 'newsletter':

					$customer_data = [
						'filter_newsletter' => 1,
						'start' => ($page - 1) * $limit,
						'limit' => $limit,
						'emails' => 1,
						'store_id' => $store_id,
					];
					if (isset($this->request->get['download'])) {
						$customer_data = [
							'filter_newsletter' => 1,
							'emails' => 1,
							'store_id' => $store_id,
						];
					}
					$emails = [];
					// Fetch total and results from guest customers
					$guest_total = $this->model_customer_customer->getTotalGuests($customer_data);
					$guest_results = $this->model_customer_customer->getGuests($customer_data);

					foreach ($guest_results as $result) {
						$emails[] = $result['email'];
					}


					// Fetch total and results from regular customers
					$customer_total = $this->model_customer_customer->getTotalCustomers($customer_data);
					$customer_results = $this->model_customer_customer->getCustomers($customer_data);
					foreach ($customer_results as $result) {
						$emails[] = $result['email'];
					}

					// Sum totals

					$email_total = max($guest_total, $customer_total);

					break;
				case 'customer_all':
					$customer_data = [
						'start' => ($page - 1) * $limit,
						'limit' => $limit,
						'emails' => 1,
						'store_id' => $store_id,
					];
					if (isset($this->request->get['download'])) {
						$customer_data = [
							'emails' => 1,
							'store_id' => $store_id,
						];
					}
					$email_total = $this->model_customer_customer->getTotalCustomers($customer_data);

					$results = $this->model_customer_customer->getCustomers($customer_data);

					foreach ($results as $result) {
						$emails[] = $result['email'];
					}
					break;
				case 'customer_group':
					$customer_data = [
						'filter_customer_group_id' => $this->request->post['customer_group_id'],
						'start' => ($page - 1) * $limit,
						'limit' => $limit,
						'emails' => 1,
						'store_id' => $store_id,
					];
					if (isset($this->request->get['download'])) {
						$customer_data = [
							'emails' => 1,
							'filter_customer_group_id' => $this->request->post['customer_group_id'],
							'store_id' => $store_id,
						];
					}
					$email_total = $this->model_customer_customer->getTotalCustomers($customer_data);

					$results = $this->model_customer_customer->getCustomers($customer_data);

					foreach ($results as $result) {
						$emails[$result['customer_id']] = $result['email'];
					}
					break;
				case 'customer':
					if (!empty($this->request->post['customer'])) {
						$email_total = count($this->request->post['customer']);

						$customers = array_slice($this->request->post['customer'], ($page - 1) * $limit, $limit);

						foreach ($customers as $customer_id) {
							$customer_info = $this->model_customer_customer->getCustomer($customer_id);

							if ($customer_info) {
								$emails[] = $customer_info['email'];
							}
						}
					}
					break;
				case 'affiliate_all':
					$affiliate_data = [
						'start' => ($page - 1) * $limit,
						'limit' => $limit,
						'emails' => 1,
						'store_id' => $store_id,
					];
					if (isset($this->request->get['download'])) {
						$affiliate_data = [
							'emails' => 1,
							'store_id' => $store_id,
						];
					}
					$email_total = $this->model_marketing_affiliate->getTotalAffiliates($affiliate_data);

					$results = $this->model_marketing_affiliate->getAffiliates($affiliate_data);

					foreach ($results as $result) {
						$emails[] = $result['email'];
					}
					break;
				case 'affiliate':
					if (!empty($this->request->post['affiliate'])) {
						$affiliates = array_slice($this->request->post['affiliate'], ($page - 1) * $limit, $limit);

						foreach ($affiliates as $affiliate_id) {
							$affiliate_info = $this->model_marketing_affiliate->getAffiliate($affiliate_id);

							if ($affiliate_info) {
								$emails[] = $affiliate_info['email'];
							}
						}

						$email_total = count($this->request->post['affiliate']);
					}
					break;
				case 'product':
					if (isset($this->request->post['product'])) {
						$email_total = $this->model_sale_order->getTotalEmailsByProductsOrdered($this->request->post['product']);

						$results = $this->model_sale_order->getEmailsByProductsOrdered($this->request->post['product'], ($page - 1) * $limit, $limit);

						foreach ($results as $result) {
							$emails[] = $result['email'];
						}
					}
					break;
			}

			if (isset($this->request->get['download'])) {
				$filename = 'emails_list.txt';


				header('Content-Type: text/plain');
				header('Content-Disposition: attachment; filename="' . $filename . '"');
				header('Pragma: no-cache');
				header('Expires: 0');


				$output = fopen('php://output', 'w');


				foreach ($emails as $email) {
					fwrite($output, $email . PHP_EOL);
				}


				fclose($output);
				exit;
			}


			if ($page * $limit < $email_total) {
				$json['total'] = $email_total;
				$json['send'] = $page * $limit;
				$json['text'] = sprintf($this->language->get('text_sent'), $page * $limit, $email_total);
				$json['next'] = $this->url->link('marketing/contact.send', 'user_token=' . $this->session->data['user_token'] . '&page=' . ($page + 1), true);
			} else {
				$json['total'] = $email_total;
				$json['send'] = $page * $limit;
				$json['success'] = $this->language->get('text_success');
				$json['next'] = '';
			}
			$logo = isset($setting['config_logo']) ? $setting['config_logo'] : $this->config->get('config_logo');
			$store_logo = $store_url . 'image/' . html_entity_decode($logo, ENT_QUOTES, 'UTF-8');

			$store_name = isset($setting['config_name']) ? $setting['config_name'] : $this->config->get('config_name');

			$store_name = html_entity_decode($store_name, ENT_QUOTES, 'UTF-8');
			$data['store_logo'] = $store_logo;
			$data['store_name'] = $store_name;


			$data['subject'] = $this->request->post['subject'];
			$data['message'] = html_entity_decode($this->request->post['message'], ENT_QUOTES, 'UTF-8');

			$footer_template_pre = $this->language->get('newsletter_footer');


			$data['langCode'] = $this->config->get('config_language');
			if ($emails) {
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
				}
				foreach ($emails as $email) {
					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$data['email'] = $email;
						$unsub_url = $store_url . "index.php?route=guest/newsletter&email=" . urlencode($email) . "&action=unsubscribe";
						$unsub = '<a href="' . $unsub_url . '">' . $this->language->get('newsletter_unsubscribe') . '</a>';
						$data['footer'] = sprintf($footer_template_pre, $store_name, $unsub);

						$mail->setTo(trim($email));
						$mail->setFrom($store_email);
						$mail->setSender(html_entity_decode($store_name, ENT_QUOTES, 'UTF-8'));
						$mail->setSubject(html_entity_decode($this->request->post['subject'], ENT_QUOTES, 'UTF-8'));

						$message = $this->load->view('mail/newsletter', $data);

						$mail->setHtml($message);
						$mail->send();
					}
				}
			}

		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
