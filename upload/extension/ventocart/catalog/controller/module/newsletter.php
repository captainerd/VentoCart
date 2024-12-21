<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Newsletter
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Newsletter extends \Ventocart\System\Engine\Controller
{
    /**
     * @return string
     */
    public function index(): string
    {

        $data = [];
        $this->load->language('guest/newsletter');
        $this->load->model('guest/newsletter');
        if (!$this->model_guest_newsletter->isSubscriber()) {

            return $this->load->view('extension/ventocart/module/newsletter', $data);
        } else {
            return "";
        }

    }
}
