<?php
namespace Ventocart\Admin\Controller\Extension\Ventocart\Module;
/**
 * Class NewsLetter
 *
 * @package Ventocart\Admin\Controller\Extension\Ventocart\Module
 */
class NewsLetter extends \Ventocart\System\Engine\Controller
{
    /**
     * @return void
     */
    public function index(): void
    {
        $this->load->language('extension/ventocart/module/newsletter');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module')
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/ventocart/module/newsletter', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['save'] = $this->url->link('extension/ventocart/module/newsletter.save', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module');

        $data['module_newsletter_status'] = $this->config->get('module_newsletter_status');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/ventocart/module/newsletter', $data));
    }

    /**
     * @return void
     */
    public function save(): void
    {
        $this->load->language('extension/ventocart/module/newsletter');

        $json = [];

        if (!$this->user->hasPermission('modify', 'extension/ventocart/module/newsletter')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            $this->load->model('setting/setting');

            $this->model_setting_setting->editSetting('module_newsletter', $this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}