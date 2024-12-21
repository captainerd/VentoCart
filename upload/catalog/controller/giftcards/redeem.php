<?php
namespace Ventocart\Catalog\Controller\GiftCards;
/**
 * Class redeem
 *
 * @package Ventocart\Catalog\Controller\GiftCards
 */
class redeem extends \Ventocart\System\Engine\Controller
{

    public function index()
    {
        $data['customer_id'] = $this->customer->getId();
        $this->load->language('giftcards/giftcard');
        return $this->load->view('giftcards/redeem', $data);
    }
    public function redeem(): void
    {
        $this->load->language('giftcards/giftcard');

        $this->load->model('giftcards/giftcard');
        $json = [];

        // Validate if the user is logged in
        if (!$this->customer->isLogged()) {
            $json['error'] = $this->language->get('error_login_required');
        }

        // Validate code exists in POST
        $code = isset($this->request->post['code']) ? $this->request->post['code'] : false;
        $redeem = isset($this->request->post['redeem']) ? filter_var($this->request->post['redeem'], FILTER_VALIDATE_BOOLEAN) : false;



        if (!$code) {
            $json['error'] = $this->language->get('error_code_missing');
        }

        // Proceed with further validation if no errors yet
        if (empty($json)) {
            if (!$this->model_giftcards_giftcard->redeemable($code)) {
                $json['error'] = $this->language->get('error_invalid_card');
            } else {
                // Attempt to redeem the gift card
                if (!$redeem) {
                    $success = $this->model_giftcards_giftcard->getCustomerNewGiftCard($code);
                } else {
                    //final redeem
                    $success = $this->model_giftcards_giftcard->redeemCard($code, $this->customer->getId());
                    $success = $success ? $this->language->get('success_card_redeemed') : false;
                }

                if ($success) {
                    $json['success'] = $success;
                } else {
                    $json['error'] = $this->language->get('error_redeem_failed');
                }
            }
        }

        // Send the JSON response
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

}