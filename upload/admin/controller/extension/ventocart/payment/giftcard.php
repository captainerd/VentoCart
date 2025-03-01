<?php
namespace Ventocart\Admin\Controller\Extension\Ventocart\Payment;
/**
 * Class GiftCard
 *
 * @package Ventocart\Admin\Controller\Extension\Ventocart\Payment
 */
class GiftCard extends \Ventocart\System\Engine\Controller
{
    /**
     * @return void
     */
    public function index(): void
    {

        $this->load->language('extension/ventocart/payment/giftcard');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment')
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/ventocart/payment/giftcard', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['save'] = $this->url->link('extension/ventocart/payment/giftcard.save', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment');

        // GiftCard specific settings
        $data['payment_giftcard_status'] = $this->config->get('payment_giftcard_status');
        $data['payment_giftcard_sort_order'] = $this->config->get('payment_giftcard_sort_order');
        $data['payment_giftcard_order_status_id'] = $this->config->get('payment_giftcard_order_status_id');

        // For now, leave these settings as placeholders, but in the future, you can add more giftcard-specific settings here.
        $data['payment_giftcard_placeholder'] = ''; // Add a placeholder setting if needed.

        $this->load->model('localisation/order_status');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();


        // Load common views for header, footer, and left column
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        // Load the view
        $this->response->setOutput($this->load->view('extension/ventocart/payment/giftcard', $data));
    }

    /**
     * @return void
     */
    public function save(): void
    {
        $this->load->language('extension/ventocart/payment/giftcard');

        $json = [];

        if (!$this->user->hasPermission('modify', 'extension/ventocart/payment/giftcard')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            $this->load->model('setting/setting');

            // Save the GiftCard settings
            $this->model_setting_setting->editSetting('payment_giftcard', $this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
