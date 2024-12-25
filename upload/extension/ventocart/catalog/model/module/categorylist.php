<?php
namespace Ventocart\Catalog\Model\Extension\VentoCart\Module;
/**
 * Class Latest
 *
 * @package Ventocart\Catalog\Model\Extension\VentoCart\Module
 */
class CategoryList extends \Ventocart\Catalog\Model\Catalog\Product
{

    public function getCategoryImage($category_id)
    {

        $sql = $this->db->query("
            SELECT image, parent_id
            FROM " . DB_PREFIX . "category 
            WHERE category_id = '" . (int) $category_id . "'
        ");


        if ($sql->num_rows) {
            return $sql->row;
        } else {
            return [];
        }
    }
    public function getCategoryPath($category_id)
    {
        $sql = $this->db->query("
            SELECT path
            FROM " . DB_PREFIX . "category 
            WHERE category_id = '" . (int) $category_id . "'
        ");

        if ($sql->num_rows) {
            return $sql->row['path'];
        } else {
            return null;  // Return null if no result is found
        }
    }



}