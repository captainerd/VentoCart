<?php
namespace Ventocart\Admin\Controller\Catalog;

class Variations extends \Ventocart\System\Engine\Controller
{

	public function savevariations()
	{
		$this->load->language('catalog/product');
		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$json['error'] = $this->language->get('error_permission');
			$this->response->setOutput(json_encode($json));
			return;
		}

		$this->load->language('catalog/product');
		// Check if product_id is set in the request
		$json = [];
		if (isset($this->request->get['product_id'])) {
			$product_id = (int) $this->request->get['product_id'];
		} else {
			$product_id = 0;
		}
		$this->load->model('catalog/variations');
		// Check if the request is a POST request
		if ($this->request->server['REQUEST_METHOD'] === 'POST') {
			// Get the POST data
			$variation_edit = isset($this->request->post['variation_edit_id']) ? (int) $this->request->post['variation_edit_id'] : 0;
			$variation_price = $this->request->post['variation_price'];
			$variation_quantity = $this->request->post['variation_quantity'];
			$variation_sku = $this->request->post['variation_sku'];
			$model = $this->request->post['variation_model'];
			$subtract = isset($this->request->post['subtract']) ? $this->request->post['subtract'] : 0;
			$result = $this->model_catalog_variations->validateFreeSku($variation_sku);
			$option_values = [];
			if (!isset($this->request->post['option_value']) || count($this->request->post['option_value']) < 1) {
				$json['error'] = $this->language->get('error_single_option');
			} else {
				$option_values = $this->request->post['option_value'];
			}

			if (!$result) {
				$json['error'] = $this->language->get('error_sku_not_unique');
			}

			if (!isset($json['error'])) {

				if ($variation_edit === 0) {
					// Add new variation
					$result = $this->model_catalog_variations->addVariation($product_id, $variation_quantity, $variation_price, $variation_sku, $option_values, $subtract, $model);

					$json['success'] = true;
					$json['message'] = 'Variation added successfully';
				} else {
					// Update existing variation
					$result = $this->model_catalog_variations->updateVariation($variation_edit, $variation_quantity, $variation_price, $variation_sku, $option_values, $subtract, $model);

					$json['success'] = true;
					$json['message'] = 'Variation updated successfully';
				}

			}
			// Send JSON response
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}
	public function index()
	{

		$this->load->language('catalog/product');
		if (isset($this->request->get['product_id'])) {
			$product_id = (int) $this->request->get['product_id'];
		} else {
			$product_id = 0;
		}
		$this->load->model('catalog/variations');
		$this->load->model('catalog/product');



		//Non updated options, use Old VentoCart Format (getOptionsLegacy) 
		//Consider updating it, will reduce nested loops into one.
		$option_data = $this->model_catalog_product->getOptionsLegacy($product_id);


		/* Non getOptionsLegacy() For original 

			  *** VentoCart: getOptions(), getOption(), getValue(), 
			  *** Load models: catalog/option, catalog/product

				  $product_options = $this->model_catalog_product->getOptions($product_id);

			  foreach ($product_options as $product_option) {
				  $option_info = $this->model_catalog_option->getOption($product_option['option_id']);

				  if ($option_info) {
					  if ( $option_info['type'] != "checkbox" &&  $option_info['type'] != "radio" &&  $option_info['type'] != "select") continue;
					  $product_option_value_data = [];

					  foreach ($product_option['product_option_value'] as $product_option_value) {
					   
						  $option_value_info = $this->model_catalog_option->getValue($product_option_value['option_value_id']);
				   
						  if ($option_value_info) {
							  $product_option_value_data[] = [
								  'product_option_value_id' => $product_option_value['product_option_value_id'],
								  'option_value_id' => $product_option_value['option_value_id'],
								  'name' => $option_value_info['name'],
								  'price' => (float) $product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
								  'price_prefix' => $product_option_value['price_prefix']
							  ];
						  }
					  }

					  $option_data[] = [
						  'product_option_id' => $product_option['product_option_id'],
						  'product_option_value' => $product_option_value_data,
						  'option_id' => $product_option['option_id'],
						  'name' => $option_info['name'],
						  'type' => $option_info['type'],
						  'value' => $product_option['value'],
						  'required' => $product_option['required']
					  ];
				  }
			  }
			  */


		// Get existing variations for the product
		$existingVariations = $this->model_catalog_variations->getVariations($product_id);

		// Organize existing variations data
		$existingVariationsData = [];
		foreach ($existingVariations as $existingVariation) {
			$variationData = [
				'sku' => $existingVariation['sku'],
				'quantity' => $existingVariation['quantity'],
				'model' => $existingVariation['model'],
				'price' => $existingVariation['price'],
				'subtract' => $existingVariation['subtract'],
				'price_formated' => $this->currency->format($existingVariation['price'], $this->config->get('config_currency')),
				'options' => [],
				'variation_id' => $existingVariation['variation_id'],
			];

			foreach ($existingVariation['options'] as $variationOption) {
				foreach ($option_data as $productOption) {
					foreach ($productOption['product_option_value'] as $productOptionValue) {
						// Check if the option IDs match
						if ($variationOption['product_option_id'] == $productOptionValue['product_option_value_id']) {

							$variationData['options'][] = [
								'name' => $productOption['name'],
								'value' => $productOptionValue['name'],

							];
							$variationData['options_ids'][] = [
								'option_id' => $variationOption['product_option_id'],
								'option_value_id' => $productOptionValue['option_value_id'],

							];
						}
					}
				}
			}
			$existingVariationsData[] = $variationData;
		}


		// Prepare data for the view
		$data['existing_variations'] = $existingVariationsData;
		$data['user_token'] = $this->session->data['user_token'];
		$data['product_id'] = $product_id;

		$data['option_data'] = $option_data;


		$this->response->setOutput($this->load->view('catalog/product_tabs/variations_tab', $data));

	}

	public function deleteVariation()
	{

		$this->load->language('catalog/product');
		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$json['error'] = $this->language->get('error_permission');
			$this->response->setOutput(json_encode($json));
			return;
		}
		$json = ['success' => false, 'message' => 'Variation deletion failed'];

		if (isset($this->request->get['variation_id'])) {
			$variation_id = (int) $this->request->get['variation_id'];

			$this->load->model('catalog/variations');

			// Attempt to delete the variation
			$deleteResult = $this->model_catalog_variations->deleteVariation($variation_id);

			if ($deleteResult) {
				// Variation deletion was successful
				$json['success'] = true;
				$json['message'] = 'Variation deleted successfully';
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}











}


?>