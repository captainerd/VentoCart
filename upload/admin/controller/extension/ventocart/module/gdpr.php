<?php
namespace Ventocart\Admin\Controller\Extension\VentoCart\Module;

/**
 * Class GDPR
 *
 * @package Ventocart\Admin\Controller\Extension\VentoCart\Module
 */
class GDPR extends \Ventocart\System\Engine\Controller
{
    /**
     * @return void
     */
    public function index(): void
    {
        $this->load->language('extension/ventocart/module/gdpr');

        $this->document->setTitle($this->language->get('heading_title'));
        // Load the model for localisation/language
        $this->load->model('localisation/language');

        // Get all available languages
        $data['languages'] = $this->model_localisation_language->getLanguages();

        $data['notices'] = [];
        foreach ($data['languages'] as $language) {
            require_once(DIR_CATALOG . "language/" . $language['code'] . "/extension/ventocart/module/gdpr.php");
            $data['notices'][$language['language_id']] = $_['text_notice'];
        }
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
            'href' => $this->url->link('extension/ventocart/module/gdpr', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['save'] = $this->url->link('extension/ventocart/module/gdpr.save', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module');

        $data['module_gdpr_status'] = $this->config->get('module_gdpr_status');
        $data['module_gdpr_force_accept_all'] = $this->config->get('module_gdpr_force_accept_all');
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/ventocart/module/gdpr', $data));
    }

    /**
     * @return void
     */
    public function save(): void
    {
        $this->load->language('extension/ventocart/module/gdpr');

        $json = [];

        // Check if user has permission
        if (!$this->user->hasPermission('modify', 'extension/ventocart/module/gdpr')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            // Load the model for saving settings
            $this->load->model('setting/setting');


            // Save disclaimers for each language
            foreach ($this->request->post['notice'] as $language_id => $text_notice) {
                // Set the language code (you should know the file structure to update the right file)
                $language = $this->model_localisation_language->getLanguage($language_id);
                if ($language) {
                    // Construct the path to the language file
                    $language_file = DIR_CATALOG . 'language/' . $language['code'] . '/extension/ventocart/module/gdpr.php';
                    if (file_exists($language_file)) {

                        // Load the language file content as a string
                        $content = file_get_contents($language_file);
                        $pattern = "/\['text_notice'\]\s*=\s*'([^']+)';/";
                        $replacement = "['text_notice'] = '" . addslashes($text_notice) . "';";
                        $updated_content = preg_replace($pattern, $replacement, $content);


                        // If replacement was successful, save the updated content back to the file
                        if ($updated_content !== $content) {
                            file_put_contents($language_file, $updated_content);
                        }
                    }
                }
            }

            sleep(1);

            // Save settings using the model (to store other settings, if necessary)
            unset($this->request->post['disclaimer']);

            $this->model_setting_setting->editSetting('module_gdpr', $this->request->post);


            // Return success message
            $json['success'] = $this->language->get('text_success');
        }

        // Return response in JSON format
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * @return void
     */
    public function install(): void
    {

    }

    /**
     * @return void
     */
    public function uninstall(): void
    {
        $this->load->model('setting/setting');
        $this->model_setting_setting->deleteSetting('module_gdpr');
    }
}
