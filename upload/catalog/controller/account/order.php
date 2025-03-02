<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Order
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Order extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{


		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->load->language('account/order');

		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/order');

			$this->response->redirect($this->url->link('account/login'));
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$url = '';

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

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
			'href' => $this->url->link('account/order', $url)
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$limit = 10;

		$data['orders'] = [];

		$this->load->model('account/order');
		$this->load->model('localisation/order_status');

		$results = $this->model_account_order->getOrders(($page - 1) * $limit, $limit);

		foreach ($results as $result) {
			$order_status_info = $this->model_localisation_order_status->getOrderStatus($result['order_status_id']);

			if ($order_status_info) {
				$order_status = $order_status_info['name'];
			} else {
				$order_status = '';
			}

			$product_total = $this->model_account_order->getTotalProductsByOrderId($result['order_id']);


			$data['orders'][] = [
				'order_id' => $result['order_id'],
				'name' => $result['firstname'] . ' ' . $result['lastname'],
				'status' => $order_status,
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'products' => ($product_total),
				'total' => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value']),
				'view' => $this->url->link('account/order.info', 'order_id=' . $result['order_id']),
			];
		}

		$order_total = $this->model_account_order->getTotalOrders();

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $order_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('account/order', 'page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($order_total - $limit)) ? $order_total : ((($page - 1) * $limit) + $limit), $order_total, ceil($order_total / $limit));

		$data['continue'] = $this->url->link('account/account');


		$this->response->setOutput($this->load->view('account/order_list', $data));
	}

	public function info(): ?object
	{

		$this->load->language('account/order');

		if (isset($this->request->get['order_id'])) {
			$order_id = (int) $this->request->get['order_id'];
		} else {
			$order_id = 0;
		}

		if (!empty($this->session->data['grand_order_access'])) {
			$this->request->get['order_id'] = $this->session->data['grand_order_access'];
			$order_id = $this->session->data['grand_order_access'];
		}
		if (empty($this->session->data['grand_order_access'])) {
			if (!$this->customer->isLogged()) {
				$this->session->data['redirect'] = $this->url->link('account/order');

				$this->response->redirect($this->url->link('account/login'));
			}
		}

		$this->load->model('account/order');

		$order_info = $this->model_account_order->getOrder($order_id);


		if (!empty($order_info)) {
			$heading_title = sprintf($this->language->get('text_order'), $order_info['order_id']);

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

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('text_account'),
				'href' => $this->url->link('account/account')
			];

			$datab['breadcrumbs'][] = [
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('account/order', $url)
			];

			$datab['breadcrumbs'][] = [
				'text' => $heading_title,
				'href' => $this->url->link('account/order.info', 'order_id=' . $order_id . $url)
			];
			$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
			if ($order_info['invoice_no']) {
				$data['invoice_no'] = $order_info['invoice_prefix'] . $order_info['invoice_no'];
			} else {
				$data['invoice_no'] = '';
			}

			$data['order_id'] = $order_id;

			$this->load->model('localisation/order_status');

			$order_status_info = $this->model_localisation_order_status->getOrderStatus($order_info['order_status_id']);

			if ($order_status_info) {
				$data['order_status'] = $order_status_info['name'];
			} else {
				$data['order_status'] = '';
			}

			$data['date_added'] = date($this->language->get('date_format_short'), strtotime($order_info['date_added']));

			// Payment Address
			if ($order_info['payment_address_format']) {
				$format = $order_info['payment_address_format'];
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
				'firstname' => $order_info['payment_firstname'],
				'lastname' => $order_info['payment_lastname'],
				'company' => $order_info['payment_company'],
				'address_1' => $order_info['payment_address_1'],
				'phone' => $order_info['payment_phone'],
				'city' => $order_info['payment_city'],
				'postcode' => $order_info['payment_postcode'],
				'zone' => $order_info['payment_zone'],
				'zone_code' => $order_info['payment_zone_code'],
				'country' => $order_info['payment_country']
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

			$data['payment_method'] = $order_info['payment_method']['name'];

			// Shipping Address
			if ($order_info['shipping_method']) {
				if ($order_info['shipping_address_format']) {
					$format = $order_info['shipping_address_format'];
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
					'firstname' => $order_info['shipping_firstname'],
					'lastname' => $order_info['shipping_lastname'],
					'company' => $order_info['shipping_company'],
					'address_1' => $order_info['shipping_address_1'],
					'phone' => $order_info['shipping_phone'],
					'city' => $order_info['shipping_city'],
					'postcode' => $order_info['shipping_postcode'],
					'zone' => $order_info['shipping_zone'],
					'zone_code' => $order_info['shipping_zone_code'],
					'country' => $order_info['shipping_country']
				];

				$data['shipping_address'] = str_replace($pattern_1, '<br/>', preg_replace($pattern_2, '<br/>', trim(str_replace($find, $replace, $format))));

				$data['shipping_method'] = $order_info['shipping_method']['name'];
			} else {
				$data['shipping_address'] = '';
				$data['shipping_method'] = '';
			}

			$this->load->model('account/subscription');
			$this->load->model('catalog/product');
			$this->load->model('tool/upload');

			// Products
			$data['products'] = [];

			$products = $this->model_account_order->getProducts($order_id);

			foreach ($products as $product) {
				$option_data = [];

				$options = $this->model_account_order->getOptions($order_id, $product['order_product_id']);

				foreach ($options as $option) {
					if ($option['type'] != 'file') {
						$value = $option['value'];
					} else {
						$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

						if ($upload_info) {
							$value = $upload_info['code'];
						} else {
							$value = '';
						}
					}

					$option_data[] = [
						'name' => $option['name'],
						'value' => (oc_strlen($value) > 20 ? oc_substr($value, 0, 20) . '..' : $value)
					];
				}

				$description = '';

				$subscription_info = $this->model_account_order->getSubscription($order_id, $product['order_product_id']);

				if ($subscription_info) {
					if ($subscription_info['trial_status']) {
						$trial_price = $this->currency->format($subscription_info['trial_price'] + ($this->config->get('config_tax') ? $subscription_info['trial_tax'] : 0), $order_info['currency_code'], $order_info['currency_value']);
						$trial_cycle = $subscription_info['trial_cycle'];
						$trial_frequency = $this->language->get('text_' . $subscription_info['trial_frequency']);
						$trial_duration = $subscription_info['trial_duration'];

						$description .= sprintf($this->language->get('text_subscription_trial'), $trial_price, $trial_cycle, $trial_frequency, $trial_duration);
					}

					$price = $this->currency->format($subscription_info['price'] + ($this->config->get('config_tax') ? $subscription_info['tax'] : 0), $order_info['currency_code'], $order_info['currency_value']);
					$cycle = $subscription_info['cycle'];
					$frequency = $this->language->get('text_' . $subscription_info['frequency']);
					$duration = $subscription_info['duration'];

					if ($subscription_info['duration']) {
						$description .= sprintf($this->language->get('text_subscription_duration'), $price, $cycle, $frequency, $duration);
					} else {
						$description .= sprintf($this->language->get('text_subscription_cancel'), $price, $cycle, $frequency);
					}
				}

				$subscription_info = $this->model_account_subscription->getSubscriptionByOrderProductId($order_id, $product['order_product_id']);

				if ($subscription_info) {
					$subscription = $this->url->link('account/subscription.info', 'subscription_id=' . $subscription_info['subscription_id']);
				} else {
					$subscription = '';
				}

				$product_info = $this->model_catalog_product->getProduct($product['product_id']);

				if ($product_info) {
					$reorder = $this->url->link('account/order.reorder', 'order_id=' . $order_id . '&order_product_id=' . $product['order_product_id']);
				} else {
					$reorder = '';
				}

				$data['products'][] = [
					'name' => $product['name'],
					'sku' => $product['sku'],
					'option' => $option_data,
					'subscription' => $subscription,
					'subscription_description' => $description,
					'quantity' => $product['quantity'],
					'price' => $this->currency->format($product['price'] + ($this->config->get('config_tax') ? $product['tax'] : 0), $order_info['currency_code'], $order_info['currency_value']),
					'total' => $this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $order_info['currency_code'], $order_info['currency_value']),
					'href' => $this->url->link('product/product', 'product_id=' . $product['product_id']),
					'reorder' => $reorder,
					'return' => $this->url->link('account/returns.add', 'order_id=' . $order_info['order_id'] . '&product_id=' . $product['product_id'])
				];
			}



			// Totals
			$data['totals'] = [];

			$totals = $this->model_account_order->getTotals($order_id);

			foreach ($totals as $total) {
				$data['totals'][] = [
					'title' => $total['title'],
					'text' => $this->currency->format($total['value'], $order_info['currency_code'], $order_info['currency_value']),
				];
			}

			$data['comment'] = nl2br($order_info['comment']);

			// History
			$data['history'] = $this->getHistory();

			$data['continue'] = $this->url->link('account/order');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('account/order_info', $data));

			return null;
		} else {

			$this->request->get['route'] = 'error/not_found';
			return $this->load->controller('error/not_found');

		}
	}

	/**
	 * @return void
	 */
	public function history(): void
	{
		$this->load->language('account/order');

		$this->response->setOutput($this->getHistory());
	}

	/**
	 * @return string
	 */
	public function getHistory(): string
	{
		if (isset($this->request->get['order_id'])) {
			$order_id = (int) $this->request->get['order_id'];
		} else {
			$order_id = 0;
		}

		if (isset($this->request->get['page']) && $this->request->get['route'] == 'account/order.history') {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$limit = 10;

		$data['histories'] = [];

		$this->load->model('account/order');

		$results = $this->model_account_order->getHistories($order_id, ($page - 1) * $limit, $limit);

		foreach ($results as $result) {
			$data['histories'][] = [
				'status' => $result['status'],
				'comment' => nl2br($result['comment']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			];
		}

		$history_total = $this->model_account_order->getTotalHistories($order_id);

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $history_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('account/order.history', '&order_id=' . $order_id . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($history_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($history_total - $limit)) ? $history_total : ((($page - 1) * $limit) + $limit), $history_total, ceil($history_total / $limit));

		return $this->load->view('account/order_history', $data);
	}

	/**
	 * @return void
	 */
	public function reorder(): void
	{
		$this->load->language('account/order');

		if (isset($this->request->get['order_id'])) {
			$order_id = (int) $this->request->get['order_id'];
		} else {
			$order_id = 0;
		}

		if (isset($this->request->get['order_product_id'])) {
			$order_product_id = (int) $this->request->get['order_product_id'];
		} else {
			$order_product_id = 0;
		}
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/order');

			$this->response->redirect($this->url->link('account/login'));
		}

		$this->load->model('account/order');

		$order_info = $this->model_account_order->getOrder($order_id);

		if ($order_info) {
			$order_product_info = $this->model_account_order->getProduct($order_id, $order_product_id);

			if ($order_product_info) {
				$this->load->model('catalog/product');

				$product_info = $this->model_catalog_product->getProduct($order_product_info['product_id']);

				if ($product_info) {
					$option_data = [];

					$order_options = $this->model_account_order->getOptions($order_product_info['order_id'], $order_product_id);

					foreach ($order_options as $order_option) {
						if ($order_option['type'] == 'select' || $order_option['type'] == 'radio' || $order_option['type'] == 'image') {
							$option_data[$order_option['product_option_id']] = $order_option['product_option_value_id'];
						} elseif ($order_option['type'] == 'checkbox') {
							$option_data[$order_option['product_option_id']][] = $order_option['product_option_value_id'];
						} elseif ($order_option['type'] == 'text' || $order_option['type'] == 'textarea' || $order_option['type'] == 'date' || $order_option['type'] == 'datetime' || $order_option['type'] == 'time') {
							$option_data[$order_option['product_option_id']] = $order_option['value'];
						} elseif ($order_option['type'] == 'file') {
							$option_data[$order_option['product_option_id']] = $order_option['value'];
						}
					}

					$subscription_info = $this->model_account_order->getSubscription($order_product_info['order_id'], $order_product_id);

					if ($subscription_info) {
						$subscription_id = $subscription_info['subscription_id'];
					} else {
						$subscription_id = 0;
					}

					$this->cart->add($order_product_info['product_id'], $order_product_info['quantity'], $option_data, $subscription_id);

					$this->session->data['success'] = sprintf($this->language->get('text_success'), $this->url->link('product/product', 'product_id=' . $product_info['product_id']), $product_info['name'], $this->url->link('checkout/cart'));

					unset($this->session->data['shipping_method']);
					unset($this->session->data['shipping_methods']);
					unset($this->session->data['payment_method']);
					unset($this->session->data['payment_methods']);
				} else {
					$this->session->data['error'] = sprintf($this->language->get('error_reorder'), $order_product_info['name']);
				}
			}
		}

		$this->response->redirect($this->url->link('account/order.info', 'order_id=' . $order_id));
	}
}
