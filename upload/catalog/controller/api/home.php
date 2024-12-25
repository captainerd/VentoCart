<?php
namespace Ventocart\Catalog\Controller\api;
/**
 * Class Home
 *
 * @package Ventocart\Catalog\Controller\api
 */
class Home extends \Ventocart\System\Engine\Controller
{

    public function index(): void
    {

        $this->load->model('api/collector');
        $this->model_api_collector->registerEvent();

        // emulate a route
        $this->request->get['route'] = 'common/home';

        // call a controller
        $this->load->controller('common/home');

        $res = $this->model_api_collector->getCollection();
        $data = $res['common/home'];

        $this->response->setOutput(json_encode($data));

    }
    public function getProduct()
    {
        $this->load->model('api/collector');
        $this->model_api_collector->registerEvent();

        // emulate a route
        $this->request->get['route'] = 'product/product';
        $this->load->controller('product/product');

        $res = $this->model_api_collector->getCollection();
        $data = $res['product/product'];
        $data['lang_values'] = $this->language->loadForAPI('product/product');

        $this->response->setOutput(json_encode($data));

    }


}

