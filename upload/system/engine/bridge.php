<?php
namespace Ventocart\System\Engine;
/**
 * Class Bridge
 * 
 * @package \Ventocart\System\Engine\Model
 * 
 * This class enables flexible namespace operations for code reusability
 * 
 */
class Bridge extends \Ventocart\System\Engine\Model
{
    private $applicationDir;

    public $namespace;

    private $savesetting = false;

    /**
    
     *
     * @param object $registry An instance of the registry object
     * @param string $namespace A string representing the namespace to be used in this class, Admin/Catalog
     */
    public function __construct($registry, $namespace)
    {
        $this->registry = $registry;
        // kill a pontential bridge
        if (isset($this->bridge)) {
            $this->bridge->kill();
        }
        $this->namespace = $this->config->get('application');
        $this->config->set('application', $namespace);

        if ($namespace == "Admin") {
            $this->applicationDir = rtrim($this->getAdminPath(), '/') . '/';
        } else {

            $this->applicationDir = DIR_CATALOG;
            $registry->template->addPath(DIR_VENTOCART . "themes/default/plates/");
        }

        $this->autoloader->register('Ventocart\\' . $namespace, $this->applicationDir);

        if (isset($this->request->cookie['language'])) {
            $code = (string) $this->request->cookie['language'];
        } else {
            $code = $this->config->get('config_language_admin');
        }

        $language = new \Ventocart\System\Library\Language($code);

        $language->addPath($this->applicationDir . str_replace(DIR_APPLICATION, '', DIR_LANGUAGE));
        $registry->set('language', $language);
        $this->load->language('default');

        if ($this->savesetting) {
            $this->load->model('setting/setting');
            $this->model_setting_setting->editSetting('admin_path', ['admin_path' => $this->applicationDir]);
        }
    }


    /**
     * This method restores the original state of the system after a bridge has been used.
     * 
     * @return void
     */
    public function kill()
    {
        if (isset($this->request->cookie['language'])) {
            $code = (string) $this->request->cookie['language'];
        } else {
            $code = $this->config->get('config_language_admin');
        }
        $language = new \Ventocart\System\Library\Language($code);
        $language->addPath(DIR_LANGUAGE);
        $this->registry->template->addPath(DIR_TEMPLATE . "/plates/");
        $this->registry->set('language', $language);
        $this->config->set('application', $this->namespace);
        $this->load->language('default');
    }


    /**
     * Initiates a bridge with the given namespace.
     *
     * @param string $NameSpace The namespace to bridge with.
     * @return mixed The result of the bridge method.
     */
    public function bridge($NameSpace)
    {
        return $this->load->bridge($NameSpace);
    }

    /**
     * Retrieves the admin path from settings or searches for it.
     * Returns the path if found, otherwise initiates a search and saves it
     * 
     * @return string The admin path.
     */
    public function getAdminPath(): string
    {
        // Load the settings model

        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('admin_path');

        if (!empty($settings['admin_path'])) {
            // Check if the stored admin path exists
            if (is_dir($settings['admin_path'])) {
                // Return the stored admin path if it exists
                return $settings['admin_path'];
            }
        }
        // Mark true to save the path so won't search again.
        $this->savesetting = true;

        $rootDir = DIR_VENTOCART;
        $directories = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($rootDir));

        foreach ($directories as $file) {

            // Check if it's a 'config.php' file and contains the admin definition
            if ($file->getFilename() == 'config.php') {
                $configFileContent = file_get_contents($file->getRealPath());
                if (strpos($configFileContent, "define('APPLICATION', 'Admin');") !== false) {
                    $adminPath = dirname($file->getRealPath());
                    return $adminPath;
                }
            }
        }

        throw new \Exception("Admin directory not found.");
    }



}
