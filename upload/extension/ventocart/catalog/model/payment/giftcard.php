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
