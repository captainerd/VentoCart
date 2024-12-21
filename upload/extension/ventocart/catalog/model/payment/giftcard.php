<?php
namespace Ventocart\Catalog\Model\Extension\Ventocart\Payment;
/**
 * Class GiftCard
 *
 * @package Ventocart\Catalog\Model\Extension\Ventocart\Payment
 */
class GiftCard extends \Ventocart\System\Engine\Model
{
    /**
     * @param array $address
     *
     * @return array
     */
    public function getMethods(array $address = []): array
    {
        $this->load->language('extension/ventocart/payment/giftcard');
        $this->load->model('giftcards/giftcard');

        if (!$this->config->get('payment_giftcard_geo_zone_id')) {
            $status = true;
        } else {
            $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone_to_geo_zone` WHERE `geo_zone_id` = '" . (int) $this->config->get('payment_cod_geo_zone_id') . "' AND `country_id` = '" . (int) $address['country_id'] . "' AND (`zone_id` = '" . (int) $address['zone_id'] . "' OR `zone_id` = '0')");

            if ($query->num_rows) {
                $status = true;
            } else {
                $status = false;
            }
        }

        $method_data = [];
        $balance = $this->model_giftcards_giftcard->GetTotalBalance($this->customer->getId());
        if ($balance <= 0) {
            $status = false;
        }
        if ($status) {
            $option_data['giftcard'] = [
                'code' => 'giftcard.giftcard',
                'name' => $this->language->get('heading_title') . " (" . $this->language->get('text_balance') . ": " . $this->currency->format($balance, $this->session->data['currency']) . ")"
            ];

            $method_data = [
                'code' => 'giftcard',
                'name' => $this->language->get('heading_title'),
                'option' => $option_data,
                'sort_order' => $this->config->get('payment_giftcard_sort_order')
            ];
        }

        return $method_data;
    }
}
