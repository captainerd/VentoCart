<?php
namespace Ventocart\Catalog\Model\Localisation;
/**
 * Class OrderStatus
 *
 * @package Ventocart\Catalog\Model\Localisation
 */
class Package extends \Ventocart\System\Engine\Model
{

    public function getWeightClass(int $weight_class_id): array
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "weight_class` `wc` LEFT JOIN `" . DB_PREFIX .
            "weight_class_description` `wcd` ON (`wc`.`weight_class_id` = `wcd`.`weight_class_id`) WHERE `wc`.`weight_class_id` = '"
            . (int) $weight_class_id . "' AND `wcd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'");

        return $query->row;
    }

    public function getLengthClass(int $length_class_id): array
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "length_class` `lc` LEFT JOIN `" . DB_PREFIX . "length_class_description` `lcd` ON (`lc`.`length_class_id` = `lcd`.`length_class_id`) WHERE `lc`.`length_class_id` = '" . (int) $length_class_id . "' AND `lcd`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'");

        return $query->row;
    }



}