<?php
namespace Ventocart\Admin\Controller\Design;

/**
 * Class Footer
 *
 * @package Ventocart\Admin\Controller\Design
 */
class Footer extends \Ventocart\System\Engine\Controller
{
    public function index($success = false, $failed = false): void
    {
        $this->load->model('design/footer');
        $sections = $this->model_design_footer->getFooterLinks();


        $this->load->language('design/footer');

        $this->document->setTitle($this->language->get('heading_title'));
        $data['success'] = $success;
        $data['failed'] = $failed;
        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('design/footer', 'user_token=' . $this->session->data['user_token'])
        ];
        $data['actionUrl'] = $this->url->link('design/footer.save', 'user_token=' . $this->session->data['user_token']);
        $data['user_token'] = $this->session->data['user_token'];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $languages = $this->model_localisation_language->getLanguages();
        $this->load->model('design/footer');
        $sections = $this->model_design_footer->getFooterLinks();


        $data['mylangid'] = $this->config->get('config_language_id');

        $data['languages'] = $languages;
        $data['sections'] = $sections;

        $this->load->language('design/footer');

        $this->response->setOutput($this->load->view('design/footer', $data));
    }

    public function save(): void
    {
        // Ensure that $footer_file exists before trying to modify it

        $sections = $this->request->post['sections']; // Get the array of sections



        $this->load->language('design/footer');
        $this->load->model('design/footer');
        $all_successful = $this->model_design_footer->saveFooterLinks($sections);
        if ($all_successful) {
            $this->index($this->language->get('text_success'));
        } else {
            $this->index(false, $this->language->get('text_failure'));
        }




    }
    public function autocomplete(): void
    {
        $this->load->model('design/footer');
        $results = $this->model_design_footer->autocomplete($this->request->get['filter_name']);

        $this->response->setOutput(json_encode($results));
    }
}

?>