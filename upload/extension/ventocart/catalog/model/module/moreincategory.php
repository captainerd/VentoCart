<?php
namespace Ventocart\Catalog\Model\Extension\VentoCart\Module;
/**
 * Class moreincategory
 *
 * @package Ventocart\Catalog\Model\Extension\VentoCart\Module
 */
class moreincategory extends \Ventocart\Catalog\Model\Catalog\Product
{
    /**
     * @param int $limit
     *
     * @return array
     */
    public function getmoreincategory(int $limit, $product_id): array
    {
        // Query to get the category_id for the given product_id
        $sql = "
            SELECT DISTINCT *, 
                   `pd`.`name`, 
                   `p`.`image`, 
                   " . $this->statement['discount'] . ", 
                   " . $this->statement['special'] . ", 
                   " . $this->statement['reward'] . ", 
                   " . $this->statement['review'] . " 
            FROM `" . DB_PREFIX . "product_to_category` `p2c`
            LEFT JOIN `" . DB_PREFIX . "product_to_store` `p2s` 
                ON `p2s`.`product_id` = `p2c`.`product_id` 
                AND `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "'
            LEFT JOIN `" . DB_PREFIX . "product` `p` 
                ON `p`.`product_id` = `p2s`.`product_id` 
                AND `p`.`status` = '1' 
                AND `p`.`date_available` <= NOW()
            LEFT JOIN `" . DB_PREFIX . "product_description` `pd` 
                ON `p`.`product_id` = `pd`.`product_id`
            WHERE `pd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'
              AND `p2c`.`category_id` IN (
                  SELECT `category_id` 
                  FROM `" . DB_PREFIX . "product_to_category` 
                  WHERE `product_id` = '" . (int) $product_id . "'
              )
              AND `p2c`.`product_id` != '" . (int) $product_id . "' 
            GROUP BY p2c.product_id ORDER BY `p`.`date_added` DESC 
            LIMIT 0," . (int) $limit;

        // Fetch the result from cache
        $product_data = $this->cache->get('product.' . md5($sql));

        if (!$product_data) {
            $query = $this->db->query($sql);
            $product_data = $query->rows;
            $this->cache->set('product.' . md5($sql), $product_data);
        }

        return (array) $product_data;
    }

}
