<?php
namespace Ventocart\Admin\Controller\Api\Sale;
class Orders extends \Ventocart\System\Engine\Controller
{
	public function index(): void
	{
		$this->load->language('sale/order');

		$data['list'] = $this->getList();

		$data['stores'] = [];

		$data['stores'][] = [
			'store_id' => 0,
			'name' => $this->language->get('text_default')
		];

		$this->load->model('setting/store');

		$stores = $this->model_setting_store->getStores();

		foreach ($stores as $store) {
			$data['stores'][] = [
				'store_id' => $store['store_id'],
				'name' => $store['name']
			];
		}

		$this->load->model('localisation/order_status');



		$data['available_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}

	public function list(): void
	{
		$this->load->language('sale/order');

		$this->response->setOutput(json_encode($this->getList()));
	}
	private function getRequestParam(string $key, $default = '')
	{
		return $this->request->post[$key] ?? $this->request->get[$key] ?? $default;
	}
	protected function getList(): array
	{

		//API end point index.php?route=api/sale/orders&page=1&order=ASC
		// Header or Post the "apitoken" eg "apitoken=xxxxxx"
		$filter_order_id = (int) $this->getRequestParam('filter_order_id', '');
		$filter_customer_id = $this->getRequestParam('filter_customer_id', '');
		$filter_customer = $this->getRequestParam('filter_customer', '');
		$filter_store_id = $this->getRequestParam('filter_store_id', '');
		$filter_order_status = $this->getRequestParam('filter_order_status', '');
		$filter_order_status_id = $this->getRequestParam('filter_order_status_id', '');
		$filter_total = $this->getRequestParam('filter_total', '');
		$filter_date_from = $this->getRequestParam('filter_date_from', '');
		$filter_date_to = $this->getRequestParam('filter_date_to', '');
		$sort = $this->getRequestParam('sort', 'o.order_id');
		$order = $this->getRequestParam('order', 'DESC');
		$page = (int) $this->getRequestParam('page', 1);


		$data['orders'] = [];

		$filter_data = [
			'filter_order_id' => $filter_order_id,
			'filter_customer_id' => $filter_customer_id,
			'filter_customer' => $filter_customer,
			'filter_store_id' => $filter_store_id,
			'filter_order_status' => $filter_order_status,
			'filter_order_status_id' => $filter_order_status_id,
			'filter_total' => $filter_total,
			'filter_date_from' => $filter_date_from,
			'filter_date_to' => $filter_date_to,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * 50,
			'limit' => (int) 50
		];

		$this->load->model('sale/order');

		$order_total = $this->model_sale_order->getTotalOrders($filter_data);

		$results = $this->model_sale_order->getOrders($filter_data);

		foreach ($results as $result) {
			$data['orders'][] = [
				'order_id' => $result['order_id'],
				'store_name' => $result['store_name'],
				'customer' => $result['customer'],
				'order_status' => $result['order_status'] ? $result['order_status'] : $this->language->get('text_missing'),
				'total' => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified' => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'shipping_method' => $result['shipping_method'],
				'view' => 'api/sale/orders.info&order_id=' . $result['order_id'],
			];
		}

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $order_total,
			'page' => $page,
			'limit' => $this->config->get('config_pagination_admin'),
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $this->config->get('config_pagination_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_pagination_admin')) > ($order_total - $this->config->get('config_pagination_admin'))) ? $order_total : ((($page - 1) * $this->config->get('config_pagination_admin')) + $this->config->get('config_pagination_admin')), $order_total, ceil($order_total / $this->config->get('config_pagination_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		return $data;
	}

	public function info(): void
	{
		$this->load->language('sale/order');

		if (isset($this->request->get['order_id'])) {
			$order_id = (int) $this->request->get['order_id'];
		} else {
			$order_id = 0;
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$data['text_form'] = !$order_id ? $this->language->get('text_add') : sprintf($this->language->get('text_edit'), $order_id);

		if ($order_id) {
			$this->load->model('sale/order');

			$order_info = $this->model_sale_order->getOrder($order_id);
		}

		if (!empty($order_info)) {
			$data['order_id'] = $order_info['order_id'];
		} else {
			$data['order_id'] = '';
		}

		// Invoice
		if (!empty($order_info)) {
			$data['invoice_no'] = $order_info['invoice_no'];
		} else {
			$data['invoice_no'] = '';
		}

		if (!empty($order_info)) {
			$data['invoice_prefix'] = $order_info['invoice_prefix'];
		} else {
			$data['invoice_prefix'] = '';
		}

		// Customer
		if (!empty($order_info)) {
			$data['customer_id'] = $order_info['customer_id'];
		} else {
			$data['customer_id'] = 0;
		}

		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		if (!empty($order_info)) {
			$data['customer_group_id'] = $order_info['customer_group_id'];
		} else {
			$data['customer_group_id'] = $this->config->get('config_customer_group_id');
		}

		$customer_group_info = $this->model_customer_customer_group->getCustomerGroup($data['customer_group_id']);

		if ($customer_group_info) {
			$data['customer_group'] = $customer_group_info['name'];
		} else {
			$data['customer_group'] = '';
		}

		if (!empty($order_info)) {
			$data['firstname'] = $order_info['firstname'];
		} else {
			$data['firstname'] = '';
		}

		if (!empty($order_info)) {
			$data['lastname'] = $order_info['lastname'];
		} else {
			$data['lastname'] = '';
		}

		if (!empty($order_info)) {
			$data['email'] = $order_info['email'];
		} else {
			$data['email'] = '';
		}

		if (!empty($order_info)) {
			$data['telephone'] = $order_info['telephone'];
		} else {
			$data['telephone'] = '';
		}

		if (!empty($order_info)) {
			$data['account_custom_field'] = $order_info['custom_field'];
		} else {
			$data['account_custom_field'] = [];
		}

		// Custom Fields
		$data['custom_fields'] = [];

		$filter_data = [
			'filter_status' => 1,
			'sort' => 'cf.sort_order',
			'order' => 'ASC'
		];

		$this->load->model('customer/custom_field');
		$this->load->model('customer/customer');
		$custom_fields = $this->model_customer_custom_field->getCustomFields($filter_data);

		foreach ($custom_fields as $custom_field) {
			$data['custom_fields'][] = [
				'custom_field_id' => $custom_field['custom_field_id'],
				'custom_field_value' => $this->model_customer_custom_field->getValues($custom_field['custom_field_id']),
				'name' => $custom_field['name'],
				'value' => $custom_field['value'],
				'type' => $custom_field['type'],
				'location' => $custom_field['location'],
				'sort_order' => $custom_field['sort_order']
			];
		}

		// Products
		$data['order_products'] = [];

		$this->load->model('sale/order');
		$this->load->model('sale/subscription');
		$this->load->model('tool/upload');

		$products = $this->model_sale_order->getProducts($order_id);

		foreach ($products as $product) {
			$option_data = [];

			$options = $this->model_sale_order->getOptions($order_id, $product['order_product_id']);

			foreach ($options as $option) {
				if ($option['type'] != 'file') {
					$option_data[] = [
						'name' => $option['name'],
						'value' => $option['value'],
						'type' => $option['type']
					];
				} else {
					$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

					if ($upload_info) {
						$option_data[] = [
							'name' => $option['name'],
							'value' => $upload_info['name'],
							'type' => $option['type'],
							'href' => $this->url->link('tool/upload.download', 'user_token=' . $this->session->data['user_token'] . '&code=' . $upload_info['code'])
						];
					}
				}
			}

			$description = '';

			$subscription_info = $this->model_sale_order->getSubscription($order_id, $product['order_product_id']);

			if ($subscription_info) {
				if ($subscription_info['trial_status']) {
					$trial_price = $this->currency->format($subscription_info['trial_price'], $this->config->get('config_currency'));
					$trial_cycle = $subscription_info['trial_cycle'];
					$trial_frequency = $this->language->get('text_' . $subscription_info['trial_frequency']);
					$trial_duration = $subscription_info['trial_duration'];

					$description .= sprintf($this->language->get('text_subscription_trial'), $trial_price, $trial_cycle, $trial_frequency, $trial_duration);
				}

				$price = $this->currency->format($subscription_info['price'], $this->config->get('config_currency'));
				$cycle = $subscription_info['cycle'];
				$frequency = $this->language->get('text_' . $subscription_info['frequency']);
				$duration = $subscription_info['duration'];

				if ($subscription_info['duration']) {
					$description .= sprintf($this->language->get('text_subscription_duration'), $price, $cycle, $frequency, $duration);
				} else {
					$description .= sprintf($this->language->get('text_subscription_cancel'), $price, $cycle, $frequency);
				}
			}

			$subscription_info = $this->model_sale_subscription->getSubscriptionByOrderProductId($order_id, $product['order_product_id']);

			if ($subscription_info) {
				$subscription = $this->url->link('sale/subscription.info', 'user_token=' . $this->session->data['user_token'] . '&subscription_id=' . $subscription_info['subscription_id']);
			} else {
				$subscription = '';
			}

			if (isset($order_info)) {

				$data['order_products'][] = [
					'order_product_id' => $product['order_product_id'],
					'product_id' => $product['product_id'],
					'name' => $product['name'],
					'sku' => $product['sku'],
					'model' => $product['model'],
					'option' => $option_data,
					'subscription' => $subscription,
					'subscription_description' => $description,
					'quantity' => $product['quantity'],
					'price' => $this->currency->format($product['price'] + ($this->config->get('config_tax') ? $product['tax'] : 0), $order_info['currency_code'], $order_info['currency_value']),
					'total' => $this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $order_info['currency_code'], $order_info['currency_value']),
					'reward' => $product['reward']
				];

			}
		}

		// Totals
		$data['order_totals'] = [];

		$totals = $this->model_sale_order->getTotals($order_id);

		foreach ($totals as $total) {
			$data['order_totals'][] = [
				'title' => $total['title'],
				'text' => $this->currency->format($total['value'], $order_info['currency_code'], $order_info['currency_value'])
			];
		}

		// Delete any old session
		if (isset($this->session->data['api_session'])) {
			$session = new \Ventocart\System\Library\Session($this->config->get('session_engine'), $this->registry);
			$session->start($this->session->data['api_session']);
			$session->destroy();
		}

		if (!empty($order_info)) {
			$store_id = $order_info['store_id'];
		} else {
			$store_id = 0;
		}

		if (!empty($order_info)) {
			$language = $order_info['language_code'];
		} else {
			$language = $this->config->get('config_language');
		}

		// Create a store instance using loader class to call controllers, models, views, libraries
		$this->load->model('setting/store');

		$store = $this->model_setting_store->createStoreInstance($store_id, $language);

		// 2. Store the new session ID so we're not creating new session on every page load
		$this->session->data['api_session'] = $store->session->getId();

		// 3. To use the order API it requires an API ID.
		$store->session->data['api_id'] = (int) $this->config->get('config_api_id');

		if (!empty($order_info)) {
			// 4. Add the request vars and remove the unneeded ones
			$store->request->get = $this->request->post;
			$store->request->post = $this->request->post;

			// 5. Load the order data
			$store->request->get['route'] = 'api/sale/orders.load';
			//$store->request->get['language'] = $language;

			unset($store->request->get['user_token']);
			unset($store->request->get['action']);

			$store->load->controller($store->request->get['route']);
		}

		// Store
		$data['stores'] = [];

		$data['stores'][] = [
			'store_id' => 0,
			'name' => $this->config->get('config_name')
		];

		$this->load->model('setting/store');

		$results = $this->model_setting_store->getStores();

		foreach ($results as $result) {
			$data['stores'][] = [
				'store_id' => $result['store_id'],
				'name' => $result['name']
			];
		}

		if (!empty($order_info)) {
			$data['store_id'] = $order_info['store_id'];
		} else {
			$data['store_id'] = $this->config->get('config_store_id');
		}

		// Language
		$this->load->model('localisation/language');

		//$data['languages'] = $this->model_localisation_language->getLanguages();

		if (!empty($order_info)) {
			$data['language_code'] = $order_info['language_code'];
		} else {
			$data['language_code'] = $this->config->get('config_language');
		}


		// Currency
		$this->load->model('localisation/currency');

		//$data['currencies'] = $this->model_localisation_currency->getCurrencies();

		if (!empty($order_info)) {
			$data['currency_code'] = $order_info['currency_code'];
		} else {
			$data['currency_code'] = $this->config->get('config_currency');
		}

		// Coupon, Reward
		$data['total_coupon'] = '';

		$data['total_reward'] = 0;

		if ($order_id) {
			$order_totals = $this->model_sale_order->getTotals($order_id);

			foreach ($order_totals as $order_total) {
				// If coupon or reward points
				$start = strpos($order_total['title'], '(') + 1;
				$end = strrpos($order_total['title'], ')');

				if ($start && $end) {
					$data['total_' . $order_total['code']] = substr($order_total['title'], $start, $end - $start);
				}
			}
		}

		// Reward Points
		if (!empty($order_info)) {
			$data['points'] = $this->model_sale_order->getRewardTotal($order_id);
		} else {
			$data['points'] = 0;
		}

		// Reward Points
		if (!empty($order_info)) {
			$data['reward_total'] = $this->model_customer_customer->getTotalRewardsByOrderId($order_id);
		} else {
			$data['reward_total'] = 0;
		}

		// Affiliate
		if (!empty($order_info)) {
			$data['affiliate_id'] = $order_info['affiliate_id'];
		} else {
			$data['affiliate_id'] = 0;
		}

		if (!empty($order_info)) {
			$data['affiliate'] = $order_info['affiliate'];
		} else {
			$data['affiliate'] = '';
		}

		// Commission
		if (!empty($order_info) && (float) $order_info['commission']) {
			$data['commission'] = $this->currency->format($order_info['commission'], $this->config->get('config_currency'));
		} else {
			$data['commission'] = '';
		}

		if (!empty($order_info)) {
			$data['commission_total'] = $this->model_customer_customer->getTotalTransactionsByOrderId($order_id);
		} else {
			$data['commission_total'] = '';
		}

		// Addresses
		if (!empty($order_info)) {
			$this->load->model('customer/customer');

			$data['addresses'] = $this->model_customer_customer->getAddresses($order_info['customer_id']);
		} else {
			$data['addresses'] = [];
		}

		// Payment Address
		if (!empty($order_info)) {
			$data['payment_address_id'] = $order_info['payment_address_id'];
		} else {
			$data['payment_address_id'] = 0;
		}

		if (!empty($order_info)) {
			$data['payment_firstname'] = $order_info['payment_firstname'];
		} else {
			$data['payment_firstname'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_lastname'] = $order_info['payment_lastname'];
		} else {
			$data['payment_lastname'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_company'] = $order_info['payment_company'];
		} else {
			$data['payment_company'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_address_1'] = $order_info['payment_address_1'];
		} else {
			$data['payment_address_1'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_phone'] = $order_info['payment_phone'];
		} else {
			$data['payment_phone'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_city'] = $order_info['payment_city'];
		} else {
			$data['payment_city'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_postcode'] = $order_info['payment_postcode'];
		} else {
			$data['payment_postcode'] = '';
		}

		// Countries
		$this->load->model('localisation/country');

		//aaaaaaaaaaa$data['countries'] = $this->model_localisation_country->getCountries();

		if (!empty($order_info)) {
			$data['payment_country_id'] = $order_info['payment_country_id'];
		} else {
			$data['payment_country_id'] = 0;
		}

		if (!empty($order_info)) {
			$data['payment_country'] = $order_info['payment_country'];
		} else {
			$data['payment_country'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_zone_id'] = $order_info['payment_zone_id'];
		} else {
			$data['payment_zone_id'] = 0;
		}

		if (!empty($order_info)) {
			$data['payment_zone'] = $order_info['payment_zone'];
		} else {
			$data['payment_zone'] = '';
		}

		if (!empty($order_info)) {
			$data['payment_custom_field'] = $order_info['payment_custom_field'];
		} else {
			$data['payment_custom_field'] = [];
		}

		// Payment Method
		if (isset($order_info['payment_method']['name'])) {
			$data['payment_method'] = $order_info['payment_method']['name'];
		} else {
			$data['payment_method'] = '';
		}

		if (isset($order_info['payment_method']['code'])) {
			$data['payment_code'] = $order_info['payment_method']['code'];
		} else {
			$data['payment_code'] = '';
		}

		// Shipping Address
		if (!empty($order_info)) {
			$data['shipping_address_id'] = $order_info['shipping_address_id'];
		} else {
			$data['shipping_address_id'] = 0;
		}

		if (!empty($order_info)) {
			$data['shipping_firstname'] = $order_info['shipping_firstname'];
		} else {
			$data['shipping_firstname'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_lastname'] = $order_info['shipping_lastname'];
		} else {
			$data['shipping_lastname'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_company'] = $order_info['shipping_company'];
		} else {
			$data['shipping_company'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_address_1'] = $order_info['shipping_address_1'];
		} else {
			$data['shipping_address_1'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_phone'] = $order_info['shipping_phone'];
		} else {
			$data['shipping_phone'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_city'] = $order_info['shipping_city'];
		} else {
			$data['shipping_city'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_postcode'] = $order_info['shipping_postcode'];
		} else {
			$data['shipping_postcode'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_country_id'] = $order_info['shipping_country_id'];
		} else {
			$data['shipping_country_id'] = 0;
		}

		if (!empty($order_info)) {
			$data['shipping_country'] = $order_info['shipping_country'];
		} else {
			$data['shipping_country'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_zone_id'] = $order_info['shipping_zone_id'];
		} else {
			$data['shipping_zone_id'] = 0;
		}

		if (!empty($order_info)) {
			$data['shipping_zone'] = $order_info['shipping_zone'];
		} else {
			$data['shipping_zone'] = '';
		}

		if (!empty($order_info)) {
			$data['shipping_custom_field'] = $order_info['shipping_custom_field'];
		} else {
			$data['shipping_custom_field'] = [];
		}

		// Shipping method
		if (isset($order_info['shipping_method']['name'])) {
			$data['shipping_method'] = $order_info['shipping_method']['name'];
		} else {
			$data['shipping_method'] = ' ';
		}

		if (isset($order_info['shipping_method']['code'])) {
			$data['shipping_code'] = $order_info['shipping_method']['code'];
		} else {
			$data['shipping_code'] = '';
		}

		// Comment
		if (!empty($order_info)) {
			$data['comment'] = nl2br($order_info['comment']);
		} else {
			$data['comment'] = '';
		}

		// Totals
		$data['order_totals'] = [];

		if (!empty($order_info)) {
			$totals = $this->model_sale_order->getTotals($order_id);

			foreach ($totals as $total) {
				$data['order_totals'][] = [
					'title' => $total['title'],
					'text' => $this->currency->format($total['value'], $order_info['currency_code'], $order_info['currency_value'])
				];
			}
		}




		if (!empty($order_info)) {
			$data['order_status_id'] = $order_info['order_status_id'];

		} else {
			$data['order_status_id'] = $this->config->get('config_order_status_id');
		}
		$statuses = $this->model_localisation_order_status->getOrderStatuses();
		foreach ($statuses as $status) {
			if ($status['order_status_id'] == $data['order_status_id']) {
				$data['order_status_name'] = $status['name'];
				break;
			}
		}
		// Additional tabs that are payment gateway specific
		$data['tabs'] = [];

		// Extension Order Tabs can are called here.
		$this->load->model('setting/extension');

		if (!empty($order_info['payment_method']['code'])) {
			if (isset($order_info['payment_method']['code'])) {
				$code = oc_substr($order_info['payment_method']['code'], 0, strpos($order_info['payment_method']['code'], '.'));
			} else {
				$code = '';
			}

			$extension_info = $this->model_setting_extension->getExtensionByCode('payment', $code);

			if ($extension_info && $this->user->hasPermission('access', 'extension/' . $extension_info['extension'] . '/payment/' . $extension_info['code'])) {
				$output = $this->load->controller('extension/' . $extension_info['extension'] . '/payment/' . $extension_info['code'] . '.order', $order_info);

				if (!$output instanceof \Exception) {
					$this->load->language('extension/' . $extension_info['extension'] . '/payment/' . $extension_info['code'], 'extension');

					$data['tabs'][] = [
						'code' => $extension_info['code'],
						'title' => $this->language->get('extension_heading_title'),
						'content' => $output
					];
				}
			}
		}

		// Extension Order Tabs can are called here.
		$this->load->model('setting/extension');

		$extensions = $this->model_setting_extension->getExtensionsByType('fraud');

		foreach ($extensions as $extension) {
			if ($this->config->get('fraud_' . $extension['code'] . '_status')) {
				$this->load->language('extension/' . $extension['extension'] . '/fraud/' . $extension['code'], 'extension');

				$output = $this->load->controller('extension/' . $extension['extension'] . '/fraud/' . $extension['code'] . '.order');

				if (!$output instanceof \Exception) {
					$data['tabs'][] = [
						'code' => $extension['extension'],
						'title' => $this->language->get('extension_heading_title'),
						'content' => $output
					];
				}
			}
		}

		// Additional information
		if (!empty($order_info)) {
			$data['ip'] = $order_info['ip'];
			$data['forwarded_ip'] = $order_info['forwarded_ip'];
			$data['user_agent'] = $order_info['user_agent'];
			$data['accept_language'] = $order_info['accept_language'];
			$data['date_added'] = date($this->language->get('date_format_short'), strtotime($order_info['date_added']));
			$data['date_modified'] = date($this->language->get('date_format_short'), strtotime($order_info['date_modified']));
		} else {
			$data['ip'] = '';
			$data['forwarded_ip'] = '';
			$data['user_agent'] = '';
			$data['accept_language'] = '';
			$data['date_added'] = date($this->language->get('date_format_short'), time());
			$data['date_modified'] = date($this->language->get('date_format_short'), time());
		}

		// Histories
		$data['history'] = $this->getHistory();


		$this->response->setOutput(json_encode($data));
	}

	// Method to call the store front API and return a response.
	public function call(): void
	{
		if (isset($this->request->post['store_id'])) {
			$store_id = (int) $this->request->post['store_id'];
		} else {
			$store_id = 0;
		}

		if (isset($this->request->post['language'])) {
			$language = $this->request->post['language'];
		} else {
			$language = $this->config->get('config_language');
		}

		if (isset($this->request->post['action'])) {
			$action = $this->request->post['action'];
		} else {
			$action = '';
		}

		if (isset($this->session->data['api_session'])) {
			$session_id = $this->session->data['api_session'];
		} else {
			$session_id = '';
		}

		if ($action) {
			// 1. Create a store instance using loader class to call controllers, models, views, libraries
			$this->load->model('setting/store');

			$store = $this->model_setting_store->createStoreInstance($store_id, $language, $session_id);

			// 2. Add the request vars and remove the unneeded ones
			$store->request->get = $this->request->post;
			$store->request->post = $this->request->post;

			$store->request->get['route'] = 'api/' . $action;

			// 3. Remove the unneeded keys
			unset($store->request->get['action']);
			unset($store->request->get['user_token']);

			// Call the required API controller
			$store->load->controller($store->request->get['route']);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput($store->response->getOutput());
		}
	}





	public function history(): void
	{
		$this->load->language('sale/order');

		$this->response->setOutput(json_encode($this->getHistory()));
	}

	public function getHistory(): array
	{
		if (isset($this->request->post['order_id'])) {
			$order_id = (int) $this->request->post['order_id'];
		} else {
			$order_id = 0;
		}

		if (isset($this->request->post['page']) && $this->request->post['route'] == 'sale/order.history') {
			$page = (int) $this->request->post['page'];
		} else {
			$page = 1;
		}

		$limit = 10;

		$data['histories'] = [];

		$this->load->model('sale/order');

		$results = $this->model_sale_order->getHistories($order_id, ($page - 1) * $limit, $limit);

		foreach ($results as $result) {
			$data['histories'][] = [
				'status' => $result['status'],
				'comment' => nl2br($result['comment']),
				'notify' => $result['notify'] ? $this->language->get('text_yes') : $this->language->get('text_no'),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			];
		}

		$history_total = $this->model_sale_order->getTotalHistories($order_id);

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $history_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('sale/order.history', '&order_id=' . $order_id . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($history_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($history_total - $limit)) ? $history_total : ((($page - 1) * $limit) + $limit), $history_total, ceil($history_total / $limit));

		return $data;
	}

	public function createInvoiceNo(): void
	{
		$this->load->language('sale/order');

		$json = [];


		$order_id = (int) $this->getRequestParam('order_id', '');

		$this->load->model('sale/order');

		$order_info = $this->model_sale_order->getOrder($order_id);

		if ($order_info) {
			if ($order_info['invoice_no']) {
				$json['error'] = $this->language->get('error_invoice_no');
			}
		} else {
			$json['error'] = $this->language->get('error_order');
		}

		if (!$json) {
			$json['success'] = $this->language->get('text_success');

			$this->load->model('sale/order');

			$json['invoice_no'] = $this->model_sale_order->createInvoiceNo($order_id);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function addReward(): void
	{
		$this->load->language('sale/order');

		$json = [];

		$order_id = (int) $this->getRequestParam('order_id', '');



		$this->load->model('sale/order');

		$order_info = $this->model_sale_order->getOrder($order_id);

		if ($order_info) {
			if (!$order_info['customer_id']) {
				$json['error'] = $this->language->get('error_customer');
			}
		} else {
			$json['error'] = $this->language->get('error_order');
		}

		$this->load->model('customer/customer');

		$reward_total = $this->model_customer_customer->getTotalRewardsByOrderId($order_id);

		if ($reward_total) {
			$json['error'] = $this->language->get('error_reward_add');
		}

		if (!$json) {
			$this->model_customer_customer->addReward($order_info['customer_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['reward'], $order_id);

			$json['success'] = $this->language->get('text_reward_add');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function removeReward(): void
	{
		$this->load->language('sale/order');

		$json = [];

		$order_id = (int) $this->getRequestParam('order_id', '');



		$this->load->model('sale/order');

		$order_info = $this->model_sale_order->getOrder($order_id);

		if (!$order_info) {
			$json['error'] = $this->language->get('error_order');
		}

		if (!$json) {
			$this->load->model('customer/customer');

			$this->model_customer_customer->deleteReward($order_id);

			$json['success'] = $this->language->get('text_reward_remove');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function addCommission(): void
	{
		$this->load->language('sale/order');

		$json = [];

		$order_id = (int) $this->getRequestParam('order_id', '');

		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('sale/order');

		$order_info = $this->model_sale_order->getOrder($order_id);

		if ($order_info) {
			$this->load->model('customer/customer');

			$customer_info = $this->model_customer_customer->getCustomer($order_info['affiliate_id']);

			if (!$customer_info) {
				$json['error'] = $this->language->get('error_affiliate');
			}

			$affiliate_total = $this->model_customer_customer->getTotalTransactionsByOrderId($order_id);

			if ($affiliate_total) {
				$json['error'] = $this->language->get('error_commission_add');
			}
		} else {
			$json['error'] = $this->language->get('error_order');
		}

		if (!$json) {
			$this->model_customer_customer->addTransaction($order_info['affiliate_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['commission'], $order_id);

			$json['success'] = $this->language->get('text_commission_add');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function shortDocumentaton(): void
	{
		$json = [
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders',
				'desc' => 'List 50 orders. Use page=n to switch pages. Available filters: filter_order_id, filter_date_from, filter_date_to, filter_total, filter_customer_id, filter_order_status, filter_order_status_id, etc.',
			],
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders.info',
				'desc' => 'Retrieve detailed information for order_id=n, including client information and products.',
			],
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders.history',
				'desc' => 'Retrieve history for order_id=n.',
			],
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders.createInvoiceNo',
				'desc' => 'Create an invoice number for order_id=n.',
			],
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders.addReward',
				'desc' => 'Add a reward to the customer via order_id=n.',
			],
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders.removeReward',
				'desc' => 'Remove a reward for an order.',
			],
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders.addCommission',
				'desc' => 'Add commission to the affiliate associated with the order.',
			],
			[
				'endpoint' => 'example.com/cp-admin/index.php?route=api/sale/orders.removeCommission',
				'desc' => 'Remove commission from the affiliate for the order.',
			],
			[
				'endpoint' => 'http://ventocart.lan/cp-natsos/index.php?route=api/sale/orders.addHisstory',
				'desc' => 'Change the status of an order and/or notify the customer. Parameters: order_id=n, override=n, notify=n, comment=string, order_status_id=n.',
			],
		];

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	public function removeCommission(): void
	{
		$this->load->language('sale/order');

		$json = [];

		$order_id = (int) $this->getRequestParam('order_id', '');

		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('sale/order');

		$order_info = $this->model_sale_order->getOrder($order_id);

		if (!$order_info) {
			$json['error'] = $this->language->get('error_order');
		}

		if (!$json) {
			$this->load->model('customer/customer');

			$this->model_customer_customer->deleteTransactionByOrderId($order_id);

			$json['success'] = $this->language->get('text_commission_remove');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * API Endpoint: Add History to an Order
	 * 
	 * Description:
	 * This API allows adding a history entry to an order. It forwards the provided 
	 * parameters to the `sale/order.addHistory` controller for processing. This endpoint 
	 * is typically used to update the order status, add comments, or notify the customer.
	 *
	 * Expected Input (POST or GET parameters):
	 * - `order_status_id` (int): The ID of the new order status.
	 * - `override` (int): Indicates whether to override restrictions (e.g., 0 or 1).
	 * - `notify` (int): Indicates whether to notify the customer (0 for no, 1 for yes).
	 * - `comment` (string): A comment to include with the history entry.
	 * - `order_id` (int): The ID of the order to update (required).
	 *
	 * Response:
	 * - JSON object indicating success or failure and any relevant messages.
	 */
	public function addHisstory(): void
	{
		// Fetch the required parameters from the request (GET or POST)
		$params = [
			'order_status_id' => (int) $this->getRequestParam('order_status_id', 0),
			'override' => (int) $this->getRequestParam('override', 0),
			'notify' => (int) $this->getRequestParam('notify', 0),
			'comment' => $this->getRequestParam('comment', ''),
			'order_id' => (int) $this->getRequestParam('order_id', 0)
		];
		$this->request->post = $params;
		// Validate the required parameter `order_id`
		if (!$params['order_id']) {
			$this->response->setOutput(json_encode([
				'success' => false,
				'message' => 'Missing or invalid `order_id` parameter.'
			]));
			return;
		}

		$this->load->model('actions/sale/order');
		$json = $this->model_actions_sale_order->addHistory();


		// Output the result as a JSON response
		$this->response->setOutput(json_encode($json));
	}

}