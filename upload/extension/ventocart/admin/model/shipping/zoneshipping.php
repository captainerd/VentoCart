<?php

namespace Opencart\Admin\Model\Extension\VentoCart\Shipping;


class ZoneShipping extends \Opencart\System\Engine\Model
{
    public function saveOrUpdateEntry($shippingEntryId, $name, $displayName, $volumetric, $countryId, $pricelist, $weightClassId, $postalCodes)
    {
        // Validate and sanitize postal codes
        $cleanPostalCodes = array_map(function($code) {
            // Remove non-alphanumeric characters 
            $code =  strtoupper( preg_replace('/[^a-zA-Z0-9]/', '', $code));
            return $code;
        }, array_map('trim', preg_split('/[\r\n,;]+/', $postalCodes)));
    
        // Save or update shipping entry
        if ($shippingEntryId > 0) {
            // Perform edit operation
            $this->db->query("
                UPDATE " . DB_PREFIX . "shipping_pzones 
                SET 
                    name = '" . $this->db->escape($name) . "', 
                    displayName = '" . $this->db->escape($displayName) . "', 
                    geo_zone_id = " . (int) $countryId . ", 
                    pricelist = '" . $this->db->escape($pricelist) . "', 
                    volumetric = " . (float) $volumetric . ", 
                    weight_class_id = " . (int) $weightClassId . "
                WHERE 
                    shipping_entry_id = " . (int) $shippingEntryId
            );
    
            $this->db->query("DELETE FROM " . DB_PREFIX . "shipping_pcodes WHERE shipping_entry_id = '" . (int) $shippingEntryId . "'");
    
            // Insert new postal codes
            foreach ($cleanPostalCodes as $postalCode) {
                   // Filter non AlphaNumberic
                   
                $this->db->query("INSERT INTO " . DB_PREFIX . "shipping_pcodes SET shipping_entry_id = '" . (int) $shippingEntryId . "', post_code = '" . $this->db->escape($postalCode) . "'");
            }
        } else {
            // Perform add operation
            $this->db->query("
                INSERT INTO " . DB_PREFIX . "shipping_pzones (name, displayName, pricelist, volumetric, geo_zone_id, weight_class_id) 
                VALUES 
                ('" . $this->db->escape($name) . "','" . $this->db->escape($displayName) . "', '" . $this->db->escape( $pricelist) . "', " . (float) $volumetric . ", " . (int) $countryId . ", " . (int) $weightClassId . ")"
            );
    
            $shippingEntryId = $this->db->getLastId();
    
            // Insert postal codes
            foreach ($cleanPostalCodes as $postalCode) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "shipping_pcodes (shipping_entry_id, post_code) VALUES ('" . (int) $shippingEntryId . "', '" . $this->db->escape($postalCode) . "')");
            }
        }
    
        return $shippingEntryId;
    }
    

    public function getAllShippingZones()
    {
        $query = $this->db->query("
            SELECT * FROM " . DB_PREFIX . "shipping_pzones");
    
        return $query->rows;
    }


    public function getZones($displayName)
    {
        $query = $this->db->query("
            SELECT * FROM " . DB_PREFIX . "shipping_pzones WHERE displayName = '" . $this->db->escape($displayName) . "'");
        
        return $query->rows;
    }
    

    public function getAllShippingZonesCompanies()
    {
      
        $query = $this->db->query("
            SELECT DISTINCT displayName FROM " . DB_PREFIX . "shipping_pzones");
 
        return $query->rows;
    }
    public function getPostalCodes($shipping_entry_id)
    {
        $query = $this->db->query("
            SELECT 
                spz.*,
                GROUP_CONCAT(spc.post_code SEPARATOR '\n') AS postal_codes
            FROM 
                " . DB_PREFIX . "shipping_pzones spz
            LEFT JOIN 
                " . DB_PREFIX . "shipping_pcodes spc 
            ON 
                spz.shipping_entry_id = spc.shipping_entry_id
            WHERE 
                spz.shipping_entry_id = '" . (int)$shipping_entry_id . "'
            GROUP BY 
                spz.shipping_entry_id
        ");
    
        return $query->row['postal_codes'];
    }

    public function deleteEntryById($shippingEntryId)
    {
        // Delete entry from shipping_pcodes table
        $this->db->query("
            DELETE FROM " . DB_PREFIX . "shipping_pcodes 
            WHERE shipping_entry_id = '" . (int)$shippingEntryId . "'
        ");
        
        // Delete entry from shipping_pzones table
        $this->db->query("
            DELETE FROM " . DB_PREFIX . "shipping_pzones 
            WHERE shipping_entry_id = '" . (int)$shippingEntryId . "'
        ");

        // Check if any rows were affected
        return $this->db->countAffected() > 0;
    }
    
}
?>
