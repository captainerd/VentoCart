<?php
namespace Ventocart\Admin\Model\Catalog;
class Variations extends \Ventocart\System\Engine\Model
{


	public function updateVariation($variation_id, $quantity, $price, $sku, $option_values, $subtract, $model)
	{
		$error = false;

		// Update data in variations table
		$result = $this->db->query("
        UPDATE `" . DB_PREFIX . "variations` 
        SET 
            `sku` = '" . $this->db->escape($sku) . "',
            `quantity` = '" . (int) $quantity . "',
            `price` = '" . (float) $price . "',
            `model` = '" . $this->db->escape($model) . "',
            `subtract` = '" . (float) $subtract . "'
        WHERE `variation_id` = '" . (int) $variation_id . "'
    ");

		$error = $error && $result;

		// Delete existing data in variation_options table for the variation
		$result = $this->db->query("
        DELETE FROM `" . DB_PREFIX . "variation_options` 
        WHERE `variation_id` = '" . (int) $variation_id . "'
    ");

		$error = $error && $result;

		// Insert updated data into variation_options table
		foreach ($option_values as $option_value_id) {
			$result = $this->db->query("
            INSERT INTO `" . DB_PREFIX . "variation_options` 
            SET 
                `variation_id` = '" . (int) $variation_id . "',
                `product_option_id` = '" . (int) $option_value_id . "'
        ");

			$error = $error && $result;
		}

		// Return success or handle errors accordingly
		return !$error; // Return true if no errors, false otherwise
	}


	public function addVariation(int $product_id, $quantity, $price, $sku, $option_values, $subtract, $model)
	{
		$error = false;

		// Insert data into variations table
		$result = $this->db->query("
			INSERT INTO `" . DB_PREFIX . "variations` 
			SET 
				`product_id` = '" . (int) $product_id . "',
				`sku` = '" . $this->db->escape($sku) . "',
				`quantity` = '" . (int) $quantity . "',
				`price` = '" . (float) $price . "',
				`model` = '" . $this->db->escape($model) . "',
				`subtract` = '" . (float) $subtract . "'
		");

		$error = $error && $result;

		// Get the last inserted variation_id
		$variation_id = $this->db->getLastId();

		// Insert data into variation_options table
		foreach ($option_values as $option_value_id) {
			$result = $this->db->query("
				INSERT INTO `" . DB_PREFIX . "variation_options` 
				SET 
					`variation_id` = '" . (int) $variation_id . "',
					`product_option_id` = '" . (int) $option_value_id . "'
			");

			$error = $error && $result;
		}

		// Return success or handle errors accordingly
		return !$error; // Return true if no errors, false otherwise
	}
	public function getVariations(int $product_id)
	{
		$query = $this->db->query("
			SELECT *
			FROM `" . DB_PREFIX . "variations` v
			LEFT JOIN `" . DB_PREFIX . "variation_options` vo ON v.variation_id = vo.variation_id
			WHERE v.product_id = '" . (int) $product_id . "'
		");

		$variations = [];

		foreach ($query->rows as $row) {
			$variationId = $row['variation_id'];

			if (!isset($variations[$variationId])) {
				// Initialize the variation entry
				$variations[$variationId] = [
					'variation_id' => $variationId,
					'sku' => $row['sku'],
					'model' => $row['model'],
					'quantity' => $row['quantity'],
					'subtract' => $row['subtract'],
					'price' => $row['price'],
					'options' => [],
				];
			}

			// Add option details to the variation entry
			if ($row['variation_option_id'] !== null) {
				$variations[$variationId]['options'][] = [
					'variation_option_id' => $row['variation_option_id'],
					'product_option_id' => $row['product_option_id'],
				];
			}
		}

		return $variations;
	}
	public function deleteVariation(int $variation_id)
	{
		$success = true;
		$success = $success && $this->db->query("DELETE FROM `" . DB_PREFIX . "variations` WHERE variation_id = '" . (int) $variation_id . "'");
		$success = $success && $this->db->query("DELETE FROM `" . DB_PREFIX . "variation_options` WHERE variation_id = '" . (int) $variation_id . "'");

		return $success;
	}

	public function validateFreeSku(string $sku, $product_id = null)
	{
		// Check if SKU is used by another product
		$productQuery = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product` WHERE sku = '" . $this->db->escape($sku) . "'");

		if ($productQuery->num_rows > 0) {
			// SKU is used by another product
			if ($product_id !== null) {
				// Check if the SKU is used by another product (excluding the provided product_id)
				$usedByProduct = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product` WHERE sku = '" . $this->db->escape($sku) . "' AND product_id != '" . (int) $product_id . "'");

				// If SKU is used by another product, return false
				if ($usedByProduct->num_rows > 0) {
					return false;
				}
			} else {
				// SKU is used by another product
				return false;
			}
		}

		// Continue checking in the variations table
		$variationQuery = $this->db->query("SELECT * FROM `" . DB_PREFIX . "variations` WHERE sku = '" . $this->db->escape($sku) . "'");

		// If SKU is used by a variation and the provided product_id matches, return true
		if ($variationQuery->num_rows > 0 && $product_id !== null) {
			$variationProductId = $this->getVariationProductId($variationQuery->row['variation_id']);
			if ($variationProductId == $product_id) {
				return true;
			}
		}

		// SKU is not used by any products or used by the same product ID, return true
		return true;
	}

	protected function getVariationProductId(int $variation_id)
	{
		$query = $this->db->query("SELECT product_id FROM `" . DB_PREFIX . "variations` WHERE variation_id = '" . (int) $variation_id . "'");
		return ($query->num_rows > 0) ? (int) $query->row['product_id'] : 0;
	}

}

?>