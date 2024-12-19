<?php
namespace Ventocart\Catalog\Model\Checkout;
class Cart extends \Ventocart\System\Engine\Model
{
	public function getProducts(): array
	{
		$this->load->model('tool/image');
		$this->load->model('tool/upload');

		// Products
		$product_data = [];

		$products = $this->cart->getProducts();

		foreach ($products as $product) {
			if ($product['image']) {
				$image = $this->model_tool_image->resize(html_entity_decode($product['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_cart_width'), $this->config->get('config_image_cart_height'));
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('config_image_cart_width'), $this->config->get('config_image_cart_height'));
			}

			$option_data = [];

			foreach ($product['option'] as $option) {
				if ($option['type'] != 'file') {
					$value = $option['value'];
				} else {
					$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);


					if ($upload_info) {
						$value = $upload_info['code'];
					} else {
						$value = '';
					}
				}

				$option_data[] = [
					'product_option_id' => $option['product_option_id'],
					'product_id' => $option['product_id'],
					'name' => $option['name'],
					'value' => $value,
					'type' => $option['type']
				];
			}




			$product_data[] = [
				'cart_id' => $product['cart_id'],
				'product_id' => $product['product_id'],
				'variation_id' => $product['variation_id'],
				'type' => $product['type'],
				'image' => $image,
				'name' => $product['name'],
				'model' => $product['model'],
				'sku' => $product['sku'],
				'option' => $option_data,
				'subscription' => $product['subscription'],
				'download' => $product['download'],
				'quantity' => $product['quantity'],
				'stock' => $product['stock'],
				'minimum' => $product['minimum'],
				'shipping' => $product['shipping'],
				'subtract' => $product['subtract'],
				'reward' => $product['reward'],
				'tax_class_id' => $product['tax_class_id'],
				'price' => $product['price'],
				'total' => $product['total']
			];
		}

		return $product_data;
	}


	public function getTotals(array $totals, array $taxes, int $total): array
	{

		$sort_order = [];

		$this->load->model('setting/extension');

		$results = $this->model_setting_extension->getExtensionsByType('total');

		foreach ($results as $key => $value) {
			$sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
		}

		array_multisort($sort_order, SORT_ASC, $results);

		foreach ($results as $result) {
			if ($this->config->get('total_' . $result['code'] . '_status')) {
				$this->load->model('extension/' . $result['extension'] . '/total/' . $result['code']);


				[$totals, $taxes, $total] = $this->{'model_extension_' . $result['extension'] . '_total_' . $result['code']}->getTotal($totals, $taxes, $total);

			}
		}

		$sort_order = [];

		foreach ($totals as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}

		array_multisort($sort_order, SORT_ASC, $totals);

		$resnew = [];
		foreach ($totals as $key => $value) {

			if ($value['code'] != "sub_total" && $value['code'] != "tax")
				array_push($resnew, $value);
		}
		return [$totals, $taxes, $total];
	}


}
