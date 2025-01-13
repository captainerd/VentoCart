<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Special
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Special extends \Ventocart\System\Engine\Controller
{
	/**
	 * @param array $setting
	 *
	 * @return string
	 */
	public function index(array $setting): string
	{
		$this->load->language('extension/ventocart/module/special');

		$data['autoplay'] = $setting['autoplay'];
		$data['interval'] = $setting['interval'];
		$data['products'] = [];

		$filter_data = [
			'sort' => 'pd.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => $setting['limit']
		];

		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$results = $this->model_catalog_product->getSpecials($filter_data);

		if ($results) {
			foreach ($results as $result) {
				if ($result['image']) {
					// Video poster creation
					$fileExtension = strtolower(pathinfo($result['image'], PATHINFO_EXTENSION));
					$poster = '';

					if (in_array($fileExtension, ['mp4', 'mkv', 'avi'])) {

						// Prepare the resized video thumbnail, the URL is the same as the video
						$image_format = $this->config->get('config_image_filetype');
						if ($image_format == 'as_uploaded') {
							$image_format = ".png";  // Default to PNG if 'as_uploaded' is chosen
						}
						$image = $result['image'];

						$poster = substr_replace($result['image'], '.png', strrpos($result['image'], '.'));  // Only modify the $poster variable
						$poster = $this->model_tool_image->resize(html_entity_decode($poster, ENT_QUOTES, 'UTF-8'), $setting['width'], $setting['height']);

					}
					$image = $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $setting['width'], $setting['height']);

				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float) $result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float) $result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				$product_data = [
					'product_id' => $result['product_id'],
					'thumb' => $image,
					'poster' => $poster,
					'name' => $result['name'],
					'description' => oc_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('config_product_description_length')) . '..',
					'price' => $price,
					'special' => $special,
					'setWidth' => $setting['width'],
					'setHeight' => $setting['height'],
					'tax' => $tax,
					'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating' => $result['rating'],
					'href' => $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . $result['product_id'])
				];

				$data['products'][] = $this->load->controller('product/thumb', $product_data);
			}




			$data['module'] = "special";

			return $this->load->view('extension/ventocart/module/special', $data);

		} else {
			return '';
		}
	}
}
