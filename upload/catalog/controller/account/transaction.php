<?php
namespace Ventocart\Catalog\Controller\Account;
/**
 * Class Transaction
 *
 * @package Ventocart\Catalog\Controller\Account
 */
class Transaction extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('account/transaction');

		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/transaction');

			$this->response->redirect($this->url->link('account/login'));
		}

		$this->document->setTitle($this->language->get('heading_title'));

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
			'text' => $this->language->get('text_transaction'),
			'href' => $this->url->link('account/transaction')
		];
		$data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
		$data['column_amount'] = sprintf($this->language->get('column_amount'), $this->config->get('config_currency'));

		$limit = 10;

		$data['transactions'] = [];

		$filter_data = [
			'sort' => 'date_added',
			'order' => 'DESC',
			'start' => ($page - 1) * $limit,
			'limit' => $limit
		];

		$this->load->model('account/transaction');

		$results = $this->model_account_transaction->getTransactions($filter_data);

		foreach ($results as $result) {
			$data['transactions'][] = [
				'amount' => $this->currency->format($result['amount'], $this->config->get('config_currency')),
				'description' => $result['description'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			];
		}

		$transaction_total = $this->model_account_transaction->getTotalTransactions();

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $transaction_total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('account/transaction', 'page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($transaction_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($transaction_total - $limit)) ? $transaction_total : ((($page - 1) * $limit) + $limit), $transaction_total, ceil($transaction_total / $limit));

		$data['total'] = $this->currency->format($this->customer->getBalance(), $this->session->data['currency']);

		$data['continue'] = $this->url->link('account/account');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/transaction', $data));
	}
}