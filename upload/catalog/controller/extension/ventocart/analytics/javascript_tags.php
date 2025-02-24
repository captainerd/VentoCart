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
	public function index(): string
	{

		if ($this->config->get('module_gdpr_status') && !isset($this->request->cookie['accept-tracking'])) {
			return '';
		}


		$myTag = $this->model_setting_setting->getValue('analytics_javascript_tags_tag');

		return $myTag;
	}




}
