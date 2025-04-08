<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Plugins;

class PhotoCarousel extends \Ventocart\System\Engine\Controller
{
    public function index(...$args): string
    {
        $data['perPage'] = array_shift($args);

        $data['carousel_id'] = 'carousel-' . uniqid();
        $data['photos'] = $args; // pass the arguments directly to the view

        return $this->load->view('extension/ventocart/plugins/photocarousel', $data);
    }
}