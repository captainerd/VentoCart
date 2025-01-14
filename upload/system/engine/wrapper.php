<?php
namespace Ventocart\System\Engine;

class Wrapper
{

    private $instance;
    protected $registry;
    /**
     * @var string The route/path for the instance
     */
    private $route;

    /**
     * Constructor to initialize the wrapper with the instance and route.
     *
     * @param object $instance The instance instance being wrapped
     * @param string $route The instance route/path
     */
    public function __construct($instance, string $route, $registry)
    {
        $this->instance = $instance;
        $this->registry = $registry;
        $this->route = $route;
    }

    /**
     * Magic method to intercept method calls on the wrapped instance.
     */
    public function __call($method, $args)
    {
        // Trigger the 'before' event  
        $eventNameBefore = $this->registry->config->get('application') . '/model/' . $this->route . '/' . $method . '/before';
        $this->registry->event->trigger($eventNameBefore, [&$args]);

        // Delegate the method call to the actual instance
        if (method_exists($this->instance, $method)) {
            $output = call_user_func_array([$this->instance, $method], $args);
        }

        // Trigger the 'after' event 
        $eventNameAfter = $this->registry->config->get('application') . '/model/' . $this->route . '/' . $method . '/after';
        $this->registry->event->trigger($eventNameAfter, [&$args, &$output]);

        return $output;
    }

}
