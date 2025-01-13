<?php
namespace Ventocart\Admin\Controller\Extension\Ventocart\Module;
/**
 * Class CategoryList
 *
 * @package Ventocart\Admin\Controller\Extension\Ventocart\Module
 */
class CategoryList extends \Ventocart\System\Engine\Controller
{
    /**
     * @return void
     */
    public function index(): void
    {
        $this->load->language('extension/ventocart/module/categorylist');

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
            'href' => $this->url->link('extension/ventocart/module/category', 'user_token=' . $this->session->data['user_token'])
        ];
        $data['user_token'] = $this->session->data['user_token'];
        $data['save'] = $this->url->link('extension/ventocart/module/categorylist.save', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module');

        $data['module_categorylist_status'] = $this->config->get('module_categorylist_status');
        $data['module_categorylist_autoplay'] = $this->config->get('module_categorylist_autoplay');
        $data['module_categorylist_interval'] = !empty($this->config->get('module_categorylist_interval'))
            ? $this->config->get('module_categorylist_interval')
            : 3000;

        $data['module_categorylist_categories'] = !empty($this->config->get('module_categorylist_categories')) ? $this->config->get('module_categorylist_categories') : [];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/ventocart/module/categorylist', $data));
    }

    /**
     * @return void
     */
    public function save(): void
    {
        $this->load->language('extension/ventocart/module/category');

        $json = [];

        if (!$this->user->hasPermission('modify', 'extension/ventocart/module/category')) {
            $json['error']['warning'] = $this->language->get('error_permission');
        }

        if (!$json) {
            $this->load->model('setting/setting');

            $this->model_setting_setting->editSetting('module_categorylist', $this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}