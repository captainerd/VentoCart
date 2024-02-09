<?php
namespace Opencart\Catalog\Controller\Extension\VentoCart\Analytics;

/**
 * Class Basic
 *
 * @package Opencart\Catalog\Controller\Extension\VentoCart\Captcha
 */
class GoogleAnalytics extends \Opencart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): string {
 

		 $myTag =  $this->model_setting_setting->getValue('analytics_google_analytics_tag',$this->config->get('config_store_id') );

		 return  "<!-- Google tag (gtag.js) -->
		<script async src='https://www.googletagmanager.com/gtag/js?id=$myTag'></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', '$myTag');
		</script>";
	}
 

 
	
}
