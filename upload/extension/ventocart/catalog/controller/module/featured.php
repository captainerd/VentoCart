<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Module;
/**
 * Class Featured
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Featured extends \Ventocart\System\Engine\Controller
{
	/**
	 * @param array $setting
	 *
	 * @return string
	 */
	public function index(array $setting): string
	{
		$this->load->language('extension/ventocart/module/featured');


		$data['products'] = [];
		$data['autoplay'] = $setting['autoplay'];
		$data['interval'] = $setting['interval'];
		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		if (!empty($setting['product'])) {
			$products = [];

			foreach ($setting['product'] as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);

				if ($product_info) {
					$products[] = $product_info;
				}
			}

			foreach ($products as $product) {
				if ($product['image']) {

					// Video poster creation
					$fileExtension = strtolower(pathinfo($product['image'], PATHINFO_EXTENSION));
					$poster = '';

					if (in_array($fileExtension, ['mp4', 'mkv', 'avi'])) {

						// Prepare the resized video thumbnail, the URL is the same as the video
						$image_format = $this->config->get('config_image_filetype');
						if ($image_format == 'as_uploaded') {
							$image_format = ".png";  // Default to PNG if 'as_uploaded' is chosen
						}
						$image = $product['image'];

						$poster = substr_replace($product['image'], '.png', strrpos($product['image'], '.'));  // Only modify the $poster variable
						$poster = $this->model_tool_image->resize(html_entity_decode($poster, ENT_QUOTES, 'UTF-8'), $setting['width'], $setting['height']);

					}
					$image = $this->model_tool_image->resize(html_entity_decode($product['image'], ENT_QUOTES, 'UTF-8'), $setting['width'], $setting['height']);


				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float) $product['special']) {
					$special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float) $product['special'] ? $product['special'] : $product['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				$product_data = [
					'product_id' => $product['product_id'],
					'thumb' => $image,
					'poster' => $poster,
					'name' => $product['name'],
					'description' => oc_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('config_product_description_length')) . '..',
					'price' => $price,
					'special' => $special,
					'date_added' => $product['date_added'],
					'new' => (strtotime($product['date_added']) >= time() - 604800) ? true : false,
					'setWidth' => $setting['width'],
					'setHeight' => $setting['height'],
					'tax' => $tax,
					'minimum' => $product['minimum'] > 0 ? $product['minimum'] : 1,
					'rating' => (int) $product['rating'],
					'href' => $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . $product['product_id'])
				];

				$data['products'][] = $this->load->controller('product/thumb', $product_data);
			}
		}

		if ($data['products']) {


			return $this->load->view('extension/ventocart/module/featured', $data);

		} else {
			return '';
		}
	}
}
