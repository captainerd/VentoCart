<?php
namespace Ventocart\Catalog\Model\Extension\VentoCart\Module;
/**
 * Class Latest
 *
 * @package Ventocart\Catalog\Model\Extension\VentoCart\Module
 */
class Availabilityfilter extends \Ventocart\Catalog\Model\Catalog\Product
{
    /**
     * @param int $limit
     *
     * @return array
     */
    public function getStatuses($category_id): array
    {
        $sql = $this->db->query("
        SELECT 
            ss.stock_status_id, 
            ss.name, 
            (
                SELECT COUNT(*)
                FROM `" . DB_PREFIX . "product` p
                JOIN `" . DB_PREFIX . "product_to_category` ptc ON p.product_id = ptc.product_id
                WHERE 
                    p.stock_status_id = ss.stock_status_id 
                    AND p.status = '1'
                    AND ptc.category_id = '" . (int) $category_id . "'
            ) AS product_count 
        FROM 
            `" . DB_PREFIX . "stock_status` ss 
        WHERE 
            ss.language_id = '" . (int) $this->config->get('config_language_id') . "'
    ");
        return $sql->rows;
    }
}
