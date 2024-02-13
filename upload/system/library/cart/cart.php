<?php
namespace Opencart\System\Library\Cart;

class Cart {
	private object $db;
	private object $config;
	private object $customer;
	private object $session;
	private object $tax;
	private object $weight;
	private array $data = [];

	/**
	 * Constructor
	 *
	 * @param    object  $registry
	 */
	public function __construct(\Opencart\System\Engine\Registry $registry) {
		$this->db = $registry->get('db');
		$this->config = $registry->get('config');
		$this->customer = $registry->get('customer');
		$this->session = $registry->get('session');
		$this->tax = $registry->get('tax');
		$this->weight = $registry->get('weight');

		// Remove all the expired carts with no customer ID
		$this->db->query("DELETE FROM `".DB_PREFIX."cart` WHERE (`api_id` > '0' OR `customer_id` = '0') AND `date_added` < DATE_SUB(NOW(), INTERVAL 1 HOUR)");

		if($this->customer->isLogged()) {
			// We want to change the session ID on all the old items in the customers cart
			$this->db->query("UPDATE `".DB_PREFIX."cart` SET `session_id` = '".$this->db->escape($this->session->getId())."' WHERE `api_id` = '0' AND `customer_id` = '".(int)$this->customer->getId()."'");

			// Once the customer is logged in we want to update the customers cart
			$cart_query = $this->db->query("SELECT * FROM `".DB_PREFIX."cart` WHERE `api_id` = '0' AND `customer_id` = '0' AND `session_id` = '".$this->db->escape($this->session->getId())."'");

			foreach($cart_query->rows as $cart) {
				$this->db->query("DELETE FROM `".DB_PREFIX."cart` WHERE `cart_id` = '".(int)$cart['cart_id']."'");

				// The advantage of using $this->add is that it will check if the products already exist and increase the quantity if necessary.
				$this->add($cart['product_id'], $cart['quantity'], json_decode($cart['option'], true), $cart['subscription_plan_id'], $cart['override'], $cart['price']);
			}
		}

		// Populate the cart data
		$this->data = $this->getProducts();
	}

	/**
	 * getProducts
	 *
	 * @return	array
	 */


	public function getProducts(): array {

		if(!$this->data) {
			$cart_query = $this->db->query("SELECT * FROM `".DB_PREFIX."cart` WHERE `api_id` = '".(isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0)."' AND `customer_id` = '".(int)$this->customer->getId()."' AND `session_id` = '".$this->db->escape($this->session->getId())."'");

			foreach($cart_query->rows as $cart) {
				$stock = true;

				$product_query = $this->db->query("SELECT * FROM `".DB_PREFIX."product_to_store` `p2s` LEFT JOIN `".DB_PREFIX."product` p ON (p2s.`product_id` = p.`product_id`) LEFT JOIN `".DB_PREFIX."product_description` pd ON (p.`product_id` = pd.`product_id`) WHERE p2s.`store_id` = '".(int)$this->config->get('config_store_id')."' AND p2s.`product_id` = '".(int)$cart['product_id']."' AND pd.`language_id` = '".(int)$this->config->get('config_language_id')."' AND p.`date_available` <= NOW() AND p.`status` = '1'");

				if($product_query->num_rows && ($cart['quantity'] > 0)) {
					$option_price = 0;
					$option_points = 0;
					$option_weight = 0;

					$option_data = [];

					$product_options = (array)json_decode($cart['option'], true);
					$product_id = $product_query->row['product_id'];

					$variationOptionQuery = $this->db->query("
					SELECT
						v.variation_id,
						v.sku,
						v.subtract,
						v.quantity,
						v.price,
						v.model,
						GROUP_CONCAT(vo.p_opt_value_id) AS options
					FROM
						".DB_PREFIX."variation_options vo
					LEFT JOIN
						".DB_PREFIX."variations v ON vo.variation_id = v.variation_id
					WHERE
						v.product_id = '".$product_id."'
					GROUP BY
						v.variation_id
				");


					//Reform variants structure by sql query
					$variants = [];

					foreach($variationOptionQuery->rows as $row) {
						$variants[] = [
							'variation_id' => $row['variation_id'],
							'options' => explode(',', $row['options']),
							'sku' => $row['sku'],
							'quantity' => $row['quantity'],
							'subtract' => $row['subtract'],
							'model' => $row['model'],
							'price' => $row['price'],
						];
					}
				 
				 
					//Find applicable variant for this product, if any.
					$ApplicableVariant = $this->applicapleVariant($variants, $product_options);

 
					if(empty($ApplicableVariant))
						$ApplicableVariant['options'] = []; //ensure options exists for in_array later.


					foreach($product_options as $product_option_id => $value) {

						 
						$option_query = $this->db->query("
						SELECT 
							po.*, 
							o.*, 
							o3.name AS group_name, 
							ob.name AS name,
							po.value AS option_image,
							og.type AS type 
						FROM 
							`" . DB_PREFIX . "product_options` po
						LEFT JOIN 
							`" . DB_PREFIX . "options` o ON po.option_id = o.option_id
						LEFT JOIN 
							`" . DB_PREFIX . "options` og ON o.group_id = og.option_id
						LEFT JOIN 
						     `" . DB_PREFIX . "options` ob ON 
								ob.option_n = o.option_n
								AND ob.group_id = o.group_id
								AND ob.language_id = '" . (int)$this->config->get('config_language_id') . "'
						LEFT JOIN 
							`" . DB_PREFIX . "options` o3 ON 
								o3.option_n = og.option_n
								AND o3.group_id = o.group_id
								AND o3.language_id = '" . (int)$this->config->get('config_language_id') . "'
						WHERE  
							po.`poption_id` = '" . (int)$value . "' 
				        OR 	po.`poption_id` = '" . (int)$product_option_id . "' 
							AND po.product_id = '" . (int)$product_id . "'
					");
		 


						if($option_query->num_rows) {


							if($option_query->row['type'] == 'select' || $option_query->row['type'] == 'radio') {


								$product_id = (int)$product_id;




								if($option_query->num_rows) {

									if($option_query->row['price_prefix'] == '+') {
										$option_price += $option_query->row['price'];
									} elseif($option_query->row['price_prefix'] == '-') {
										$option_price -= $option_query->row['price'];
									} elseif($option_query->row['price_prefix'] == '=') {
										$product_query->row['price'] = $option_query->row['price'];
									}

									if($option_query->row['points_prefix'] == '+') {
										$option_points += $option_query->row['points'];
									} elseif($option_query->row['points_prefix'] == '-') {
										$option_points -= $option_query->row['points'];
									}

									if($option_query->row['weight_prefix'] == '+') {
										$option_weight += $option_query->row['weight'];
									} elseif($option_query->row['weight_prefix'] == '-') {
										$option_weight -= $option_query->row['weight'];
									}

									if($option_query->row['subtract'] && (!$option_query->row['quantity'] || ($option_query->row['quantity'] < $cart['quantity']))) {
										$stock = false;
									}

									if(in_array($value, $ApplicableVariant['options'])) {
										//That option is a part that makes up an applicable variant 
										$option_price = 0;
									}
 
									 if (!empty($option_query->row['option_image']) && is_file(DIR_IMAGE .  $option_query->row['option_image'])) {
										$image = $option_query->row['option_image'];  
									 }
									$option_data[] = [
										'poption_id' => $value,
										'product_id' => $product_id,
										'name' => $option_query->row['group_name'],
										'value' => $option_query->row['name'],
										'type' => $option_query->row['type'],
										'quantity' => $option_query->row['quantity'],
										'subtract' => $option_query->row['subtract'],
										'price' => $option_query->row['price'],
										'price_prefix' => $option_query->row['price_prefix'],
										'points' => $option_query->row['points'],
										'points_prefix' => $option_query->row['points_prefix'],
										'weight' => $option_query->row['weight'],
										'weight_prefix' => $option_query->row['weight_prefix']
									];
								}
							} elseif($option_query->row['type'] == 'checkbox' && is_array($value)) {
								foreach($value as $product_option_value_id) {
 
									$option_value_query = $this->db->query("
									SELECT 
										po.*, 
										o.*, 
										o3.name AS group_name, 
										ob.name AS name,
										og.type AS type 
									FROM 
										`" . DB_PREFIX . "product_options` po
									LEFT JOIN 
										`" . DB_PREFIX . "options` o ON po.option_id = o.option_id
									LEFT JOIN 
										`" . DB_PREFIX . "options` og ON o.group_id = og.option_id
									LEFT JOIN 
										 `" . DB_PREFIX . "options` ob ON 
											ob.option_n = o.option_n
											AND ob.group_id = o.group_id
											AND ob.language_id = '" . (int)$this->config->get('config_language_id') . "'
									LEFT JOIN 
										`" . DB_PREFIX . "options` o3 ON 
											o3.option_n = og.option_n
											AND o3.group_id = o.group_id
											AND o3.language_id = '" . (int)$this->config->get('config_language_id') . "'
									WHERE  
										po.`poption_id` = '" . (int)$product_option_value_id . "' 
										AND po.product_id = '" . (int)$product_id . "'
								");


									if($option_value_query->num_rows) {

										if($option_value_query->row['price_prefix'] == '=') {
											$product_query->row['price'] = $option_value_query->row['price'];
										} elseif($option_value_query->row['price_prefix'] == '+') {
											$option_price += $option_value_query->row['price'];
										} elseif($option_value_query->row['price_prefix'] == '-') {
											$option_price -= $option_value_query->row['price'];
										}

										if($option_value_query->row['points_prefix'] == '+') {
											$option_points += $option_value_query->row['points'];
										} elseif($option_value_query->row['points_prefix'] == '-') {
											$option_points -= $option_value_query->row['points'];
										}

										if($option_value_query->row['weight_prefix'] == '+') {
											$option_weight += $option_value_query->row['weight'];
										} elseif($option_value_query->row['weight_prefix'] == '-') {
											$option_weight -= $option_value_query->row['weight'];
										}

										if($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $cart['quantity']))) {
											$stock = false;
										}


										if(in_array($value, $ApplicableVariant['options'])) {
											//That option is a part that makes up an applicable variant 
											$option_price = 0;
										}

									 

										$option_data[] = [
											'poption_id' => $product_option_value_id,
											'product_id' => $product_id,
											'name' => $option_value_query->row['group_name'],
											'value' => $option_value_query->row['name'],
											'type' => $option_value_query->row['type'],
											'quantity' => $option_value_query->row['quantity'],
											'subtract' => $option_value_query->row['subtract'],
											'price' => $option_value_query->row['price'],
											'price_prefix' => $option_value_query->row['price_prefix'],
											'points' => $option_value_query->row['points'],
											'points_prefix' => $option_value_query->row['points_prefix'],
											'weight' => $option_value_query->row['weight'],
											'weight_prefix' => $option_value_query->row['weight_prefix']
										];
									}
								}

							} elseif($option_query->row['type'] == 'text' || $option_query->row['type'] == 'textarea' || $option_query->row['type'] == 'file' || $option_query->row['type'] == 'date' || $option_query->row['type'] == 'datetime' || $option_query->row['type'] == 'time') {
								$option_data[] = [
									'poption_id' => $product_option_id,
									'product_id' => $product_id,
									'name' => $option_query->row['name'],
									'value' => $value,
									'type' => $option_query->row['type'],
									'quantity' => '',
									'subtract' => '',
									'price' => '',
									'price_prefix' => '',
									'points' => '',
									'points_prefix' => '',
									'weight' => '',
									'weight_prefix' => ''
								];
							}
						}
					}

					$price = $product_query->row['price'];

					// Product Discounts
					$discount_quantity = 0;

					foreach($cart_query->rows as $cart_2) {
						if($cart_2['product_id'] == $cart['product_id']) {
							$discount_quantity += $cart_2['quantity'];
						}
					}

					$product_discount_query = $this->db->query("SELECT `price` FROM `".DB_PREFIX."product_discount` WHERE `product_id` = '".(int)$cart['product_id']."' AND `customer_group_id` = '".(int)$this->config->get('config_customer_group_id')."' AND `quantity` <= '".(int)$discount_quantity."' AND ((`date_start` = '0000-00-00' OR `date_start` < NOW()) AND (`date_end` = '0000-00-00' OR `date_end` > NOW())) ORDER BY `quantity` DESC, `priority` ASC, `price` ASC LIMIT 1");

					if($product_discount_query->num_rows) {
						$price = $product_discount_query->row['price'];
					}

					// Product Specials
					$product_special_query = $this->db->query("SELECT * FROM `".DB_PREFIX."product_special` WHERE `product_id` = '".(int)$cart['product_id']."' AND `customer_group_id` = '".(int)$this->config->get('config_customer_group_id')."' AND ((`date_start` = '0000-00-00' OR `date_start` < NOW()) AND (`date_end` = '0000-00-00' OR `date_end` > NOW())) ORDER BY `priority` ASC, `price` ASC LIMIT 1");
					$special_off = 0;
					if($product_special_query->num_rows) {

					     //Is type 'new price' and applies only to the main product
						if ($product_special_query->row['type'] == 0 && $product_special_query->row['apply'] == 0 ) {
						$price = $product_special_query->row['price'];
						}

						//Is type precentage and applies only to the main product
						if ($product_special_query->row['type'] == 1  && $product_special_query->row['apply'] == 0) {
						$special_off = number_format($product_special_query->row['price'],0);
						$price = $price - ($price * $special_off / 100);
						$special_off = 0;
						}

						//Is precentage and applies to the total sum (+options or varriations)
						if ($product_special_query->row['type'] == 1 && $product_special_query->row['apply'] == 1) {
							$special_off = number_format($product_special_query->row['price'],0);
						}
					}



					$product_total = 0;

					foreach($cart_query->rows as $cart_2) {
						if($cart_2['product_id'] == $cart['product_id']) {
							$product_total += $cart_2['quantity'];
						}
					}

					if($product_query->row['minimum'] > $product_total) {
						$minimum = false;
					} else {
						$minimum = true;
					}

					// Reward Points
					$product_reward_query = $this->db->query("SELECT `points` FROM `".DB_PREFIX."product_reward` WHERE `product_id` = '".(int)$cart['product_id']."' AND `customer_group_id` = '".(int)$this->config->get('config_customer_group_id')."'");

					if($product_reward_query->num_rows) {
						$reward = $product_reward_query->row['points'];
					} else {
						$reward = 0;
					}

					// Downloads
					$download_data = [];

					$download_query = $this->db->query("SELECT * FROM `".DB_PREFIX."product_to_download` p2d LEFT JOIN `".DB_PREFIX."download` d ON (p2d.`download_id` = d.`download_id`) LEFT JOIN `".DB_PREFIX."download_description` dd ON (d.`download_id` = dd.`download_id`) WHERE p2d.`product_id` = '".(int)$cart['product_id']."' AND dd.`language_id` = '".(int)$this->config->get('config_language_id')."'");

					foreach($download_query->rows as $download) {
						$download_data[] = [
							'download_id' => $download['download_id'],
							'name' => $download['name'],
							'filename' => $download['filename'],
							'mask' => $download['mask']
						];
					}

					// Stock
					if(!$product_query->row['quantity'] || ($product_query->row['quantity'] < $cart['quantity'])) {
						$stock = false;
					}

					$subscription_data = [];

					$subscription_query = $this->db->query("SELECT * FROM `".DB_PREFIX."product_subscription` ps LEFT JOIN `".DB_PREFIX."subscription_plan` sp ON (ps.`subscription_plan_id` = sp.`subscription_plan_id`) LEFT JOIN `".DB_PREFIX."subscription_plan_description` spd ON (sp.`subscription_plan_id` = spd.`subscription_plan_id`) WHERE ps.`product_id` = '".(int)$cart['product_id']."' AND ps.`subscription_plan_id` = '".(int)$cart['subscription_plan_id']."' AND ps.`customer_group_id` = '".(int)$this->config->get('config_customer_group_id')."' AND spd.`language_id` = '".(int)$this->config->get('config_language_id')."' AND sp.`status` = '1'");

					if($subscription_query->num_rows) {
						$price = $subscription_query->row['price'];

						if($subscription_query->row['trial_status']) {
							$price = $subscription_query->row['trial_price'];
						}

						$subscription_data = [
							'subscription_plan_id' => $subscription_query->row['subscription_plan_id'],
							'name' => $subscription_query->row['name'],
							'trial_price' => $subscription_query->row['trial_price'],
							'trial_frequency' => $subscription_query->row['trial_frequency'],
							'trial_cycle' => $subscription_query->row['trial_cycle'],
							'trial_duration' => $subscription_query->row['trial_duration'],
							'trial_remaining' => $subscription_query->row['trial_duration'],
							'trial_status' => $subscription_query->row['trial_status'],
							'price' => $subscription_query->row['price'],
							'frequency' => $subscription_query->row['frequency'],
							'cycle' => $subscription_query->row['cycle'],
							'duration' => $subscription_query->row['duration'],
							'remaining' => $subscription_query->row['duration']
						];
					}

					if($cart['override']) {
						$price = $cart['price'];
					}

					$subtract = $product_query->row['subtract'];
					$variantid = 0;
					$model = $product_query->row['model'];
					if (!isset($image)) {
						
						$image = $product_query->row['image'];
					}
					//Apply variant data to the product 
					if(!empty($ApplicableVariant['options'])) {

						$price = $ApplicableVariant['price'];
						$stock = $ApplicableVariant['quantity'];
						$variantid = $ApplicableVariant['variation_id'];
						$subtract = $ApplicableVariant['subtract'];
						$model = $ApplicableVariant['model'];

					}
					//If $special_off  isn't 0, it means applies on sum/total
					$price = $price - ($price * $special_off / 100);

					$this->data[$cart['cart_id']] = [
						'cart_id' => $cart['cart_id'],
						'product_id' => $product_query->row['product_id'],
						'variation_id' => $variantid,
						'name' => $product_query->row['name'],
						'model' => $model,
						'shipping' => $product_query->row['shipping'],
						'image' => $image,
						'option' => $option_data,
						'subscription' => $subscription_data,
						'download' => $download_data,
						'quantity' => $cart['quantity'],
						'minimum' => $minimum,
						'subtract' => $subtract,
						'stock' => $stock,
						'price' => ($price + $option_price),
						'total' => ($price + $option_price) * $cart['quantity'],
						'reward' => $reward * $cart['quantity'],
						'points' => ($product_query->row['points'] ? ($product_query->row['points'] + $option_points) * $cart['quantity'] : 0),
						'tax_class_id' => $product_query->row['tax_class_id'],
						'weight' => ($product_query->row['weight'] + $option_weight) * $cart['quantity'],
						'weight_class_id' => $product_query->row['weight_class_id'],
						'length' => $product_query->row['length'],
						'width' => $product_query->row['width'],
						'height' => $product_query->row['height'],
						'length_class_id' => $product_query->row['length_class_id']
					];
					$image = null;
				} else {
					$this->remove($cart['cart_id']);
				}
			}
		}

 
		return $this->data;
	}

	/**
	 * Add
	 *
	 * @param	int	 $product_id
	 * @param	int	 $quantity
	 * @param	array  $option
	 * @param	int	 $subscription_plan_id
	 *
	 * @return	void
	 */
	public function add(int $product_id, int $quantity = 1, array $option = [], int $subscription_plan_id = 0, bool $override = false, float $price = 0): void {
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `".DB_PREFIX."cart` WHERE `api_id` = '".(isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0)."' AND `customer_id` = '".(int)$this->customer->getId()."' AND `session_id` = '".$this->db->escape($this->session->getId())."' AND `product_id` = '".(int)$product_id."' AND `subscription_plan_id` = '".(int)$subscription_plan_id."' AND `option` = '".$this->db->escape(json_encode($option))."'");

		if(!$query->row['total']) {
			// Collect the variable names and their values into an array


			$this->db->query("INSERT INTO `".DB_PREFIX."cart` SET `api_id` = '".(isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0)."', `customer_id` = '".(int)$this->customer->getId()."', `session_id` = '".$this->db->escape($this->session->getId())."', `product_id` = '".(int)$product_id."', `subscription_plan_id` = '".(int)$subscription_plan_id."', `option` = '".$this->db->escape(json_encode($option))."', `quantity` = '".(int)$quantity."', `override` = '".(bool)$override."', `price` = '".(float)($override ? $price : 0)."', `date_added` = NOW()");
		} else {
			$this->db->query("UPDATE `".DB_PREFIX."cart` SET `quantity` = (`quantity` + ".(int)$quantity.") WHERE `api_id` = '".(isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0)."' AND `customer_id` = '".(int)$this->customer->getId()."' AND `session_id` = '".$this->db->escape($this->session->getId())."' AND `product_id` = '".(int)$product_id."' AND `subscription_plan_id` = '".(int)$subscription_plan_id."' AND `option` = '".$this->db->escape(json_encode($option))."'");
		}

		// Populate the cart data
		$this->data = $this->getProducts();
	}

	/**
	 * Update
	 *
	 * @param	int	 $cart_id
	 * @param	int	 $quantity
	 *
	 * @return	void
	 */
	public function update(int $cart_id, int $quantity): void {
		$this->db->query("UPDATE `".DB_PREFIX."cart` SET `quantity` = '".(int)$quantity."' WHERE `cart_id` = '".(int)$cart_id."' AND `api_id` = '".(isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0)."' AND `customer_id` = '".(int)$this->customer->getId()."' AND `session_id` = '".$this->db->escape($this->session->getId())."'");

		// Populate the cart data
		$this->data = $this->getProducts();
	}

	/**
	 * Has
	 *
	 * @param	int	 $cart_id
	 *
	 * @return	bool
	 */
	public function has(int $cart_id): bool {
		return isset($this->data[$cart_id]);
	}

	/**
	 * Remove
	 *
	 * @param	int	 $cart_id
	 *
	 * @return	void
	 */
	public function remove(int $cart_id): void {

		$this->db->query("DELETE FROM `".DB_PREFIX."cart` WHERE `cart_id` = '".(int)$cart_id."' AND `api_id` = '".(isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0)."' AND `customer_id` = '".(int)$this->customer->getId()."' AND `session_id` = '".$this->db->escape($this->session->getId())."'");

		unset($this->data[$cart_id]);
	}

	/**
	 * Clear
	 *
	 * @return	void
	 */
	public function clear(): void {
		$this->db->query("DELETE FROM `".DB_PREFIX."cart` WHERE `api_id` = '".(isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0)."' AND `customer_id` = '".(int)$this->customer->getId()."' AND `session_id` = '".$this->db->escape($this->session->getId())."'");

		$this->data = [];
	}

	/**
	 * getSubscription
	 *
	 * @return	array
	 */
	public function getSubscriptions(): array {
		$product_data = [];

		foreach($this->getProducts() as $value) {
			if($value['subscription']) {
				$product_data[] = $value;
			}
		}

		return $product_data;
	}

	/**
	 * getWeight
	 *
	 * @return	float
	 */
	public function getWeight(): float {
		$weight = 0;

		foreach($this->getProducts() as $product) {
			if($product['shipping']) {
				$weight += $this->weight->convert($product['weight'], $product['weight_class_id'], $this->config->get('config_weight_class_id'));
			}
		}

		return $weight;
	}

	/**
	 * getSubTotal
	 *
	 * @return	float
	 */
	public function getSubTotal(): float {
		$total = 0;

		foreach($this->getProducts() as $product) {
			$total += $product['total'];
		}

		return $total;
	}

	/**
	 * getTaxes
	 *
	 * @return	array
	 */
	public function getTaxes(): array {
		$tax_data = [];

		foreach($this->getProducts() as $product) {
			if($product['tax_class_id']) {
				$tax_rates = $this->tax->getRates($product['price'], $product['tax_class_id']);

				foreach($tax_rates as $tax_rate) {
					if(!isset($tax_data[$tax_rate['tax_rate_id']])) {
						$tax_data[$tax_rate['tax_rate_id']] = ($tax_rate['amount'] * $product['quantity']);
					} else {
						$tax_data[$tax_rate['tax_rate_id']] += ($tax_rate['amount'] * $product['quantity']);
					}
				}
			}
		}

		return $tax_data;
	}

	/**
	 * getTotal
	 *
	 * @return	float
	 */
	public function getTotal(): float {
		$total = 0;

		foreach($this->getProducts() as $product) {
			$total += $this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity'];
		}

		return $total;
	}

	/**
	 * countProducts
	 *
	 * @return	int
	 */
	public function countProducts(): int {
		$product_total = 0;

		$products = $this->getProducts();

		foreach($products as $product) {
			$product_total += $product['quantity'];
		}

		return $product_total;
	}

	/**
	 * hadProducts
	 *
	 * @return	bool
	 */
	public function hasProducts(): bool {
		return (bool)count($this->getProducts());
	}

	/**
	 * hasSubscription
	 *
	 * @return	bool
	 */
	public function hasSubscription(): bool {
		return (bool)count($this->getSubscriptions());
	}

	/**
	 * hasStock
	 *
	 * @return	bool
	 */
	public function hasStock(): bool {
		foreach($this->getProducts() as $product) {
			if(!$product['stock']) {
				return false;
			}
		}

		return true;
	}

	/**
	 * hasShipping
	 *
	 * @return	bool
	 */
	public function hasShipping(): bool {
		foreach($this->getProducts() as $product) {
			if($product['shipping']) {
				return true;
			}
		}

		return false;
	}

	/**
	 * hasDownload
	 *
	 * @return	bool
	 */
	public function hasDownload(): bool {
		foreach($this->getProducts() as $product) {
			if($product['download']) {
				return true;
			}
		}

		return false;
	}

	private function applicapleVariant($variants, $product_options) {
		$override = [];
 
		foreach($variants as $variant) {
			if(count($variant['options']) == 0)
				continue;
			$tofind = $variant['options'];
			foreach($variant['options'] as $option) {

				if($this->in_array_r($option, $product_options)) {
					if(($key = array_search($option, $tofind)) !== false) {
						unset($tofind[$key]);
					}

				}
			}

			if(empty($tofind)) {
				$override = $variant;
				break; //only one scu-variant can buy at once.
			}
		}
		return $override;
	}

	private function in_array_r($needle, $haystack, $strict = false) {
		foreach($haystack as $item) {
			if(($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
				return true;
			}
		}

		return false;
	}

}
