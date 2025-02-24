<?php
namespace Ventocart\Catalog\Controller\Extension\VentoCart\Analytics;

/**
 * Analytics
 *
 * @package Ventocart\Catalog\Controller\Extension\VentoCart\Analytics
 */
class GoogleAnalytics extends \Ventocart\System\Engine\Controller
{
    /**
     * @return string
     */
    public function index(): string
    {

        if ($this->config->get('module_gdpr_status') && !isset($this->request->cookie['accept-tracking'])) {
            return '';
        }


        $myTag = $this->model_setting_setting->getValue('analytics_google_analytics_tag');

        $fixer = md5(rand(1000000, 1000000000));
        // Encode the tag ID using Base64 in PHP
        $encodedTag = base64_encode($fixer . $myTag);

        // Escape the single quotes in the JavaScript string by doubling them
        return "<!-- Google tag (gtag.js) -->
            <script>
                // Custom function for decoding
                function jtagdc(encoded) {
                    return atob(encoded).replace('$fixer','');
                }

                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

             

                var script = document.createElement('script');
                script.async = true;
                script.src = 'https://www.googletagmanager.com/gtag/js?id=' + jtagdc('$encodedTag');
                document.head.appendChild(script);

                script.onload = function () {
                    gtag('config', jtagdc('$encodedTag')); // Pass the decoded tag ID to gtag
                };
            </script>";
    }




}
