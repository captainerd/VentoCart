<?php
namespace Ventocart\Admin\Controller\Marketing;
/**
 * Class GiftCards
 *
 * @package Ventocart\Admin\Controller\Marketing
 */
class GiftCards extends \Ventocart\System\Engine\Controller
{
    public function index(): void
    {
        $this->load->language("marketing/giftcards");
        $this->load->model('marketing/giftcards');
        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];


        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('marketing/giftcards', 'user_token=' . $this->session->data['user_token'])
        ];
        $this->load->model('localisation/language');
        $data['languages'] = $this->model_localisation_language->getLanguages();

        $data['user_token'] = $this->session->data['user_token'];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $data['giftcard_terms'] = $this->config->get('giftcard_terms') ?: 0;
        $this->load->model('catalog/information');

        // Get all information articles (terms of use, privacy policies, etc.)
        $articles = $this->model_catalog_information->getInformations();

        $data['total_giftcards'] = $this->model_marketing_giftcards->getTotalCustomerGiftCards();

        $data['total_purchased_giftcards'] = $this->model_marketing_giftcards->getTotalPurchasedGiftCards();
        if (!isset($this->session->data['currency'])) {
            $this->load->model('setting/setting');

            // Retrieve the default currency from the configuration
            $this->session->data['currency'] = $this->config->get('config_currency');
        }
        $data['total_giftcard_balances'] = $this->currency->format($this->model_marketing_giftcards->getTotalGiftCardBalances(), $this->session->data['currency']);

        // Prepare data to pass to the view
        $data['articles'] = $articles;





        $this->response->setOutput($this->load->view('marketing/giftcards', $data));


    }

    public function save(): void
    {
        $this->load->model('localisation/language');
        $this->load->language('marketing/giftcards');

        if (!$this->user->hasPermission('modify', 'marketing/giftcards')) {
            $json['error']['warning'] = $this->language->get('error_permission');
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
            return;
        }


        $languages = $this->model_localisation_language->getLanguages();
        $json = [];


        if (isset($this->request->post['expires']) && (!is_numeric($this->request->post['expires']) || (int) $this->request->post['expires'] <= 0)) {
            $json['error'] = $this->language->get('error_invalid_expires');
        }


        // Validate gift card names for each language
        foreach ($languages as $language) {
            $gift_card_name = isset($this->request->post['gift_card_name'][$language['language_id']]) ? $this->request->post['gift_card_name'][$language['language_id']] : '';
            if (empty($gift_card_name)) {
                $json['error'] = $this->language->get('error_empty_name');
                break; // Stop on the first error
            }
        }

        // Validate card type 
        $amount = isset($this->request->post['amount']) ? $this->request->post['amount'] : '';

        $this->request->post['physical'] = isset($this->request->post['physical']) && $this->request->post['physical'] === 'true' ? true : false;

        $card_type = isset($this->request->post['card_type']) ? (int) $this->request->post['card_type'] : '';

        if (($card_type != 0 && $card_type != 1)) {
            $json['error'] = $this->language->get('error_empty_card_type');
        }
        if (!empty($amount)) {
            // Loop through the amounts and validate each one
            foreach ($amount as $key => $price) {
                // Check if the amount is a valid number and greater than zero
                if ($card_type == 1 && (!is_numeric($price) || (float) $price <= 0)) {
                    $json['error'] = $this->language->get('error_invalid_price');
                    break; // Stop on the first invalid price
                }
            }

            // Additional validation for fixed amount
            if (empty($amount[1]) && $card_type == 1) {
                $json['error'] = $this->language->get('error_fixed_amount');
            }
        }
        if ($card_type == 0) {
            $this->request->post['amount'] = '';

        }
        // Validate gift card image
        $gift_card_image = isset($this->request->post['giftcardimage']) ? $this->request->post['giftcardimage'] : '';
        if (empty($gift_card_image)) {
            $json['error'] = $this->language->get('error_empty_image');
        }

        // If no errors, return success response
        if (empty($json)) {
            $this->load->model('marketing/giftcards');

            $this->model_marketing_giftcards->updateGiftCard($this->request->post);

            $this->response->setOutput(json_encode([
                'success' => $this->language->get('text_success')
            ]));
        } else {
            $this->response->setOutput(json_encode($json));
        }
    }

    public function list(): void
    {
        $this->load->language('marketing/giftcards');
        $this->load->model('marketing/giftcards');

        $page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 0;
        $limit = 10;
        $start = ($page - 1) * $limit;

        $filter = [
            'start' => $start,
            'limit' => $limit,
            'search' => $this->request->get['search'] ?? ''
        ];

        $giftCards = $this->model_marketing_giftcards->getGiftCards($filter);

        $totalGiftCards = $this->model_marketing_giftcards->getTotalGiftCards($filter);

        $json = [
            'success' => true,
            'data' => $giftCards,
            'language_id' => $this->config->get('config_language_id'),
            'pagination' => [
                'total' => $totalGiftCards,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => ceil($totalGiftCards / $limit)
            ]
        ];
        // Calculate total pages

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
    public function delete()
    {
        $this->load->language('marketing/giftcards'); // Load the language file

        if (!$this->user->hasPermission('modify', 'marketing/giftcards')) {
            $json['error']['warning'] = $this->language->get('error_permission');
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
            return;
        }

        $this->load->model('marketing/giftcards');  // Load the Giftcards model

        // Check if giftcard_id is provided
        if (isset($this->request->get['giftcard_id']) && !empty($this->request->get['giftcard_id'])) {
            $giftcard_id = (int) $this->request->get['giftcard_id'];

            // Delete the gift card by its ID
            $this->model_marketing_giftcards->deleteGiftCard($giftcard_id);

            // Respond with a success message
            $json['success'] = $this->language->get('text_deleted');
        } else {
            // If no giftcard_id is passed, respond with an error
            $json['error'] = $this->language->get('error_no_id');
        }

        // Set the response type and output the response as JSON
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function saveTerms()
    {
        $this->load->language('marketing/giftcards');

        if (!$this->user->hasPermission('modify', 'marketing/giftcards')) {
            $json['error']['warning'] = $this->language->get('error_permission');
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
            return;
        }


        if (isset($this->request->post['giftcard_terms']) && $this->request->post['giftcard_terms'] != '') {
            $giftcard_terms = (int) $this->request->post['giftcard_terms'];

            // Save the selected term for the gift card in the settings
            $this->load->model('setting/setting');

            // Save the selected gift card term in the settings table
            $this->model_setting_setting->editSetting('giftcard_terms', array('giftcard_terms' => $giftcard_terms));

            // Respond with success message
            $json['success'] = $this->language->get('text_success_terms_saved');
        } else {
            // If no term is selected, respond with an error message
            $json['error'] = $this->language->get('error_no_terms');
        }

        // Set the response type and output the response as JSON
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }




    public function listCustomerCards(): void
    {
        // Load necessary resources
        $this->load->language('marketing/giftcards');
        $this->load->model('marketing/giftcards');

        // Pagination and filters
        $page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 1;
        $limit = 10;
        $start = ($page - 1) * $limit;

        $filter = [
            'start' => $start,
            'limit' => $limit,
            'search' => $this->request->get['search'] ?? ''
        ];

        // Get data from the model
        $giftCards = $this->model_marketing_giftcards->GetAccountCards($filter);
        $totalGiftCards = $this->model_marketing_giftcards->GetAccountCardsTotal($filter);

        // Process the gift cards for JSON response
        $giftCardsData = [];
        foreach ($giftCards as $card) {
            $giftCardsData[] = [
                'giftcard_id' => $card['giftcard_id'],
                'card_name' => $card['card_name'],
                'code' => $card['giftcard_code'],
                'balance' => number_format($card['balance'], 2),
                'amount' => number_format($card['amount'], 2),
                'date_added' => date('Y-m-d', strtotime($card['date_added'])),
                'customer_id' => $card['customer_id'],
                'theme_image' => HTTP_SERVER . 'image/' . $card['theme_image'],
                'status' => $card['status'] == 2 ? 'Active' : 'Inactive',
                'customer_name' => $card['firstname'] . ' ' . $card['lastname']
            ];
        }

        // Prepare JSON response
        $json = [
            'success' => true,
            'data' => $giftCardsData,
            'pagination' => [
                'total' => $totalGiftCards,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => ceil($totalGiftCards / $limit)
            ]
        ];

        // Send the response
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }



}