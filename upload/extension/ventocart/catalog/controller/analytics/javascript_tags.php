<?php
namespace Opencart\Catalog\Controller\Extension\VentoCart\Analytics;

/**
 * Class Basic
 *
 * @package Opencart\Catalog\Controller\Extension\VentoCart\Captcha
 */
class JavaScriptTags extends \Opencart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): string {
		$myTag =  $this->model_setting_setting->getValue('analytics_javascript_tags_tag',$this->config->get('config_store_id') );

		return  $myTag;
	}
 

 
	
}
