<?php
namespace Ventocart\Catalog\Controller\Extension\VentoCart\Module;
/**
 * Class Filter
 *
 * @package Ventocart\Catalog\Controller\Extension\VentoCart\Module
 */
class Pricefilter extends \Ventocart\System\Engine\Controller
{
    /**
     * @return mixed
     */
    public function index(): mixed
    {


        if (isset($this->request->get['path'])) {
            $parts = explode('_', (string) $this->request->get['path']);
        } else {
            $this->request->get['path'] = '';
            $parts = [];
        }

        $category_id = end($parts);

        $this->load->model('catalog/category');

        $category_info = $this->model_catalog_category->getCategory($category_id);

        if ($category_info) {
            $this->load->language('extension/ventocart/module/price_filter');





            $data['pricerange'] = [];
            if (isset($this->request->get['pricerange'])) {
                $data['pricerange'] = $this->request->get['pricerange'];
            }

            if (!empty($data['pricerange'])) {
                $priceRange = explode('-', $data['pricerange']);

                if (count($priceRange) == 2) {
                    $data['minprice'] = (float) $priceRange[0];
                    $data['maxprice'] = (float) $priceRange[1];

                }
            }



            $this->load->model('catalog/product');


            return $this->load->view('extension/ventocart/module/price_filter', $data);


        }

        return '';
    }
}
