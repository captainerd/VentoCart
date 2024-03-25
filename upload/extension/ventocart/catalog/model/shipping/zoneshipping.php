<?php
namespace Opencart\Catalog\Model\Extension\VentoCart\Shipping;

use Opencart\System\Library\Cart\Weight;
use Opencart\System\Library\Cart\Length;

/**
 * Class ZoneShipping
 *
 * @package Opencart\Catalog\Model\Extension\VentoCart\Shipping
 */
class ZoneShipping extends \Opencart\System\Engine\Model
{
    /**
     * @param array $address
     *
     * @return array
     */




    function getQuote(array $address): array
    {
        $this->load->language('extension/ventocart/shipping/zoneshipping');

        $query = $this->getZoneValues($address);

       
       
        if (!$this->config->get('shipping_zoneshipping_status')) {
            $status = true;
        } elseif (!empty ($query)) {
            $status = true;
        } else {
            $status = false;
        }

        $method_data = [];

        if ($status) {
            $quote_data = [];

            foreach ($query as $entry) {


                $quote_data[$entry['shipping_entry_id']] = [
                    'code' => 'zoneshipping.' . $entry['shipping_entry_id'],
                    'name' => $entry['name'],
                    'cost' => $entry['price'],
                    'tax_class_id' => 0,
                    'text' => $this->currency->format($entry['price'], $this->session->data['currency'])
                ];

            }

            $method_data = [
                'code' => 'zoneshipping',
                'name' => $this->language->get('heading_title'),
                'quote' => $quote_data,
                'sort_order' => $this->config->get('shipping_zoneshipping_sort_order'),
                'error' => false
            ];
        }

        return $method_data;
    }



    private function getZoneValues($address)
    {

          // Filter non AlphaNumberic
          $address['postcode'] =  strtoupper( preg_replace("/[^a-zA-Z0-9]/", "",  $address['postcode'] ));
          
        // Try with a postal code and zone
        $query = $this->db->query("
        SELECT  
            spz.*,
            CASE 
                WHEN spc.post_code = '" . $this->db->escape($address['postcode']) . "' THEN '1' 
                ELSE '0' 
            END AS foundpostal
        FROM `" . DB_PREFIX . "zone_to_geo_zone` zgz
        INNER JOIN `" . DB_PREFIX . "shipping_pzones` spz ON zgz.geo_zone_id = spz.geo_zone_id
        LEFT JOIN " . DB_PREFIX . "shipping_pcodes spc ON spz.shipping_entry_id = spc.shipping_entry_id
        WHERE zgz.`country_id` = '" . (int) $address['country_id'] . "' 
        AND (zgz.`zone_id` = '" . (int) $address['zone_id'] . "' OR zgz.`zone_id` = '0')
    
    ");

        // Zones not found, Try with 'rest zones' entry id: -1

        if ($query->num_rows == 0) {

            $query = $this->db->query("
            SELECT 
                spz.*,
                CASE 
                WHEN spc.post_code = '" . $this->db->escape($address['postcode']) . "' THEN '1' 
                ELSE '0' 
            END AS foundpostal
            FROM `" . DB_PREFIX . "shipping_pzones` spz 
            LEFT JOIN " . DB_PREFIX . "shipping_pcodes spc ON spz.shipping_entry_id = spc.shipping_entry_id
            WHERE spz.geo_zone_id = " . (int) -1 . "
         
        ");
        }

        $data = [];

        $products = $this->cart->getProducts();
 
        foreach ($query->rows as $row) {
            $weightedProducts = $this->weightProducts($products, $row);
          
            $pricelist = json_decode(htmlspecialchars_decode($row['pricelist']), true);

            if ($row['foundpostal'] == 1 && !empty( $data[$row['displayName']])) {
                unset($data[$row['displayName']]); // Unset to allow rewrite 
            }

            foreach ($pricelist as $price) {
         
                if ($weightedProducts <= $price['weight'] && empty( $data[$row['displayName']])) {

                    $data[$row['displayName']] = [
                        'shipping_entry_id' => $row['shipping_entry_id'],
                        'price' => (int)$row['foundpostal'] ? $price['price'] : $price['default_price'],
                        'name' => $row['displayName']
                    ];
                }
            }
        }
      
        return $data;
    }
 
    private function weightProducts($products, $row)
    {

        $weight = new Weight($this->registry);
        $lengthCl = new Length($this->registry);
     

        $totalWeight = 0;
        foreach ($products as $product) {
            if ($product['shipping']) {
                // Calculate Dimesional Weight 
                $length_class_id = 1;
                if ($row['weight_class_id'] == 1) {
                    //For Killograms use CM,
                    $length_class_id = 1;
                } elseif ($row['weight_class_id'] == 5) {
                    //For Pound use Inch
                    $length_class_id = 3;
                }
                $product['weight'] = $weight->convert($product['weight'], $product['weight_class_id'], $row['weight_class_id']);
              
                $width = $lengthCl->convert($product['width'], $product['length_class_id'], $length_class_id);
                $height = $lengthCl->convert($product['height'], $product['length_class_id'], $length_class_id);
                $length = $lengthCl->convert($product['length'], $product['length_class_id'], $length_class_id);
                $VolWeight = round($length * $width * $height / $row['volumetric']);

                // Volume exceeds weight
                if ($VolWeight > $product['weight']) {
                    $product['weight'] = $VolWeight;
                }

                $totalWeight += $product['weight'];
            }

        }
    
        return $totalWeight;

    }


}
