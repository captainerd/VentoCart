<?php
namespace Ventocart\Catalog\Model\Extension\VentoCart\Module;
/**
 * Class boughtwith
 *
 * @package Ventocart\Catalog\Model\Extension\VentoCart\Module
 */
class BoughtWith extends \Ventocart\Catalog\Model\Catalog\Product
{
    /**
     * @param int $limit
     *
     * @return array
     */
    public function getboughtwith(int $limit, int $product_id): array
    {

        $sql = "SELECT DISTINCT p.*, pd.name, pd.description, p.image, " . $this->statement['discount'] . ", " . $this->statement['special'] . ", " . $this->statement['reward'] . ", " . $this->statement['review'] . "
   FROM `" . DB_PREFIX . "order_product` op
   LEFT JOIN `" . DB_PREFIX . "product` p ON op.product_id = p.product_id
   LEFT JOIN `" . DB_PREFIX . "product_description` pd ON p.product_id = pd.product_id
   WHERE op.order_id IN (
       SELECT DISTINCT order_id 
       FROM `" . DB_PREFIX . "order_product` 
       WHERE product_id = '" . (int) $product_id . "' 
   )
   AND op.product_id != '" . (int) $product_id . "' 
   AND p.status = 1 
   AND p.date_available <= NOW()
   AND pd.language_id = '" . (int) $this->config->get('config_language_id') . "'
   AND p.product_id != '" . (int) $product_id . "' 
    ORDER BY RAND() 
   LIMIT " . (int) $limit;

        $product_data = $this->cache->get('product_bought_with.' . md5($sql));

        if (!$product_data) {
            $query = $this->db->query($sql);
            $product_data = $query->rows;
            $this->cache->set('product_bought_with.' . md5($sql), $product_data);
        }

        return (array) $product_data;
    }
}
