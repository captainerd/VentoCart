<?php
namespace Ventocart\Catalog\Model\api;
/**
 * Class Collector
 *
 * @package Ventocart\Catalog\Model\api
 */
class Collector extends \Ventocart\System\Engine\Model
{
    // Essentially an event listener, gathers outputs and decodes potentially json encoded outputs by controllers
    // system's regular event handler doesn't register on nested calls.  
    private $viewCollection = [];
    private $trueLoader;

    public function getCollection()
    {
        // returns the collection and clears it
        $data = $this->viewCollection;
        $data = $this->decodeJson($data);

        $this->viewCollection = [];
        return $data;
    }


    public function registerEvent()
    {
        $this->trueLoader = $this->load;
        $this->registry->set('load', $this);

    }
    public function controller(string $route, ...$args)
    {
        return $this->trueLoader->controller($route, ...$args);
    }
    public function model($route)
    {
        return $this->trueLoader->model($route);
    }
    public function language($route)
    {
        return $this->trueLoader->language($route);

    }
    public function view($route, $data)
    {

        $this->viewCollection[$route] = is_array($data) ? $data : json_decode($data);
        return json_encode($data);
    }
    private function decodeJson($data)
    {
        // Handle arrays recursively
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->decodeJson($value);
            }
        }
        // Handle objects recursively
        elseif (is_object($data)) {
            foreach ($data as $key => $value) {
                $data->$key = $this->decodeJson($value);
            }
        }
        // Handle strings: check if it's JSON and decode it
        elseif (is_string($data)) {
            if ($this->is_json($data)) {
                $data = json_decode($data, true);  // Decode if valid JSON
                // After decoding, we need to recursively check for nested JSON strings
                $data = $this->decodeJson($data); // Recursive call to handle nested JSON
            }
        }
        return $data;
    }
    private function cleanup($data)
    {
        if (is_string($data)) {
            return trim($data, "\"'`");
        } else {
            return $data;
        }
    }
    private function is_json($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }







}