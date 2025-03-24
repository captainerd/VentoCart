<?php

namespace Ventocart\Admin\Model\Extension\VentoCart\Shipping;


class ZoneShipping extends \Ventocart\System\Engine\Model
{

    public function sku_to_product_id($sku)
    {
        $query = $this->db->query("
        SELECT product_id
        FROM `" . DB_PREFIX . "product`
        WHERE sku = '" . $this->db->escape($sku) . "'
        LIMIT 1
    ");

        if ($query->num_rows) {
            return (int) $query->row['product_id'];
        } else {
            return false;  // SKU not found
        }
    }

    private function parseSkuPriceList($skuPriceList)
    {
        // Split the SKU=Price pairs by commas, newlines, or semicolons
        $skuPricePairs = preg_split('/[\r\n,;]+/', $skuPriceList);

        $parsedData = [];
        foreach ($skuPricePairs as $pair) {
            // Split each pair by the equal sign
            list($sku, $price) = explode('=', $pair);

            // Clean and prepare the data
            $sku = trim($sku);
            $price = (float) trim($price);

            if (!empty($sku) && $price > 0) {
                $parsedData[$sku] = $price;
            }
        }

        return $parsedData;
    }


    public function saveOrUpdateEntry($shippingEntryId, $name, $displayName, $volumetric, $countryId, $pricelist, $weightClassId, $entry_sort_order, $postalCodes, $product_fixed)
    {







        // Validate and sanitize postal codes
        $cleanPostalCodes = array_map(function ($code) {
            // Remove non-alphanumeric characters 
            $code = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $code));
            return $code;
        }, array_map('trim', preg_split('/[\r\n,;]+/', $postalCodes)));

        // Save or update shipping entry
        if ($shippingEntryId > 0) {
            // Perform edit operation
            $this->db->query("
                UPDATE " . DB_PREFIX . "shipping_pzones 
                SET 
                    name = '" . $this->db->escape($name) . "', 
                    geo_zone_id = " . (int) $countryId . ", 
                    pricelist = '" . $this->db->escape($pricelist) . "', 
                    volumetric = " . (float) $volumetric . ", 
                    weight_class_id = " . (int) $weightClassId . ",
                    sort_order = " . (int) $entry_sort_order . "
                WHERE 
                    shipping_entry_id = " . (int) $shippingEntryId
            );

            // Delete existing display names
            $this->db->query("
                   DELETE FROM " . DB_PREFIX . "shipping_pnames 
                   WHERE shipping_entry_id = '" . (int) $shippingEntryId . "'
               ");

            // Insert new display names
            foreach ($displayName as $languageId => $displayNameValue) {
                $this->db->query("
                    INSERT INTO " . DB_PREFIX . "shipping_pnames (shipping_entry_id, language_id, displayName) 
                    VALUES 
                    ('" . (int) $shippingEntryId . "', '" . (int) $languageId . "', '" . $this->db->escape($displayNameValue) . "')
                ");
            }

            $this->db->query("DELETE FROM " . DB_PREFIX . "shipping_pcodes WHERE shipping_entry_id = '" . (int) $shippingEntryId . "'");

            // Insert new postal codes
            foreach ($cleanPostalCodes as $postalCode) {

                $this->db->query("INSERT INTO " . DB_PREFIX . "shipping_pcodes SET shipping_entry_id = '" . (int) $shippingEntryId . "', post_code = '" . $this->db->escape($postalCode) . "'");
            }
        } else {
            // Perform add operation
            $this->db->query("
                INSERT INTO " . DB_PREFIX . "shipping_pzones (name, pricelist, volumetric, geo_zone_id, weight_class_id, sort_order) 
                VALUES 
                ('" . $this->db->escape($name) . "', '" . $this->db->escape($pricelist) . "', " . (float) $volumetric . ", " . (int) $countryId . ", " . (int) $weightClassId . ", " . (int) $entry_sort_order . ")"
            );

            $shippingEntryId = $this->db->getLastId();

            // Insert display names
            foreach ($displayName as $languageId => $displayNameValue) {

                $this->db->query("
                        INSERT INTO " . DB_PREFIX . "shipping_pnames (shipping_entry_id, language_id, displayName) 
                        VALUES 
                        ('" . (int) $shippingEntryId . "', '" . (int) $languageId . "', '" . $this->db->escape($displayNameValue) . "')
                    ");

            }

            // Insert postal codes
            foreach ($cleanPostalCodes as $postalCode) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "shipping_pcodes (shipping_entry_id, post_code) VALUES ('" . (int) $shippingEntryId . "', '" . $this->db->escape($postalCode) . "')");
            }

        }


        // Now handle the product fixed prices (SKU=Price format)
        if (!empty($product_fixed)) {
            // Parse the SKU=Price list
            $skuPriceData = $this->parseSkuPriceList($product_fixed);

            // Loop through each SKU and price
            foreach ($skuPriceData as $sku => $price) {
                // Get the product_id for the SKU
                $product_id = $this->sku_to_product_id($sku);

                if ($product_id) {
                    // Check if the price already exists for this product_id and shipping_entry_id
                    $existingRecordQuery = $this->db->query("
                    SELECT COUNT(*) AS count
                    FROM `" . DB_PREFIX . "shipping_pfixed`
                    WHERE product_id = '" . (int) $product_id . "' 
                    AND shipping_entry_id = '" . (int) $shippingEntryId . "'
                ");

                    if ($existingRecordQuery->row['count'] > 0) {
                        // If record exists, update the price for this product
                        $this->db->query("
                        UPDATE `" . DB_PREFIX . "shipping_pfixed`
                        SET fixed_price = '" . (float) $price . "'
                        WHERE product_id = '" . (int) $product_id . "' 
                        AND shipping_entry_id = '" . (int) $shippingEntryId . "'
                    ");
                    } else {
                        // If record doesn't exist, insert a new record with the fixed price
                        $this->db->query("
                        INSERT INTO `" . DB_PREFIX . "shipping_pfixed`
                        (product_id, shipping_entry_id, fixed_price)
                        VALUES
                        ('" . (int) $product_id . "', '" . (int) $shippingEntryId . "', '" . (float) $price . "')
                    ");
                    }
                } else {
                    $this->session->data['no_sku_found'] = $sku . " <br>";
                }
            }
        }
        return $shippingEntryId;
    }
    public function saveProductFixed($pricelist, $product_id)
    {
        // Delete existing records for the product_id
        $this->db->query("DELETE FROM `" . DB_PREFIX . "shipping_pfixed` WHERE product_id = '" . (int) $product_id . "'");

        // Insert new fixed price entries
        foreach ($pricelist as $shipping_entry_id => $fixed_price) {
            $this->db->query("
                INSERT INTO `" . DB_PREFIX . "shipping_pfixed` 
                (`product_id`, `shipping_entry_id`, `fixed_price`) 
                VALUES 
                ('" . (int) $product_id . "', '" . (int) $shipping_entry_id . "', '" . (float) $fixed_price . "')
            ");
        }
    }
    public function getProductFixed($product_id)
    {
        $query = $this->db->query("
            SELECT 
                shipping_entry_id, 
                fixed_price 
            FROM 
                `" . DB_PREFIX . "shipping_pfixed` 
            WHERE 
                product_id = '" . (int) $product_id . "'
        ");

        $result = [];
        foreach ($query->rows as $row) {
            $result[$row['shipping_entry_id']] = (float) $row['fixed_price'];
        }

        return $result;
    }
    public function getProductFixedWithSku($shipping_entry_id)
    {
        $query = $this->db->query("
            SELECT 
                spf.shipping_entry_id,
                spf.fixed_price,
                p.sku
            FROM 
                `" . DB_PREFIX . "shipping_pfixed` spf
            LEFT JOIN 
                `" . DB_PREFIX . "product` p ON spf.product_id = p.product_id
            WHERE 
                spf.shipping_entry_id = '" . (int) $shipping_entry_id . "'
        ");

        $result = [];
        foreach ($query->rows as $row) {
            if (!empty($row['sku'])) {
                $result[] = $row['sku'] . '=' . (float) $row['fixed_price'];
            }
        }

        return implode("\n", $result);
    }


    public function getAllShippingZones()
    {
        $query = $this->db->query("
            SELECT 
                spz.*, 
                GROUP_CONCAT(CONCAT(spn.language_id, ':', spn.displayName) SEPARATOR '|') AS displayNames
            FROM 
                " . DB_PREFIX . "shipping_pzones spz
            LEFT JOIN 
                " . DB_PREFIX . "shipping_pnames spn ON spz.shipping_entry_id = spn.shipping_entry_id
            GROUP BY 
                spz.shipping_entry_id
        ");

        $shippingZones = array();

        foreach ($query->rows as $row) {
            $shippingZone = $row;
            $shippingZone['displayName'] = array();

            if ($row['displayNames']) {
                $displayNames = explode('|', $row['displayNames']);

                foreach ($displayNames as $displayName) {
                    list($languageId, $value) = explode(':', $displayName);
                    $shippingZone['displayName'][$languageId] = $value;
                }
            }

            unset($shippingZone['displayNames']);
            $shippingZones[] = $shippingZone;
        }

        return $shippingZones;
    }


    public function getZones($displayName)
    {
        // Get the current language ID
        $languageId = (int) $this->config->get('config_language_id');

        $query = $this->db->query("
        SELECT 
            spz.*, 
            GROUP_CONCAT(CONCAT(spn.language_id, ':', spn.displayName) SEPARATOR '|') AS displayNames
        FROM 
            " . DB_PREFIX . "shipping_pzones spz
        LEFT JOIN 
            " . DB_PREFIX . "shipping_pnames spn ON spz.shipping_entry_id = spn.shipping_entry_id 
        WHERE 
            spn.language_id = '" . $languageId . "' AND spn.displayName = '" . $displayName . "'
        GROUP BY 
            spz.shipping_entry_id
    ");


        $shippingZones = array();

        foreach ($query->rows as $row) {
            $shippingZone = $row;
            $shippingZone['displayName'] = array();

            if ($row['displayNames']) {
                $displayNames = explode('|', $row['displayNames']);

                foreach ($displayNames as $displayNameZ) {
                    list($languageId, $value) = explode(':', $displayNameZ);
                    $shippingZone['displayName'][$languageId] = $value;
                }
            }

            unset($shippingZone['displayNames']);
            $shippingZones[] = $shippingZone;
        }

        return $shippingZones;
    }

    public function getAllShippingZonesCompanies()
    {
        // Get the current language ID
        $languageId = (int) $this->config->get('config_language_id');

        $query = $this->db->query("
            SELECT DISTINCT spn.displayName 
            FROM " . DB_PREFIX . "shipping_pnames spn
            INNER JOIN " . DB_PREFIX . "shipping_pzones spz ON spn.shipping_entry_id = spz.shipping_entry_id
            WHERE spn.language_id = '" . $languageId . "'
        ");

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
                spz.shipping_entry_id = '" . (int) $shipping_entry_id . "'
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
            WHERE shipping_entry_id = '" . (int) $shippingEntryId . "'
        ");

        // Delete entry from shipping_pzones table
        $this->db->query("
            DELETE FROM " . DB_PREFIX . "shipping_pzones 
            WHERE shipping_entry_id = '" . (int) $shippingEntryId . "'
        ");

        // Delete entry from shipping_pzones table
        $this->db->query("
                DELETE FROM " . DB_PREFIX . "shipping_pnames 
                WHERE shipping_entry_id = '" . (int) $shippingEntryId . "'
          ");

        $this->db->query("
          DELETE FROM " . DB_PREFIX . "shipping_pfixed 
          WHERE shipping_entry_id = '" . (int) $shippingEntryId . "'
      ");
        // Check if any rows were affected
        return $this->db->countAffected() > 0;
    }

}
?>