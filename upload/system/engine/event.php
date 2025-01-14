<?php
namespace Ventocart\System\Engine;
class Event
{
    protected $registry;

    private $actions = [];

    public function __construct($registry)
    {
        $this->registry = $registry;
        $this->actions = include DIR_STORAGE . 'events.php';

    }

    public function register($trigger, $code, $action)
    {
        $this->actions[$trigger][] = array(
            'event_id' => 0,
            'code' => $code,
            'description' => '',
            'trigger' => $trigger,
            'action' => $action,
            'status' => true,
            'sort_order' => 5,
        );
    }
    public function unregister($code)
    {
        foreach ($this->actions as $trigger => &$events) {
            foreach ($events as $index => $event) {
                if (isset($event['code']) && $event['code'] === $code) {
                    unset($events[$index]); // Remove the event with matching code
                }
            }

            // Reindex array to ensure consistency
            $events = array_values($events);
        }
    }

    /**
     * Trigger an event and call all associated listeners
     * 
     * @param string $eventName The name of the event
     * @param mixed ...$params Parameters to pass to the event listener callbacks
     */
    public function trigger(string $eventName, ...$params)
    {

        // If there are listeners for the event
        if (!empty(($this->actions[$eventName]))) {
            foreach ($this->actions[$eventName] as $callback) {
                if ($callback['status']) {
                    $this->runController($callback['action'], $this->registry, ...$params);
                }
            }
        }
    }

    public function runController(string $route, \Ventocart\System\Engine\Registry $registry, &$args)
    {

        // Sanitize route and determine method
        $route = preg_replace('/[^a-zA-Z0-9_|\/\.]/', '', $route);
        $pos = strrpos($route, '.');
        $method = $pos !== false ? substr($route, $pos + 1) : 'index';
        $route = $pos !== false ? substr($route, 0, $pos) : $route;

        // Prevent calls to magic methods
        if (substr($method, 0, 2) === '__') {
            return new \Exception('Error: Calls to magic methods are not allowed!');
        }

        // Generate registry key and retrieve or initialize the controller
        $key = 'controller_' . $route;

        try {
            // Get or create the controller
            $controller = $registry->get($key) ?? $registry->get('factory')->controller($route);
            $registry->set($key, $controller);

            // Ensure the method is callable and execute it
            if (is_callable([$controller, $method])) {
                // Manually call the method and pass arguments, including $route by reference

                return $controller->$method($route, ...$args);
            } else {
                return new \Exception('Error: Could not call route ' . $route . '!');
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

}


?>