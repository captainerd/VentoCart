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
        $this->triggerEvent('Before', $method, $args);

        // Delegate the method call to the actual instance
        $output = call_user_func_array([$this->instance, $method], $args);

        // Trigger the 'after' event
        $this->triggerEvent('After', $method, $args, $output);

        return $output;
    }


    /**
     * Trigger events before or after the method call.
     */
    private function triggerEvent(string $when, string $method, array $args, $output = null)
    {

        $eventName = get_class($this->instance) . '\\' . $method . '\\' . $when;
        if ($when === 'Before') {

            $this->registry->event->trigger($eventName, [&$args]);
        } elseif ($when === 'After') {

            $this->registry->event->trigger($eventName, [&$args, &$output]);
        }
    }
}
