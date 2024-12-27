<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Subscription
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Subscription extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->language('account/subscription');


		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/subscription');

			$this->response->redirect($this->url->link('account/login'));
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$url = '';

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$data['customer_token'] = $this->session->data['customer_token'];
		$datab['breadcrumbs'] = [];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account')
		];

		$datab['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/subscription', $url)
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['subscription_list'] = $this->subscription_list();

		$data['continue'] = $this->url->link('account/account');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/subscription', $data));


	}
	public function list()
	{
		$this->response->setOutput($this->subscription_list());


	}
	public function subscription_list()
	{
		$this->load->language('account/subscription');

		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$limit = 10;

		$data['subscriptions'] = [];
		$data['customer_token'] = $this->session->data['customer_token'];
		$this->load->model('account/subscription');
		$this->load->model('account/order');
		$this->load->model('catalog/product');
		$this->load->model('localisation/currency');
		$this->load->model('localisation/subscription_status');

		$results = $this->model_account_subscription->getSubscriptions(($page - 1) * $limit, $limit);

		foreach ($results as $result) {
			$product_info = $this->model_catalog_product->getProduct($result['product_id']);

			if ($product_info) {
				$currency_info = $this->model_localisation_currency->getCurrency($result['currency_id']);

				if ($currency_info) {
					$currency = $currency_info['code'];
				} else {
					$currency = $this->config->get('config_currency');
				}

				$description = '';

				if ($result['trial_status']) {
					$trial_price = $this->currency->format($this->tax->calculate($result['trial_price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $currency);
					$trial_cycle = $result['trial_cycle'];
					$trial_frequency = $this->language->get('text_' . $result['trial_frequency']);
					$trial_duration = $result['trial_duration'];

					$description .= $result['name'] . ' - ' . sprintf($this->language->get('text_subscription_trial'), $trial_price, $trial_cycle, $trial_frequency, $trial_duration);
				}

				$price = $this->currency->format($this->tax->calculate($result['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $currency);
				$cycle = $result['cycle'];
				$frequency = $this->language->get('text_' . $result['frequency']);
				$duration = $result['duration'];

				if ($duration) {
					$description .= $result['name'] . ' - ' . sprintf($this->language->get('text_subscription_duration'), $price, $cycle, $frequency, $duration);
				} else {
					$description .= $result['name'] . ' - ' . sprintf($this->language->get('text_subscription_cancel'), $price, $cycle, $frequency);
				}

				$subscription_status_info = $this->model_localisation_subscription_status->getSubscriptionStatus($result['subscription_status_id']);

				if ($subscription_status_info) {
					$subscription_status = $subscription_status_info['name'];
				} else {
					$subscription_status = '';
				}

				$results_p = $this->model_setting_extension->getExtensionsByType('payment');
				$payStatus = [];


				// Methods supported by PayMent Proccessor either or not to render customer button controls for subscription

				// in payment proccesor model these methods needed: 

				// canCancel(param array subscription_data_by_payment_proccessor) returns boolean if that subscription can be canceled  
				// canResume(param array subscription_data_by_payment_proccessor) returns boolean // - // 
				// canRestart(param array subscription_data_by_payment_proccessor) returns boolean // - // 


				// cancelSubscription(payment_id id) returns boolean (pauses or cancels) 
				// resumeSubscription(payment_id id)  returns boolean  (resumes) 
				// restartSubscription(payment_id id, invoice id)  returns boolean (attempt to charge and start a new period)

				$can_cancel = false;
				$can_resume = false;
				$can_restart = false;

				// getSubscriptionDetails() model must return array
				// 'status' => Local id for sub, 'canceled_at' => unix time, 'default_payment_method' => id, 'full' => all payment proccessor data for sub
				$payment_extension_code = '';

				foreach ($results_p as $resultp) {
					if ($this->config->get('payment_' . $resultp['code'] . '_status')) {
						$this->load->model('extension/' . $resultp['extension'] . '/payment/' . $resultp['code']);

						try {
							if (isset($result['payment_id'])) {
								$payStatus = $this->{'model_extension_' . $resultp['extension'] . '_payment_' . $resultp['code']}->getSubscriptionDetails($result['payment_id']);
							}
							if (isset($payStatus['full'])) {
								$can_resume = $this->{'model_extension_' . $resultp['extension'] . '_payment_' . $resultp['code']}->canResume($payStatus['full']);
								$can_cancel = $this->{'model_extension_' . $resultp['extension'] . '_payment_' . $resultp['code']}->canCancel($payStatus['full']);
								$can_restart = $this->{'model_extension_' . $resultp['extension'] . '_payment_' . $resultp['code']}->canRestart($payStatus['full']);
							}
							if (!empty($payStatus)) {
								$payment_extension_code = $resultp['code'];
							}

						} catch (\Exception $e) {
							// Method not found, or an error occurred.
						}
					}
				}


				if (is_array($payStatus) && isset($payStatus['status']) && is_numeric($payStatus['status'])) {
					$subscription_status_info = $this->model_localisation_subscription_status->getSubscriptionStatus($payStatus['status']);

				}


				$data['subscriptions'][] = [
					'product_id' => $result['product_id'],
					'product_name' => $product_info['name'],
					'description' => $description,
					'product' => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'status' => empty($payStatus['canceled_at']) ? $subscription_status_info['name'] : $this->language->get('text_cancels_at') . ' ' . date($this->language->get('date_format_short'), $payStatus['canceled_at']),

					'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
					'view' => $this->url->link('account/subscription.info', 'subscription_id=' . $result['subscription_id']),
					'cancel_subscription_link' => $can_cancel ? $this->url->link('account/subscription.cancel', '&customer_token=' . $this->session->data['customer_token'] . '&track_id=' . $result['payment_id'] . '&id=' . $result['subscription_id']) . '&code=' . $payment_extension_code : '',
					'resume_subscription_link' => $can_resume ? $this->url->link('account/subscription.cancel', '&customer_token=' . $this->session->data['customer_token'] . '&track_id=' . $result['payment_id'] . '&id=' . $result['subscription_id']) . '&resume=1&code=' . $payment_extension_code : '',
					'restart_unpaid_subscription' => $can_restart ? $this->url->link('account/subscription.cancel', '&customer_token=' . $this->session->data['customer_token'] . '&track_id=' . $result['payment_id'] . '&id=' . $result['subscription_id']) . '&restart=1&code=' . $payment_extension_code . '&invoice=' . $payStatus['full']['latest_invoice'] : '',
				];
			}
		}

		$subscription_total = $this->model_account_subscription->getTotalSubscriptions();

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $subscription_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('account/subscription', 'page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($subscription_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($subscription_total - $limit)) ? $subscription_total : ((($page - 1) * $limit) + $limit), $subscription_total, ceil($subscription_total / $limit));



		return $this->load->view('account/subscription_list', $data);
	}

	/**
	 * @return object|\Ventocart\System\Engine\Action|null
	 */
	public function info(): ?object
	{
		$this->load->language('account/subscription');

		if (isset($this->request->get['subscription_id'])) {
			$subscription_id = (int) $this->request->get['subscription_id'];
		} else {
			$subscription_id = 0;
		}

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/subscription');

			$this->response->redirect($this->url->link('account/login'));
		}

		$this->load->model('account/subscription');

		$subscription_info = $this->model_account_subscription->getSubscription($subscription_id);

		if ($subscription_info) {
			$heading_title = $this->language->get('text_subscription');

			$this->document->setTitle($heading_title);

			$data['heading_title'] = $heading_title;

			$url = '';

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$datab['breadcrumbs'] = [];

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
			];
			$data['continue'] = $this->url->link('account/subscription');
			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_account'),
				'href' => $data['continue'],
			];


			$data['subscription_id'] = $subscription_info['subscription_id'];
			$data['order_id'] = $subscription_info['order_id'];

			$this->load->model('localisation/subscription_status');

			$subscription_status_info = $this->model_localisation_subscription_status->getSubscriptionStatus($subscription_info['subscription_status_id']);

			if ($subscription_status_info) {
				$data['subscription_status'] = $subscription_status_info['name'];
			} else {
				$data['subscription_status'] = '';
			}

			$data['date_added'] = date($this->language->get('date_format_short'), strtotime($subscription_info['date_added']));

			// Payment Address
			if ($subscription_info['payment_address_id']) {
				$payment_address_id = $subscription_info['payment_address_id'];
			} else {
				$payment_address_id = 0;
			}

			$this->load->model('account/address');

			$address_info = $this->model_account_address->getAddress($this->customer->getId(), $payment_address_id);

			if ($address_info) {
				if ($address_info['address_format']) {
					$format = $address_info['address_format'];
				} else {
					$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{phone}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
				}

				$find = [
					'{firstname}',
					'{lastname}',
					'{company}',
					'{address_1}',
					'{phone}',
					'{city}',
					'{postcode}',
					'{zone}',
					'{zone_code}',
					'{country}'
				];

				$replace = [
					'firstname' => $address_info['firstname'],
					'lastname' => $address_info['lastname'],
					'company' => $address_info['company'],
					'address_1' => $address_info['address_1'],
					'phone' => $address_info['phone'],
					'city' => $address_info['city'],
					'postcode' => $address_info['postcode'],
					'zone' => $address_info['zone'],
					'zone_code' => $address_info['zone_code'],
					'country' => $address_info['country']
				];

				$pattern_1 = [
					"\r\n",
					"\r",
					"\n"
				];

				$pattern_2 = [
					"/\s\s+/",
					"/\r\r+/",
					"/\n\n+/"
				];

				$data['payment_address'] = str_replace($pattern_1, '<br/>', preg_replace($pattern_2, '<br/>', trim(str_replace($find, $replace, $format))));
			} else {
				$data['payment_address'] = '';
			}

			// Shipping Address
			if ($subscription_info['shipping_address_id']) {
				$shipping_address_id = $subscription_info['shipping_address_id'];
			} else {
				$shipping_address_id = 0;
			}

			$this->load->model('account/address');

			$address_info = $this->model_account_address->getAddress($this->customer->getId(), $shipping_address_id);

			if ($address_info) {
				if ($address_info['address_format']) {
					$format = $address_info['address_format'];
				} else {
					$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{phone}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
				}

				$find = [
					'{firstname}',
					'{lastname}',
					'{company}',
					'{address_1}',
					'{phone}',
					'{city}',
					'{postcode}',
					'{zone}',
					'{zone_code}',
					'{country}'
				];

				$replace = [
					'firstname' => $address_info['firstname'],
					'lastname' => $address_info['lastname'],
					'company' => $address_info['company'],
					'address_1' => $address_info['address_1'],
					'phone' => $address_info['phone'],
					'city' => $address_info['city'],
					'postcode' => $address_info['postcode'],
					'zone' => $address_info['zone'],
					'zone_code' => $address_info['zone_code'],
					'country' => $address_info['country']
				];

				$pattern_1 = [
					"\r\n",
					"\r",
					"\n"
				];

				$pattern_2 = [
					"/\s\s+/",
					"/\r\r+/",
					"/\n\n+/"
				];

				$data['shipping_address'] = str_replace($pattern_1, '<br/>', preg_replace($pattern_2, '<br/>', trim(str_replace($find, $replace, $format))));
			} else {
				$data['shipping_address'] = '';
			}

			if ($subscription_info['shipping_method']) {
				$data['shipping_method'] = $subscription_info['shipping_method']['name'];
			} else {
				$data['shipping_method'] = '';
			}



			$this->load->model('catalog/product');

			$product_info = $this->model_catalog_product->getProduct($subscription_info['product_id']);

			if ($product_info) {
				$data['name'] = $product_info['name'];
			} else {
				$data['name'] = '';
			}

			$data['quantity'] = $subscription_info['quantity'];

			$currency_info = $this->model_localisation_currency->getCurrency($subscription_info['currency_id']);

			if ($currency_info) {
				$currency = $currency_info['code'];
			} else {
				$currency = $this->config->get('config_currency');
			}

			$this->load->model('localisation/subscription_status');

			$subscription_status_info = $this->model_localisation_subscription_status->getSubscriptionStatus($subscription_info['subscription_status_id']);

			if ($subscription_status_info) {
				$data['subscription_status'] = $subscription_status_info['name'];
			} else {
				$data['subscription_status'] = '';
			}

			$data['description'] = '';

			if ($subscription_info['trial_status']) {
				$trial_price = $this->currency->format($this->tax->calculate($subscription_info['trial_price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $currency);
				$trial_cycle = $subscription_info['trial_cycle'];
				$trial_frequency = $this->language->get('text_' . $subscription_info['trial_frequency']);
				$trial_duration = $subscription_info['trial_duration'];

				$data['description'] .= $subscription_info['name'] . ' - ' . sprintf($this->language->get('text_subscription_trial'), $trial_price, $trial_cycle, $trial_frequency, $trial_duration);
			}

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('account/subscription', $url)
			];



			$price = $this->currency->format($this->tax->calculate($subscription_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $currency);
			$cycle = $subscription_info['cycle'];
			$frequency = $this->language->get('text_' . $subscription_info['frequency']);
			$duration = $subscription_info['duration'];

			if ($duration) {
				$data['description'] .= $subscription_info['name'] . ' - ' . sprintf($this->language->get('text_subscription_duration'), $price, $cycle, $frequency, $duration);
			} else {
				$data['description'] .= $subscription_info['name'] . ' - ' . sprintf($this->language->get('text_subscription_cancel'), $price, $cycle, $frequency);
			}


			$results_p = $this->model_setting_extension->getExtensionsByType('payment');
			$payStatus = [];
			$can_cancel = false;

			$datab['breadcrumbs'][] = [
				'text' => $data['description'],
				'href' => $this->url->link('account/subscription.info', 'subscription_id=' . $this->request->get['subscription_id'] . $url)
			];
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);


			foreach ($results_p as $resultp) {
				if ($this->config->get('payment_' . $resultp['code'] . '_status')) {
					$this->load->model('extension/' . $resultp['extension'] . '/payment/' . $resultp['code']);

					try {
						if (isset($subscription_info['payment_id'])) {
							$payStatus = $this->{'model_extension_' . $resultp['extension'] . '_payment_' . $resultp['code']}->getSubscriptionDetails($subscription_info['payment_id']);
						} else {
							$payStatus['status'] = 0;
						}

						if (isset($payStatus['status']) && is_numeric($payStatus['status'])) {
							// Override status with real (payment gateway) status
							$data['subscription_status'] = $this->model_localisation_subscription_status->getSubscriptionStatus($payStatus['status']);
							// Since the particular subscription has valid status, payment methods belong to the same payment proccessor
							$data['saved_methods'] = $this->{'model_extension_' . $resultp['extension'] . '_payment_' . $resultp['code']}->getStored();
							$data['default_payment_method'] = $payStatus['default_payment_method'];

							$data['method_code'] = $resultp['code'];
							$data['track_id'] = $subscription_info['payment_id'];
						}

					} catch (\Exception $e) {
						// Method not found, or an error occurred.
					}
				}
			}






			// Orders
			$data['history'] = $this->getHistory();
			$data['order'] = $this->getOrder();

			//$data['order'] = $this->url->link('account/order.info',   '&order_id=' . $subscription_info['order_id']);
			$data['product'] = $this->url->link('product/product', 'product_id=' . $subscription_info['product_id']);

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');


			$this->response->setOutput($this->load->view('account/subscription_info', $data));
		} else {
			return new \Ventocart\System\Engine\Action('error/not_found');
		}

		return null;
	}

	/**
	 * @return void
	 */

	public function edit(): void
	{
		$json = [];
		if (isset($this->request->post['method_code']) && isset($this->request->post['track_id'])) {

			$this->load->model('extension/' . $this->request->post['method_code'] . '/payment/' . $this->request->post['method_code']);
			$result = $this->{'model_extension_' . $this->request->post['method_code'] . '_payment_' . $this->request->post['method_code']}->updateMethodSubscription($this->request->post['track_id'], $this->request->post['paymentMethod']);
			if ($result) {
				$json['success'] = "Saved";
			} else {
				$json['error'] = "Error";
			}

		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	public function history(): void
	{
		$this->load->language('account/subscription');

		$this->response->setOutput($this->getHistory());
	}

	/**
	 * @return string
	 */
	public function getHistory(): string
	{
		if (isset($this->request->get['subscription_id'])) {
			$subscription_id = (int) $this->request->get['subscription_id'];
		} else {
			$subscription_id = 0;
		}

		if (isset($this->request->get['page']) && $this->request->get['route'] == 'account/subscription.history') {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}



		$limit = 10;

		$data['histories'] = [];

		$this->load->model('account/subscription');

		$results = $this->model_account_subscription->getHistories($subscription_id, ($page - 1) * $limit, $limit);

		foreach ($results as $result) {
			$data['histories'][] = [
				'status' => $result['status'],
				'comment' => nl2br($result['comment']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			];
		}

		$subscription_total = $this->model_account_subscription->getTotalHistories($subscription_id);

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $subscription_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('account/subscription.history', 'subscription_id=' . $subscription_id . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($subscription_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($subscription_total - $limit)) ? $subscription_total : ((($page - 1) * $limit) + $limit), $subscription_total, ceil($subscription_total / $limit));

		return $this->load->view('account/subscription_history', $data);
	}

	/**
	 * @return void
	 */
	public function order(): void
	{
		$this->load->language('account/subscription');

		$this->response->setOutput($this->getOrder());
	}

	/**
	 * @return string
	 */
	public function getOrder(): string
	{
		if (isset($this->request->get['subscription_id'])) {
			$subscription_id = (int) $this->request->get['subscription_id'];
		} else {
			$subscription_id = 0;
		}

		if (isset($this->request->get['page']) && $this->request->get['route'] == 'account/subscription.order') {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$limit = 10;

		$data['orders'] = [];

		$this->load->model('account/order');

		$results = $this->model_account_order->getOrdersBySubscriptionId($subscription_id, ($page - 1) * $limit, $limit);

		foreach ($results as $result) {
			$data['orders'][] = [
				'order_id' => $result['order_id'],
				'status' => $result['status'],
				'total' => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'view' => $this->url->link('sale/subscription.order', 'order_id=' . $result['order_id'] . '&page={page}')
			];
		}

		$order_total = $this->model_account_order->getTotalOrdersBySubscriptionId($subscription_id);

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $order_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('sale/subscription.order', 'subscription_id=' . $subscription_id . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($order_total - $limit)) ? $order_total : ((($page - 1) * $limit) + $limit), $order_total, ceil($order_total / $limit));

		return $this->load->view('account/subscription_order', $data);
	}

	public function cancel(): void
	{
		$this->load->language('account/subscription');

		$json = [];
		if (isset($this->request->get['code'])) {
			$code = (string) $this->request->get['code'];
		} else {
			$code = '';
		}
		if (isset($this->request->get['track_id'])) {
			$track_id = (string) $this->request->get['track_id'];
		} else {
			$track_id = '';
		}
		if (isset($this->request->get['id'])) {
			$id = (string) $this->request->get['id'];
		} else {
			$id = '';
		}

		if (isset($this->request->get['resume'])) {
			$resume = (int) $this->request->get['resume'];
		} else {
			$resume = false;
		}
		if (isset($this->request->get['restart'])) {
			$restart = (int) $this->request->get['restart'];
		} else {
			$restart = false;
		}

		if (isset($this->request->get['invoice'])) {
			$invoice = $this->request->get['invoice'];
		} else {
			$invoice = false;
		}


		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/payment_method');

			$json['redirect'] = $this->url->link('account/login', '', true);
		}

		if (!$json) {


			$payment_method_info = $this->model_setting_extension->getExtensionByCode('payment', $code);

			if (!$payment_method_info) {
				$json['error'] = $this->language->get('error_payment_method');
			}
		}
		$passed = false;
		if (!$json) {
			$this->load->model('extension/' . $payment_method_info['extension'] . '/payment/' . $payment_method_info['code']);

			try {

				if (!$resume && !$restart) {
					// cancel or pause a subscription
					$passed = $this->{'model_extension_' . $payment_method_info['extension'] . '_payment_' . $payment_method_info['code']}->cancelSubscription($track_id);
				} else if ($restart) {
					// for past due subscriptions, start from day starting period as of today-now and charge cycle again
					$passed = $this->{'model_extension_' . $payment_method_info['extension'] . '_payment_' . $payment_method_info['code']}->restartSubscription($track_id, $invoice);

				} else if ($resume) {
					// for paused/canceled subscription, eg. pay the latest unpaid invoice
					$passed = $this->{'model_extension_' . $payment_method_info['extension'] . '_payment_' . $payment_method_info['code']}->resumeSubscription($track_id);
				}

			} catch (\Exception $e) {
				$passed = $e->getMessage();
				// Method not found, or an error occurred.
			}
			if ($passed === true) {
				if (!$resume && !$restart)
					$json['success'] = $this->language->get('text_cancelled');
				if ($resume)
					$json['success'] = $this->language->get('text_success_resume');
				if ($restart)
					$json['success'] = $this->language->get('text_success_restart');
			} else {
				$json['error'] = sprintf($this->language->get('error_not_cancelled'), $passed);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
