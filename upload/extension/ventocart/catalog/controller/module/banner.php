<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Banner
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Banner extends \Ventocart\System\Engine\Controller
{
	/**
	 * @param array $setting
	 *
	 * @return string
	 */
	public function index(array $setting): mixed
	{
		static $module = 0;
		$api_output = $this->customer->isApiClient();
		$this->load->model('design/banner');
		$this->load->model('tool/image');

		$data['banners'] = [];

		$results = $this->model_design_banner->getBanner($setting['banner_id']);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {
				$data['banners'][] = [
					'title' => html_entity_decode($result['title']),
					'description' => html_entity_decode($result['description']),
					'link' => $result['link'],
					'image' => $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $setting['width'], $setting['height'])
				];
			}
		}

		if ($data['banners']) {
			$data['module'] = $module++;

			$data['effect'] = $setting['effect'];
			$data['controls'] = $setting['controls'];
			$data['indicators'] = $setting['indicators'];
			$data['items'] = $setting['items'];
			$data['interval'] = $setting['interval'];
			$data['width'] = $setting['width'];
			$data['height'] = $setting['height'];

			if (!$api_output) {

				return $this->load->view('extension/ventocart/module/banner', $data);
			} else {
				$data['module'] = "BannerCarousel";
				return $data;
			}
		} else {
			return '';
		}
	}
}
