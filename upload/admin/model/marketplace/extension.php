<?php
namespace Ventocart\Admin\Model\Marketplace;
/**
 * Class Marketplace
 *
 * @package Ventocart\Admin\Model\Marketplace
 */
class Extension extends \Ventocart\System\Engine\Model
{



    public function getList($extensionType): string
    {

        $commonExtLanguage = ['analytics', 'captcha', 'currency', 'total', 'feed', 'fraud', 'language', 'marketing', 'marketplace', 'other'];

        $data = $this->loadExtLanguage($extensionType);

        // Promotion
        $data['promotion'] = $this->load->controller('marketplace/promotion');

        $available = [];
        $results = iterator_to_array(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(DIR_APPLICATION . "/controller/extension", \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::LEAVES_ONLY), false);
        $results = array_filter($results, fn($file) => strpos($file, "/$extensionType/") !== false && pathinfo($file, PATHINFO_EXTENSION) === 'php');


        foreach ($results as $result) {
            $available[] = basename($result, '.php');
        }

        $installed = [];
        $this->load->model('setting/extension');
        $extensions = $this->model_setting_extension->getExtensionsByType($extensionType);

        foreach ($extensions as $extension) {
            if (in_array($extension['code'], $available)) {
                $installed[] = $extension['code'];
            } else {
                // Uninstall any missing extensions
                $this->model_setting_extension->uninstall($extensionType, $extension['code']);
            }
        }

        $data['extensions'] = [];

        // Handle 'theme' extension type differently
        if ($extensionType === 'theme') {
            // Get all theme directories
            $themeDirs = glob(DIR_VENTOCART . "/themes/*", GLOB_ONLYDIR); // Only directories, no subdirectories

            // Loop through theme directories and compare with the installed ones
            foreach ($themeDirs as $themeDir) {
                $themeCode = basename($themeDir);
                $this->load->model('setting/setting');

                $data['extensions'][] = [
                    'name' => ucfirst(lcfirst(ucwords(str_replace('_', ' ', $themeCode)))),
                    'edit' => '',
                    'install' => '',
                    'uninstall' => '',
                    'download' => $this->url->link('marketplace/installer.downloadTheme', 'user_token=' . $this->session->data['user_token'] . '&code=' . $themeCode),
                    'installed' => 0,
                    'default' => $this->model_setting_setting->getConfigValue('THEME_NAME') == $themeCode ? 1 : 0,
                    'dirtheme' => 1,
                    'setdefault' => $this->url->link("marketplace/loadlists.settheme", 'user_token=' . $this->session->data['user_token'] . '&code=' . $themeCode),
                    'code' => $themeCode,
                    'store' => 0
                ];
            }


        }

        // Iterate over available extensions (themes or modules)
        if ($extensionType === 'module') {
            // Special logic for modules
            $this->load->model('setting/module');

            foreach ($results as $result) {
                $path = substr($result, strlen(DIR_APPLICATION));
                $extension = explode("/", $path)[3];
                $code = basename($result, '.php');

                $this->load->language("extension/$extension/$extensionType/$code", $code);

                $module_data = [];
                $modules = $this->model_setting_module->getModulesByCode("$extension.$code");

                foreach ($modules as $module) {
                    $setting_info = $module['setting'] ? json_decode($module['setting'], true) : [];
                    $module_data[] = [
                        'name' => $module['name'],
                        'status' => !empty($setting_info['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                        'edit' => $this->url->link("extension/$extension/$extensionType/$code", 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $module['module_id']),
                        'delete' => $this->url->link("marketplace/loadlists.delete", 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $module['module_id'])
                    ];
                }

                $status = $module_data ? '' : ($this->config->get("module_$code" . "_status") ? $this->language->get('text_enabled') : $this->language->get('text_disabled'));

                $data['extensions'][] = [
                    'name' => $this->language->get($code . '_heading_title'),
                    'status' => $status,
                    'module' => $module_data,
                    'install' => $this->url->link("marketplace/loadlists.install", 'user_token=' . $this->session->data['user_token'] . '&which=' . $extensionType . '&extension=' . $extension . '&code=' . $code),
                    'uninstall' => $this->url->link("marketplace/loadlists.uninstall", 'user_token=' . $this->session->data['user_token'] . '&which=' . $extensionType . '&extension=' . $extension . '&code=' . $code),
                    'installed' => in_array($code, $installed),
                    'edit' => $this->url->link("extension/$extension/$extensionType/$code", 'user_token=' . $this->session->data['user_token']),
                ];
            }
        } else {
            // Reusable logic for non-module extensions
            $this->load->model('setting/store');
            $this->load->model('setting/setting');

            $stores = $this->model_setting_store->getStores();

            foreach ($results as $result) {
                $path = substr($result, strlen(DIR_APPLICATION));
                $extension = explode("/", $path)[3];
                $code = basename($result, '.php');

                $this->load->language("extension/$extension/$extensionType/$code", $code);

                $store_data = [];

                $store_data[] = [
                    'name' => $this->config->get('config_name'),
                    'edit' => $this->url->link("extension/$extension/$extensionType/$code", 'user_token=' . $this->session->data['user_token']),
                    'status' => $this->config->get($extensionType . "_$code" . "_status") ? $this->language->get('text_enabled') : $this->language->get('text_disabled')
                ];


                $data['extensions'][] = [
                    'code' => $code,
                    'name' => $this->language->get($code . '_heading_title'),
                    'edit' => $this->url->link("extension/$extension/$extensionType/$code", 'user_token=' . $this->session->data['user_token']),
                    'install' => $this->url->link("marketplace/loadlists.install&which=$extensionType", 'user_token=' . $this->session->data['user_token'] . '&extension=' . $extension . '&code=' . $code),
                    'uninstall' => $this->url->link("marketplace/loadlists.uninstall&which=$extensionType", 'user_token=' . $this->session->data['user_token'] . '&extension=' . $extension . '&code=' . $code),
                    'installed' => in_array($code, $installed),
                    'dirtheme' => 0,
                    'setdefault' => $this->url->link("marketplace/loadlists.settheme", 'user_token=' . $this->session->data['user_token'] . '&extension=' . $extension . '&code=' . $code),
                    'default' => $this->config->get('config_theme') == $code ? 1 : 0,
                    'store' => $store_data
                ];
            }
        }

        $data['text_layout'] = sprintf($this->language->get('text_layout'), $this->url->link('design/layout', 'user_token=' . $this->session->data['user_token']));

        // Reindex the array to maintain proper keys after removing elements
        $data['extensions'] = array_values($data['extensions']);


        return $this->loadExtView($extensionType, $data);
    }

    private function loadExtView($extensionType, $data)
    {
        $commonExtViews = ['analytics', 'captcha', 'currency', 'feed', 'fraud', 'language', 'marketing', 'marketplace', 'other', 'importers'];

        if (in_array($extensionType, $commonExtViews)) {
            return $this->load->view("extension/basic", $data);
        } else {
            return $this->load->view("extension/$extensionType", $data);
        }
    }

    public function install($extensionType): array
    {
        $this->load->language("extension/$extensionType");

        $json = [];

        if (isset($this->request->get['extension'])) {
            $extension = basename($this->request->get['extension']);
        } else {
            $extension = '';
        }

        if (isset($this->request->get['code'])) {
            $code = basename($this->request->get['code']);
        } else {
            $code = '';
        }

        if (!$this->user->hasPermission('modify', $extensionType)) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!is_file(DIR_APPLICATION . "/controller/extension/$extension/$extensionType/" . $code . '.php')) {

            $json['error'] = $this->language->get('error_extension');
        }

        if (!$json) {
            $this->load->model('setting/extension');

            $this->model_setting_extension->install($extensionType, $extension, $code);

            $this->load->model('user/user_group');

            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/' . $extension . "/$extensionType/" . $code);
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/' . $extension . "/$extensionType/" . $code);


            try {
                $this->load->controller('extension/' . $this->request->get['extension'] . "/$extensionType/" . $this->request->get['code'] . '.install');
            } catch (\Exception $e) {
                // Silently fail without throwing an exception
            }
            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        return $json;

    }


    /**
     * @return array
     */
    public function uninstall($extensionType): array
    {
        $this->load->language("extension/$extensionType");

        $json = [];

        if (!$this->user->hasPermission('modify', $extensionType)) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            $this->load->model('setting/extension');

            $this->model_setting_extension->uninstall($extensionType, $this->request->get['code']);

            try {
                $this->load->controller('extension/' . $this->request->get['extension'] . "/$extensionType/" . $this->request->get['code'] . '.uninstall');
            } catch (\Exception $e) {
                // Silently fail without throwing an exception
            }



            $json['success'] = $this->language->get('text_success');
        }

        return $json;
    }

    public function getCategories()
    {

        $data['categories'] = [];

        $this->load->model('setting/extension');

        $names = [
            "analytics",
            "currency",
            "total",
            "feed",
            "module",
            "report",
            "captcha",
            "other",
            "dashboard",
            "fraud",
            "payment",
            "shipping",
            "total",
            "marketing",
            "importers"
        ];


        foreach ($names as $extension) {


            $lang = $this->loadExtLanguage($extension, $extension);

            if ($this->user->hasPermission('access', $extension)) {

                $controllerFiles = count(glob(DIR_APPLICATION . 'controller/extension/*/' . $extension . '/*.php'));

                $data['categories'][] = [
                    'code' => $extension,
                    'text' => $lang['heading_title'] . ' (' . $controllerFiles . ')',
                    'href' => $this->url->link('marketplace/extension&which=' . $extension, 'user_token=' . $this->session->data['user_token'])
                ];

            }

        }


        return $data['categories'];
    }


    private function loadExtLanguage($extension, $prefix = "")
    {
        $commonExtLanguage = ['analytics', 'captcha', 'currency', 'total', 'feed', 'fraud', 'language', 'marketing', 'marketplace', 'other', 'importers'];

        if (!in_array($extension, $commonExtLanguage)) {
            return $this->language->loadForAPI("extension/$extension");
        } else {
            // Load language file
            $data = $this->language->loadForAPI("extension/basic");

            // Heading
            $extensiontxt = ucfirst(trim($extension));
            $data['heading_title'] = sprintf($data['heading_title'], $extensiontxt);

            // Text
            $data['text_success'] = sprintf($data['text_success'], $extensiontxt);
            $data['text_list'] = sprintf($data['text_list'], $extensiontxt);

            // Column
            $data['column_name'] = sprintf($data['column_name'], $extensiontxt);


            // Error
            $data['error_permission'] = sprintf($data['error_permission'], $extensiontxt);
            $data['error_extension'] = sprintf($data['error_extension'], $extensiontxt);
            return $data;
        }


    }

}