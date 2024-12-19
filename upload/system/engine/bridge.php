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

    private $namespace;
    public $data;
    private $nslower;
    private $savesetting = false;

    /**
    
     *
     * @param object $registry An instance of the registry object
     * @param string $namespace A string representing the namespace to be used in this class, Admin/Catalog
     */
    public function __construct($registry, $namespace)
    {
        $this->registry = $registry;
        $this->namespace = $namespace;
        $this->nslower = strtolower($namespace);
        $this->nload = $this->load;
        $this->registry->set('bridgeLive', $this);

        if ($namespace == "Admin") {
            $this->applicationDir = rtrim($this->getAdminPath(), '/') . '/';
        } else {
            $this->applicationDir = DIR_CATALOG;
        }

        $this->autoloader->register('Ventocart\\' . $namespace, $this->applicationDir);
        $this->load = $this;

        $this->registry->set('bridgeLanguage', $this->registry->get('language'));

        if ($this->savesetting) {
            $this->model('setting/setting');
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
        $this->load = $this->nload;
        $this->registry->set('language', $this->bridgeLanguage);
        // Safely unset bridgeLive and restore language
        if (method_exists($this->registry, 'unset')) {
            $this->registry->unset('bridgeLive');
            $this->registry->unset('bridgeLanguage');
        } else {
            unset($this->registry->bridgeLive);
            unset($this->registry->bridgeLanguage);
        }
    }


    /**
     * Initiates a bridge with the given namespace.
     *
     * @param string $NameSpace The namespace to bridge with.
     * @return mixed The result of the bridge method.
     */
    public function bridge($NameSpace)
    {
        return $this->nload->bridge($NameSpace);
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


    /**
     * Loads a model and triggers its event handlers.
     * 
     * @param string $model The model to load.
     */
    public function model($model)
    {
        // Build the class name 
        $className = $this->factory->buildClassPath($this->namespace, 'model', $model);
        $this->autoload($className);

        if (class_exists($className)) {

            $instance = new $className($this->registry);
            $propertyName = 'model_' . str_replace('/', '_', $model);
            $proxy = new \Ventocart\System\Engine\Proxy();

            // Loop through the model's methods
            foreach (get_class_methods($className) as $method) {
                if (substr($method, 0, 2) != '__' && is_callable([$instance, $method])) {

                    $proxy->{$method} = function (&...$args) use ($model, $method, $instance) {
                        $route = $model . '/' . $method;
                        $trigger = $route;
                        $this->event->trigger('model/' . $trigger . '/before', [&$route, &$args]);
                        $output = call_user_func_array([$instance, $method], $args);
                        $this->event->trigger('model/' . $trigger . '/after', [&$route, &$args, &$output]);

                        return $output;
                    };
                }
            }
            $this->registry->set($propertyName, $proxy);
            return $proxy;
        } else {
            throw new \Exception("Class $className not found.");
        }
    }

    /**
     * Loads a language file from a given path, either from the main language directory or an extension.
     * 
     * @param string $language_path The path to the language file.
     * @param string $prefix Optional prefix for the language.
     * @param string $code Optional language code.
     * 
     * @return mixed The loaded language data.
     */
    public function language($language_path, $prefix = '', $code = '')
    {

        if (str_starts_with($language_path, 'extension/')) {
            [$base, $extension_name, $loadpath] = explode('/', $language_path, 3);

            $language = new \Ventocart\System\Library\Language($this->config->get('language_code'));
            $language->addPath(DIR_EXTENSION . "$extension_name/$this->nslower/language/");
            $language->load($loadpath);
        } else {
            $language = new \Ventocart\System\Library\Language($this->config->get('language_code'));
            $language->addPath($this->applicationDir . 'language/');
            $language->load($language_path);

        }

        $this->registry->set('language', $language);

        return $language;
    }


    /**
     * Returns an instance of the specified controller, 
     * 
     * @param string $controller The name of the controller.
     * 
     * @return object An instance of the controller.
     */
    public function controllerInstance($controller)
    {
        $className = $this->factory->buildClassPath($this->namespace, 'controller', $controller);
        $this->autoload($className);
        if (class_exists($className)) {
            $instance = new $className($this->registry);
            return $instance;
        } else {
            throw new \Exception("Class $className not found");
        }

    }
    /**
     * Handles the routing and execution of a controller method.
     * It calls the specified controller and passes any additional parameters.
     *
     * @param string $controller The name of the controller to execute.
     * @param mixed  ...$params  The parameters to pass to the controller method.
     */
    public function controller($controller, ...$params)
    {
        // Split the controller and method if specified with a dot
        $parts = explode(".", $controller);
        $controllerName = $parts[0];
        $methodName = $parts[1] ?? 'index'; // Default to 'index' if no method is specified
        $className = $this->factory->buildClassPath($this->namespace, 'controller', $controllerName);

        // Get the instance of the controller
        $instance = $this->controllerInstance($controllerName);

        // Check if the method exists in the controller class
        if (method_exists($instance, $methodName)) {
            return call_user_func_array([$instance, $methodName], $params);
        } else {
            throw new \Exception("Method $methodName not found in controller class $className.");
        }
    }

    /**
     * Renders a view using the specified template engine.
     * 
     * @param string $view The view file to render.
     * @param mixed  ...$args Additional arguments passed to the view.
     * @return string The rendered view as a string.
     */

    public function view($view, ...$args): string
    {

        if (!$this->template) {
            $this->template = new \Ventocart\System\Library\Template($this->config->get('template_engine'));
        }

        $this->template->addPath($this->applicationDir . "view/template/");

        $language_keys = $this->language->all();
        $args = array_merge($language_keys, ...$args);

        return $this->template->render($view, $args);
    }

    /**
     * Autoloads classes dynamically by their classname.
     * This method is called when a class is used but not yet loaded.
     *
     * @param string $classname The name of the class to load.
     */
    private function autoload($classname)
    {
        // For extensions that are outside of psr4 or class expected path
        if (strpos($classname, "\\Extension\\") !== false) {
            $ext = explode("\\", $classname);
            $file = DIR_EXTENSION . strtolower($ext[4] . "/" . $ext[1] . "/" . $ext[2] . "/" . preg_replace('~([a-z])([A-Z]|[0-9])~', '\\1_\\2', implode("/", array_slice($ext, 5)))) . ".php";
            if (is_file($file)) {
                require_once $file;
            }
        }
    }
}
