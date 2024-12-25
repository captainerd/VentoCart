<?php

namespace Ventocart\System\Engine;

/**
 * Class Factory
 * @package Ventocart\System\Engine
 */
class Factory
{

    /**
     * @var \Ventocart\System\Engine\Registry
     */
    protected $registry;

    /**
     * Factory constructor.
     * @param \Ventocart\System\Engine\Registry $registry
     */
    public function __construct(\Ventocart\System\Engine\Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Get a controller instance
     *
     * @param string $route Controller route
     * @return object
     */
    public function Controller(string $route): object
    {
        $class = $this->buildClassPath($this->registry->get('config')->get('application'), 'Controller', $route);

        if (class_exists($class)) {
            return new $class($this->registry);
        } else {
            return new \Exception('Error: Could not load controller ' . $route . '!');
        }
    }

    /**
     * Get a model instance
     *
     * @param string $route Model route
     * @return object
     * @throws \Exception
     */
    public function Model(string $route): object
    {
        $class = $this->buildClassPath($this->registry->get('config')->get('application'), 'Model', $route);

        if (class_exists($class)) {
            return new $class($this->registry);
        } else {
            throw new \Exception('Error: Could not load model ' . $route . '!');
        }
    }

    /**
     * Get a library instance
     *
     * @param string $route Library route
     * @param array $args Additional arguments
     * @return object
     * @throws \Exception
     */
    public function Library(string $route, array $args): object
    {
        $class = $this->buildClassPath('System', 'Library', $route);

        if (class_exists($class)) {
            return new $class(...$args);
        } else {
            throw new \Exception('Error: Could not load library ' . $route . '!');
        }
    }

    /** 
     * Build the full class path
     *
     * @param string $root Root namespace
     * @param string $namespace Class namespace
     * @param string $path Class path
     * @return string
     */
    public function buildClassPath(string $root, string $namespace, string $path): string
    {
        $sanitizedPath = preg_replace('/[^a-zA-Z0-9_\/]/', '', $path);

        return 'Ventocart\\' . $root . '\\' . $namespace . '\\' . str_replace(['_', '/'], ['', '\\'], ucwords($sanitizedPath, '_/'));

    }
}
