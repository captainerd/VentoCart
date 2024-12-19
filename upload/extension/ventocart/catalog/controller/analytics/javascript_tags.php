<?php
namespace Ventocart\Catalog\Controller\Extension\VentoCart\Analytics;

/**
 * Class Basic
 *
 * @package Ventocart\Catalog\Controller\Extension\VentoCart\Captcha
 */
class JavaScriptTags extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): string {
		$myTag =  $this->model_setting_setting->getValue('analytics_javascript_tags_tag',$this->config->get('config_store_id') );

		return  $myTag;
	}
 

 
	
}
