<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;

/**
 * Class GDPR
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class GDPR extends \Ventocart\System\Engine\Controller
{
    /**
     * @return string
     */
    public function index(): string
    {
        if (isset($this->request->cookie['accept-tracking'])) {
            return '';
        }
        // If 'deny-tracking' exists, check if it has expired (5 hours)
        if (isset($this->request->cookie['deny-tracking'])) {
            $denyTrackingCookieTime = strtotime($this->request->cookie['deny-tracking']);
            $currentTime = time();

            // If the cookie is older than 5 hours, allow the notice to reappear
            if (($currentTime - $denyTrackingCookieTime) >= (5 * 60 * 60)) {
                return '';  // Don't show the notice if it's within 5 hours
            }
        }
        $this->load->language('extension/ventocart/module/gdpr');
        $text_notice = $this->language->get('text_notice');
        $this->load->model('catalog/information');
        $information_info = $this->model_catalog_information->getInformation($this->config->get('config_cookie_id'));
        $information_info2 = $this->model_catalog_information->getInformation($this->config->get('config_gdpr_id'));

        $privacy_policy_url = $this->url->link('information/information', 'information_id=' . $information_info['information_id']);
        $gdpr_policy_url = $this->url->link('information/information', 'information_id=' . $information_info2['information_id']);

        $privacy_policy_url = '<a href="' . $privacy_policy_url . '">' . $information_info['title'] . '</a>';
        $gdpr_policy_url = '<a href="' . $gdpr_policy_url . '">' . $information_info2['title'] . '</a>';

        // Check how many %s placeholders are in the text_notice
        if (substr_count($text_notice, '%s') === 2) {
            // Two placeholders, use both
            $text_notice = sprintf($text_notice, $privacy_policy_url, $gdpr_policy_url);
        } elseif (substr_count($text_notice, '%s') === 1) {
            // One placeholder, use only the privacy policy URL
            $text_notice = sprintf($text_notice, $privacy_policy_url);
        }

        $data['force_accept'] = $this->config->get('module_gdpr_force_accept_all');
        $data['text_notice'] = $text_notice;

        return $this->load->view('extension/ventocart/module/gdpr', $data);
    }



}
