<?php
namespace Ventocart\Catalog\Controller\Guest;
/**
 * Class Guest
 *
 * @package Ventocart\Catalog\Controller\Guest
 */
class Order extends \Ventocart\System\Engine\Controller
{



    public function index($notfound = false): void
    {
        $this->load->language('guest/order');

        $this->document->setTitle($this->language->get('heading_title'));
        $data['text_no_results'] = $this->language->get('text_no_results');

        $datab['breadcrumbs'] = [];

        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
        ];

        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => "#"
        ];
        $data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);

        if (isset($this->session->data['grand_order_access']) && !$this->session->data['grand_order_access']) {
            $data['not_found'] = true;
            unset($this->session->data['grand_order_access']);

        }

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');


        $this->response->setOutput($this->load->view('guest/order', $data));



    }

    public function get(): void
    {


        $this->load->model('guest/order');
        $decoded = false;
        $order_id = false;
        if (isset($this->request->get['order_id'])) {
            $order_id = $this->request->get['order_id'];

        }
        if (isset($this->request->post['order_id'])) {
            $order_id = $this->request->post['order_id'];

        }
        if ($order_id) {
            $decoded = $this->model_guest_order->decryptOrderId($order_id);
        }
        if ($decoded) {
            // Provide access for the particular order id
            $this->session->data['grand_order_access'] = $decoded;
            $this->load->controller('account/order.info');

        } else {
            $this->session->data['grand_order_access'] = false;
            $this->index();


        }


    }



}
