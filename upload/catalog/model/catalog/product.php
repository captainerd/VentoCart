<?php
namespace Opencart\Catalog\Model\Catalog;

/**
 * Class Product
 *
 * @package Opencart\Catalog\Model\Catalog
 */
class Product extends \Opencart\System\Engine\Model
{
	/**
	 * @var array
	 */
	protected array $statement = [];

	/**
	 * @param \Opencart\System\Engine\Registry $registry
	 */
	public function __construct(\Opencart\System\Engine\Registry $registry)
	{
		$this->registry = $registry;

		// Storing some sub queries so that we are not typing them out multiple times.
		$this->statement['discount'] = "(SELECT `pd2`.`price` FROM `" . DB_PREFIX . "product_discount` `pd2` WHERE `pd2`.`product_id` = `p`.`product_id` AND `pd2`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "'AND `pd2`.`quantity` = '1' AND ((`pd2`.`date_start` = '0000-00-00' OR `pd2`.`date_start` < NOW()) AND (`pd2`.`date_end` = '0000-00-00' OR `pd2`.`date_end` > NOW())) ORDER BY `pd2`.`priority` ASC, `pd2`.`price` ASC LIMIT 1) AS `discount`";

		//Added a CASE if type=1 then its percentage
		$this->statement['special'] = "(SELECT  
		CASE 
			WHEN `ps`.`type` = 1 THEN (`p`.`price` - (`p`.`price` * `ps`.`price` / 100))
			WHEN `ps`.`type` = 0 THEN `ps`.`price`
			ELSE `p`.`price`
		END AS `special` FROM `" . DB_PREFIX . "product_special` `ps` 
		WHERE `ps`.`product_id` = `p`.`product_id` 
		AND `ps`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' 
		AND ((`ps`.`date_start` = '0000-00-00' OR `ps`.`date_start` < NOW()) 
		AND (`ps`.`date_end` = '0000-00-00' OR `ps`.`date_end` > NOW())) 
		ORDER BY `ps`.`priority` ASC, `ps`.`price` ASC LIMIT 1) AS `special`";

		$this->statement['reward'] = "(SELECT `pr`.`points` FROM `" . DB_PREFIX . "product_reward` `pr` WHERE `pr`.`product_id` = `p`.`product_id` AND `pr`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "') AS `reward`";
		$this->statement['review'] = "(SELECT COUNT(*) FROM `" . DB_PREFIX . "review` `r` WHERE `r`.`product_id` = `p`.`product_id` AND `r`.`status` = '1' GROUP BY `r`.`product_id`) AS `reviews`";
	}


	public function getSpecial($product_id)
	{
		$query = $this->db->query("
			SELECT *
			FROM `" . DB_PREFIX . "product_special`
			WHERE
				`product_id` = '" . (int) $product_id . "'
				AND `customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "'
				AND (
					(`date_start` = '0000-00-00' OR `date_start` < NOW())
					AND (`date_end` = '0000-00-00' OR `date_end` > NOW())
				)
			ORDER BY `priority` ASC
			LIMIT 1
		");

		return $query->row;
	}

	public function getMostViewed($by = 'week', $limit = 10): array
	{
		$currentDate = date('Y-m-d H:i:s');

		switch ($by) {
			case 'week':
				$dateCondition = "AND `pv`.`date` >= DATE_SUB('$currentDate', INTERVAL 1 WEEK)";
				break;
			case 'month':
				$dateCondition = "AND `pv`.`date` >= DATE_SUB('$currentDate', INTERVAL 1 MONTH)";
				break;
			case 'year':
				$dateCondition = "AND `pv`.`date` >= DATE_SUB('$currentDate', INTERVAL 1 YEAR)";
				break;

			default:
				$dateCondition = '';
		}

		$sql = "SELECT 
            COALESCE(pv.viewed, 0) AS viewed_count,
            p.*, 
            pd.name, 
            pd.description, 
            pd.tag, 
            p.image, 
            " . $this->statement['discount'] . ", " . $this->statement['special'] . "
        FROM 
            `" . DB_PREFIX . "product` p
        LEFT JOIN 
            `" . DB_PREFIX . "product_description` pd ON (p.product_id = pd.product_id AND pd.language_id = '" . (int) $this->config->get('config_language_id') . "')
        LEFT JOIN 
            `" . DB_PREFIX . "product_to_store` p2s ON (p2s.product_id = p.product_id AND p2s.store_id = '" . (int) $this->config->get('config_store_id') . "')
        LEFT JOIN 
            `" . DB_PREFIX . "product_viewed` pv ON (pv.product_id = p.product_id)
        WHERE 
            p.status = '1' 
            AND p.date_available <= NOW()
            $dateCondition
        ORDER BY 
            viewed_count DESC, pv.date DESC
        LIMIT " . (int) $limit;

		$product_data = $this->cache->get('latest_products.' . md5($sql));

		if (!$product_data) {
			$query = $this->db->query($sql);

			$product_data = $query->rows;

			$this->cache->set('latest_products.' . md5($sql), $product_data);
		}

		return $product_data;
	}








	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getProduct(int $product_id): array
	{
		// Update the viewed count in oc_product_viewed
		$this->db->query("
		INSERT INTO `" . DB_PREFIX . "product_viewed`
		SET
			`product_id` = '" . (int) $product_id . "',
			`viewed` = `viewed` + 1,
			`date` = NOW()
		ON DUPLICATE KEY UPDATE
			`viewed` = `viewed` + 1,
			`date` = NOW()
	");
		$query = $this->db->query("SELECT DISTINCT *, `pd`.`name`, `p`.`image`, " . $this->statement['discount'] . ", " . $this->statement['special'] . ", " . $this->statement['reward'] . ", " . $this->statement['review'] . " FROM `" . DB_PREFIX . "product_to_store` `p2s` LEFT JOIN `" . DB_PREFIX . "product` `p` ON (`p`.`product_id` = `p2s`.`product_id` AND `p`.`status` = '1' AND `p`.`date_available` <= NOW()) LEFT JOIN `" . DB_PREFIX . "product_description` `pd` ON (`p`.`product_id` = `pd`.`product_id`) WHERE `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "' AND `p2s`.`product_id` = '" . (int) $product_id . "' AND `pd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'");

		if ($query->num_rows) {
			$product_data = $query->row;

			$product_data['variant'] = (array) json_decode($query->row['variant'], true);
			$product_data['override'] = (array) json_decode($query->row['override'], true);
			$product_data['price'] = (float) ($query->row['discount'] ? $query->row['discount'] : $query->row['price']);
			$product_data['rating'] = (int) $query->row['rating'];
			$product_data['reviews'] = (int) $query->row['reviews'] ? $query->row['reviews'] : 0;

			return $product_data;
		} else {
			return [];
		}
	}


	/**
	 * @param array $data
	 *
	 * @return int
	 */
	public function getTotalProducts(array $data = []): int
	{
		unset($data['start']);
		unset($data['limit']);
		return count($this->getProducts($data));
	}


	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function getProducts(array $data = []): array
	{

		$sql = "
		SELECT *, `pd`.`name`, `p`.`image`, " .
			$this->statement['discount'] . ", " .
			$this->statement['special'] . ", " .
			$this->statement['reward'] . ", " .
			$this->statement['review'] . "
		FROM `" . DB_PREFIX . "product` `p`
		INNER JOIN `" . DB_PREFIX . "product_to_store` `p2s` ON (`p`.`product_id` = `p2s`.`product_id` AND `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "')
		LEFT JOIN `" . DB_PREFIX . "product_description` `pd` ON (`p`.`product_id` = `pd`.`product_id` AND `pd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "')
			AND `p`.`status` = '1' AND `p`.`date_available` <= NOW() ";

		// Category  filter

		if (!empty($data['filter_category_id'])) {

			$sql .= " INNER JOIN `" . DB_PREFIX . "product_to_category` `p2c` 
			ON (`p`.`product_id` = `p2c`.`product_id` AND `p2c`.`category_id` = " . (int) $data['filter_category_id'] . ")";

		}

		// Manufacturer filter
	 
		if (!empty($data['filter_manufacturer_id'])) {

			 if (is_array($data['filter_manufacturer_id'])) {
				$data['filter_manufacturer_id'] = implode(',',$data['filter_manufacturer_id']);
			 }
			 
			$sql .= " INNER JOIN `" . DB_PREFIX . "manufacturer` `m` ON (`p`.`manufacturer_id` = `m`.`manufacturer_id` AND `m`.`manufacturer_id` IN (" . $data['filter_manufacturer_id'] . "))";
		}
		


		// Availability filter

		if (!empty($data['filter_availability'])) {

			$sql .= " INNER JOIN `" . DB_PREFIX . "product` `pffa` ON (`pffa`.`product_id` = `p2s`.`product_id` AND `pffa`.`status` = '1' AND `pffa`.`stock_status_id` IN (" . implode(',', array_map('intval', $data['filter_availability'])) . ") AND `pffa`.`date_available` <= NOW())";
		}


		// Legacy filter

		if (!empty($data['filter_filter'])) {

			$sql .= $this->buildLegacyFilterSQL($data);

		}

		// Option filter

		if (!empty($data['filter_option'])) {

			$sql .= $this->buildOptionsFilterSQL($data);
		}

		// Attribute filter

		if (!empty($data['filter_attribute'])) {

			$sql .= $this->buildAttributesFilterSQL($data);
		}

		// Search and Tag filter

		if (!empty($data['filter_search']) || !empty($data['filter_tag'])) {

			$sql .= $this->buildSearchFilterSQL($data);
		}

		// Sorting

		$sort_data = [
			'pd.name',
			'p.model',
			'p.quantity',
			'p.price',
			'rating',
			'p.sort_order',
			'p.date_added'
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {

			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {

				$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";

			} elseif ($data['sort'] == 'p.price') {

				$sql .= " ORDER BY (CASE WHEN `special` IS NOT NULL THEN `special` WHEN `discount` IS NOT NULL THEN `discount` ELSE `p`.`price` END)";

			} else {

				$sql .= " ORDER BY " . $data['sort'];
			}

		} else {

			$sql .= " ORDER BY `p`.`sort_order`";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {

			$sql .= " DESC, LCASE(`pd`.`name`) DESC";

		} else {
			
			$sql .= " ASC, LCASE(`pd`.`name`) ASC";
		}

		//Pagenation

		if (isset($data['start']) || isset($data['limit'])) {

			if ($data['start'] < 0) {

				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {

				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$product_data = $this->cache->get('product.' . md5($sql));

		if (!$product_data) {

			$query = $this->db->query($sql);

			$product_data = $query->rows;

			$this->cache->set('product.' . md5($sql), $product_data);
		}

		return $product_data;
	}


	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getCategories(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_to_category` WHERE `product_id` = '" . (int) $product_id . "'");

		return $query->rows;
	}

	/**
	 * @param array $data
	 *
	 * @return string
	 */
	public function buildLegacyFilterSQL($data)
	{

		$sql = " INNER JOIN (
			SELECT `product_id` 
			FROM `" . DB_PREFIX . "product_filter`
			WHERE `filter_id` IN (" . $this->db->escape($data['filter_filter']) . ")
			GROUP BY `product_id`
		) `pf` ON (`pf`.`product_id` = `p`.`product_id`) ";

		return $sql;
	}

	/**
	 * @param array $data
	 *
	 * @return string
	 */
	public function buildSearchFilterSQL($data)
	{
	
		$sql = "";
		$sql .= " AND (";

		if (!empty($data['filter_search'])) {
			$implode = [];

			$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_search'])));

			foreach ($words as $word) {
				$implode[] = "`pd`.`name` LIKE '" . $this->db->escape('%' . $word . '%') . "'";
			}

			if ($implode) {
				$sql .= " (" . implode(" OR ", $implode) . ")";
			}

			if (!empty($data['filter_description'])) {
				$sql .= " OR `pd`.`description` LIKE '" . $this->db->escape('%' . (string) $data['filter_search'] . '%') . "'";
			}
		}

		if (!empty($data['filter_search']) && !empty($data['filter_tag'])) {
			$sql .= " OR ";
		}

		if (!empty($data['filter_tag'])) {
			$implode = [];

			$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

			foreach ($words as $word) {
				$implode[] = "`pd`.`tag` LIKE '" . $this->db->escape('%' . $word . '%') . "'";
			}

			if ($implode) {
				$sql .= " (" . implode(" OR ", $implode) . ")";
			}
		}

		if (!empty($data['filter_search'])) {
			$sql .= " OR LCASE(`p`.`model`) = '" . $this->db->escape(oc_strtolower($data['filter_search'])) . "'";
			$sql .= " OR LCASE(`p`.`sku`) = '" . $this->db->escape(oc_strtolower($data['filter_search'])) . "'";
			$sql .= " OR LCASE(`p`.`upc`) = '" . $this->db->escape(oc_strtolower($data['filter_search'])) . "'";
			$sql .= " OR LCASE(`p`.`ean`) = '" . $this->db->escape(oc_strtolower($data['filter_search'])) . "'";
			$sql .= " OR LCASE(`p`.`jan`) = '" . $this->db->escape(oc_strtolower($data['filter_search'])) . "'";
			$sql .= " OR LCASE(`p`.`isbn`) = '" . $this->db->escape(oc_strtolower($data['filter_search'])) . "'";
			$sql .= " OR LCASE(`p`.`mpn`) = '" . $this->db->escape(oc_strtolower($data['filter_search'])) . "'";
		}

		$sql .= ")";
		return $sql;
	}
 
	/**
	 * @param array $data
	 *
	 * @return string
	 */
	public function buildOptionsFilterSQL($data)
	{
		$sql = "";
		$query = $this->db->query("
		SELECT group_id, option_n
		FROM `" . DB_PREFIX . "options`
		WHERE `option_id` IN (" . implode(',', array_map('intval', $data['filter_option'])) . ")
	");
		$groupOptionPairs = $query->rows;
		$groupIds = array_column($groupOptionPairs, 'group_id');
		$optionNs = array_column($groupOptionPairs, 'option_n');
		if (!empty($groupIds) && !empty($optionNs)) {
			$conditions = [];
			foreach ($groupOptionPairs as $pair) {
				$conditions[] = "(`group_id` = " . (int) $pair['group_id'] . " AND `option_n` = " . (int) $pair['option_n'] . ")";
			}
			$secondQuery = $this->db->query("
			SELECT DISTINCT *
			FROM `" . DB_PREFIX . "options`
			WHERE " . implode(' OR ', $conditions)
			);

			$optionIds = array_column($secondQuery->rows, 'option_id');
			$sql .= " INNER JOIN (
			SELECT DISTINCT po.product_id 
			FROM `" . DB_PREFIX . "product_options` po
			WHERE po.`option_id` IN (" . implode(',', array_map('intval', $optionIds)) . ")
		) AS subquery_alias ON (`subquery_alias`.`product_id` = `p`.`product_id`) ";
		}
		return $sql;
	}



	/**
	 * @param array $data
	 *
	 * @return string
	 */
	public function buildAttributesFilterSQL($data)
{
    $sql = "";
    $attributeSets = [];

    // Extract attribute values and organize them in $attributeSets
    foreach ($data['filter_attribute'] as $index => $values) {
        $id = array_keys($values);
        $pos = $id[0];
        $id = array_keys($values[$pos]);

        $escapedValue = $this->db->escape(strval($values[$pos][$id[0]]));

        // Organize values based on position
        if ($pos == 1) {
            $attributeSets[$id[0]]['text'][] = "'{$escapedValue}'";
        }
        if ($pos == 2) {
            $attributeSets[$id[0]]['value_text'][] = "'{$escapedValue}'";
        }
    }

    // Build SQL query based on organized attribute values
    foreach ($attributeSets as $id => $value) {
        $sql .= " INNER JOIN (
            SELECT 
                `product_id`, 
                GROUP_CONCAT(`text`, `value_text` SEPARATOR ',') AS `attribute_values`
            FROM `" . DB_PREFIX . "product_attribute`
            WHERE `attribute_id` = '" . $id . "' ";
 
        if (!empty($value['text'])) {
            $sql .= " AND   `text` IN (" . implode(',', $value['text']) . ")";
        }
 
        if (!empty($value['value_text'])) {
            $sql .= " AND   `value_text` IN (" . implode(',', $value['value_text']) . ")";
        }

        $sql .= "  GROUP BY `product_id`
        ) `pa{$id}` ON (`pa{$id}`.`product_id` = `p`.`product_id`) ";
    }

    return $sql;
}



	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getAttributes(int $product_id): array
	{

		$product_attribute_group_query = $this->db->query("
		SELECT
			*
		FROM `" . DB_PREFIX . "product_attribute` pa
		  JOIN `" . DB_PREFIX . "attribute` a ON (pa.attribute_id = a.attribute_id)
		  JOIN `" . DB_PREFIX . "attribute_description` ad ON (a.attribute_id = ad.attribute_id)
		WHERE pa.product_id = '" . (int) $product_id . "' AND ad.language_id = '" . (int) $this->config->get('config_language_id') . "'
		GROUP BY a.attribute_id, pa.text, pa.value_text
		ORDER BY pa.sort_order, ad.name 
	");
	
	$results = array();
	foreach ($product_attribute_group_query->rows as $row) {
 
		if (!empty($row['value_text']) && !empty($row['text'])) {
			$results[$row['attribute_id']]['name'] =  $row['name'];	 
		$results[$row['attribute_id']]['values'][] = ['name' => $row['text'], 'text_value' =>  $row['value_text'] ];
		} else {
			if (!empty($row['text'])) {
				$results['general']['values'][] = ['name' => $row['name'], 'text_value' =>  $row['text']  ];
			}
		}
	}
	
		return $results;

	}

	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getOptions(int $product_id): array
	{
		$product_option_data = [];



		//Retrieve options

		$product_option_query = $this->db->query("
		SELECT 
     			   po.*, 
     			   o.*, 
     			   o3.name AS group_name, 
     			   og.type AS group_type,
     			   o2.name AS o2_name,
     			   o2.*  -- Include other columns from o2 as needed
 	    FROM 
		 	    	`" . DB_PREFIX . "product_options` po
	    LEFT JOIN 
    			    `" . DB_PREFIX . "options` o ON po.option_id = o.option_id
	    LEFT JOIN 
    			    `" . DB_PREFIX . "options` og ON o.group_id = og.option_id
  	    LEFT JOIN 
			        `" . DB_PREFIX . "options` o2 ON 
    		        o2.option_n = o.option_n
        AND 		o2.group_id = o.group_id
        AND		    o2.language_id = '" . (int) $this->config->get('config_language_id') . "'
  	  
		LEFT JOIN 
        			`" . DB_PREFIX . "options` o3 ON 
          			  o3.option_n = '-1'
    			      AND o3.group_id = o.group_id AND o3.language_id = '" . (int) $this->config->get('config_language_id') . "'
  	  
		WHERE          po.product_id = '" . (int) $product_id . "'
        ORDER BY       po.sort_order");


		foreach ($product_option_query->rows as $product_option) {

			if (
				$product_option['group_type'] == 'radio' || $product_option['group_type'] == 'checkbox' && isset($product_option['value'])
				&& $product_option['value'] != ""
			) {
				$product_option['image'] = $product_option['value'];

			}


			$product_option_value_data[$product_option['group_id']][] = [
				'product_option_value_id' => $product_option['poption_id'],
				'option_value_id' => $product_option['poption_id'],
				'name' => $product_option['o2_name'],
				'image' => isset($product_option['image']) ? $product_option['image'] : "",
				'quantity' => $product_option['quantity'],
				'subtract' => $product_option['subtract'],
				'price' => $product_option['price'],
				'price_prefix' => $product_option['price_prefix'],
				'weight' => $product_option['weight'],
				'weight_prefix' => $product_option['weight_prefix']
			];


			$product_option_data[$product_option['group_id']] = [
				'product_option_id' => $product_option['poption_id'],
				'product_option_value' => $product_option_value_data[$product_option['group_id']],
				'option_id' => $product_option['option_id'],
				'name' => $product_option['group_name'],
				'type' => $product_option['group_type'],
				'value' => $product_option['value'],
				'required' => $product_option['required']
			];
		}
		return $product_option_data;
	}

	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getDiscounts(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_discount` WHERE `product_id` = '" . (int) $product_id . "' AND `customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND `quantity` > 1 AND ((`date_start` = '0000-00-00' OR `date_start` < NOW()) AND (`date_end` = '0000-00-00' OR `date_end` > NOW())) ORDER BY `quantity` ASC, `priority` ASC, `price` ASC");

		return $query->rows;
	}

	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getImages(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_image` WHERE `product_id` = '" . (int) $product_id . "' ORDER BY `sort_order` ASC");

		return $query->rows;
	}

	/**
	 * @param int $product_id
	 * @param int $subscription_plan_id
	 *
	 * @return array
	 */
	public function getSubscription(int $product_id, int $subscription_plan_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_subscription` `ps` LEFT JOIN `" . DB_PREFIX . "subscription_plan` `sp` ON (`ps`.`subscription_plan_id` = `sp`.`subscription_plan_id`) WHERE `ps`.`product_id` = '" . (int) $product_id . "' AND `ps`.`subscription_plan_id` = '" . (int) $subscription_plan_id . "' AND `ps`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND `sp`.`status` = '1'");

		return $query->row;
	}

	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getSubscriptions(int $product_id): array
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_subscription` `ps` LEFT JOIN `" . DB_PREFIX . "subscription_plan` `sp` ON (`ps`.`subscription_plan_id` = `sp`.`subscription_plan_id`) LEFT JOIN `" . DB_PREFIX . "subscription_plan_description` `spd` ON (`sp`.`subscription_plan_id` = `spd`.`subscription_plan_id`) WHERE `ps`.`product_id` = '" . (int) $product_id . "' AND `ps`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND `spd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "' AND `sp`.`status` = '1' ORDER BY `sp`.`sort_order` ASC");

		return $query->rows;
	}

	/**
	 * @param int $product_id
	 *
	 * @return int
	 */
	public function getLayoutId(int $product_id): int
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_to_layout` WHERE `product_id` = '" . (int) $product_id . "' AND `store_id` = '" . (int) $this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return (int) $query->row['layout_id'];
		} else {
			return 0;
		}
	}

	/**
	 * @param int $product_id
	 *
	 * @return array
	 */
	public function getRelated(int $product_id): array
	{
		$sql = "SELECT DISTINCT *, `pd`.`name` AS `name`, `p`.`image`, " . $this->statement['discount'] . ", " . $this->statement['special'] . ", " . $this->statement['reward'] . ", " . $this->statement['review'] . " FROM `" . DB_PREFIX . "product_related` `pr` LEFT JOIN `" . DB_PREFIX . "product_to_store` `p2s` ON (`p2s`.`product_id` = `pr`.`product_id` AND `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "') LEFT JOIN `" . DB_PREFIX . "product` `p` ON (`p`.`product_id` = `pr`.`related_id` AND `p`.`status` = '1' AND `p`.`date_available` <= NOW()) LEFT JOIN `" . DB_PREFIX . "product_description` `pd` ON (`p`.`product_id` = `pd`.`product_id`) WHERE `pr`.`product_id` = '" . (int) $product_id . "' AND `pd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'";

		$product_data = $this->cache->get('product.' . md5($sql));

		if (!$product_data) {
			$query = $this->db->query($sql);

			$product_data = $query->rows;

			$this->cache->set('product.' . md5($sql), $product_data);
		}

		return (array) $product_data;
	}

 
 
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function getSpecials(array $data = []): array
	{
		$sql = "SELECT DISTINCT *, `pd`.`name`, `p`.`image`, `p`.`price`, " . $this->statement['discount'] . ", " . $this->statement['special'] . ", " . $this->statement['reward'] . ", " . $this->statement['review'] . " FROM `" . DB_PREFIX . "product_special` `ps2` LEFT JOIN `" . DB_PREFIX . "product_to_store` `p2s` ON (`ps2`.`product_id` = `p2s`.`product_id` AND `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "' AND `ps2`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND ((`ps2`.`date_start` = '0000-00-00' OR `ps2`.`date_start` < NOW()) AND (`ps2`.`date_end` = '0000-00-00' OR `ps2`.`date_end` > NOW()))) LEFT JOIN `" . DB_PREFIX . "product` `p` ON (`p`.`product_id` = `p2s`.`product_id` AND `p`.`status` = '1' AND `p`.`date_available` <= NOW()) LEFT JOIN `" . DB_PREFIX . "product_description` `pd` ON (`pd`.`product_id` = `p`.`product_id`) WHERE `pd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "' GROUP BY `ps2`.`product_id`";

		$sort_data = [
			'pd.name',
			'p.model',
			'p.price',
			'rating',
			'p.sort_order'
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
			} elseif ($data['sort'] == 'p.price') {
				$sql .= " ORDER BY (CASE WHEN `special` IS NOT NULL THEN `special` WHEN `discount` IS NOT NULL THEN `discount` ELSE `p`.`price` END)";
			} else {
				$sql .= " ORDER BY " . $data['sort'];
			}
		} else {
			$sql .= " ORDER BY `p`.`sort_order`";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC, LCASE(`pd`.`name`) DESC";
		} else {
			$sql .= " ASC, LCASE(`pd`.`name`) ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$product_data = $this->cache->get('product.' . md5($sql));

		if (!$product_data) {
			$query = $this->db->query($sql);

			$product_data = $query->rows;

			$this->cache->set('product.' . md5($sql), $product_data);
		}

		return (array) $product_data;
	}

	/**
	 * @return int
	 */
	public function getTotalSpecials(): int
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT `ps`.`product_id`) AS `total` FROM `" . DB_PREFIX . "product_special` `ps` LEFT JOIN `" . DB_PREFIX . "product_to_store` `p2s` ON (`p2s`.`product_id` = `ps`.`product_id` AND `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "' AND `ps`.`customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND ((`ps`.`date_start` = '0000-00-00' OR `ps`.`date_start` < NOW()) AND (`ps`.`date_end` = '0000-00-00' OR `ps`.`date_end` > NOW()))) LEFT JOIN `" . DB_PREFIX . "product` `p` ON (`p2s`.`product_id` = `p`.`product_id` AND `p`.`status` = '1' AND `p`.`date_available` <= NOW())");

		if (isset($query->row['total'])) {
			return (int) $query->row['total'];
		} else {
			return 0;
		}
	}

	/**
	 * @param int    $product_id
	 * @param string $ip
	 * @param string $country
	 *
	 * @return void
	 */
	public function addReport(int $product_id, string $ip, string $country = ''): void
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "product_report` SET `product_id` = '" . (int) $product_id . "', `store_id` = '" . (int) $this->config->get('config_store_id') . "', `ip` = '" . $this->db->escape($ip) . "', `country` = '" . $this->db->escape($country) . "', `date_added` = NOW()");
	}

	/**
	 * @param int    $product_id
	 *
	 * @return array
	 */
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
			if ($row['var_opt_id'] !== null) {
				$variations[$variationId]['options'][] = [
					'var_opt_id' => $row['var_opt_id'],
					'p_opt_value_id' => $row['p_opt_value_id'],
				];
			}
		}

		return $variations;
	}

}
