<?php
namespace Ventocart\Catalog\Controller\Guest;
/**
 * Class NewsLetter
 *
 * @package Ventocart\Catalog\Controller\Guest
 */
class NewsLetter extends \Ventocart\System\Engine\Controller
{


    public function index(): void
    {

        /* For a jquery Application use &json=1 url param, to get json response */


        $this->load->language('guest/newsletter');

        $this->document->setTitle($this->language->get('heading_title'));

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
        $data['var'] = false;
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        // Check if the action is set and process accordingly
        if (isset($this->request->get['action']) && isset($this->request->get['email'])) {
            $action = $this->request->get['action'];
            $email = trim($this->request->get['email']);
            $this->load->model('guest/newsletter');

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['var'] = 'error_email';
            } else {
                if ($action === 'subscribe') {
                    $result = $this->model_guest_newsletter->route($email, 'subscribe');
                    $data['var'] = $result; // The result will be a string for success or error
                } elseif ($action === 'unsubscribe') {
                    $result = $this->model_guest_newsletter->route($email, 'unsubscribe');
                    $data['var'] = $result; // The result will be a string for success or error
                } else {
                    $data['var'] = 'invalid_action';
                }
            }

            $data['alert_style'] = 'danger';

            // Set alert style based on result
            if ($data['var'] === "text_success") {
                $data['alert_style'] = 'success';
            } elseif ($data['var'] === "text_already_subscribed") {
                $data['alert_style'] = 'warning';
            } elseif ($data['var'] === "text_unsubscribe_success") {
                $data['alert_style'] = 'warning';
            } elseif ($data['var'] === 'invalid_action') {
                $data['alert_style'] = 'danger';
            }

        }



        $data['text_success'] = $this->language->get($data['var']);

        if (isset($this->request->get['json'])) {

            $this->response->setOutput(json_encode(['success' => $data['text_success']]));
        } else {
            $this->response->setOutput($this->load->view('guest/newsletter', $data));
        }
    }
    function cartReturn(): void
    {

        // Load necessary models
        $this->load->model('guest/newsletter');
        $this->model_guest_newsletter->addOneClick();
        // Redirect to the checkout cart route
        $this->response->redirect($this->url->link('checkout/cart'));
    }
}
