<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class CategoryList
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class CategoryList extends \Ventocart\System\Engine\Controller
{
    /**
     * @return mixed
     */
    public function index(): mixed
    {
        $this->load->language('extension/ventocart/module/category');

        $categories = $this->config->get('module_categorylist_categories');
        $this->load->model('extension/ventocart/module/categorylist');

        $data = [];
        $data['autoplay'] = $this->config->get('module_categorylist_autoplay');
        $data['interval'] = $this->config->get('module_categorylist_interval');
        foreach ($categories as $index => $category) {
            $cat = $this->model_extension_ventocart_module_categorylist->getCategoryImage($index);
            if (empty($cat['image'])) {
                $cat['image'] = 'no_image.png';
            }

            $resized_image = $this->model_tool_image->resize(
                html_entity_decode($cat['image'], ENT_QUOTES, 'UTF-8'), // Get the image path and decode it
                140,
                140
            );

            $path = $this->model_extension_ventocart_module_categorylist->getCategoryPath($index);

            // For child categories, generate path with both parent_id and category_id
            $url = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $path);

            $cats[] = [
                'url' => $url,
                'name' => $category,
                'image' => $resized_image,
            ];
        }

        $data['categories'] = $cats;

        return $this->load->view('extension/ventocart/module/categorylist', $data);


    }
}
