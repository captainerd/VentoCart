<?php
namespace Opencart\Catalog\Controller\Extension\VentoCart\Analytics;

/**
 * Analytics
 *
 * @package Opencart\Catalog\Controller\Extension\VentoCart\Analytics
 */
class GoogleAnalytics extends \Opencart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): string {
		$myTag = $this->model_setting_setting->getValue('analytics_google_analytics_tag', $this->config->get('config_store_id'));
	
		// Encode the tag ID using Base64 in PHP
		$encodedTag = base64_encode($myTag);
	
		// Escape the single quotes in the JavaScript string by doubling them
		return "<!-- Google tag (gtag.js) -->
				<script async src='https://www.googletagmanager.com/gtag/js?id=$encodedTag'></script>
				<script>
				
					function jtagdc(encoded) {
						return atob(encoded);
					}
	
					window.dataLayer = window.dataLayer || [];
					function gtag(){dataLayer.push(arguments);}
					gtag('js', new Date());
					gtag('config', jtagdc('$encodedTag')); // Decode the tag ID in JavaScript using custom function
				</script>";
	}
 

 
	
}
