<?php
namespace Ventocart\Catalog\Controller\GiftCards;
/**
 * Class GiftCard
 *
 * @package Ventocart\Catalog\Controller\GiftCards
 */
class GiftCard extends \Ventocart\System\Engine\Controller
{
    public function index(): void
    {
        if (!$this->config->get('config_giftcard_status')) {
            return;
        }
        /*
                $this->load->bridge('Admin');
                $this->load->model('setting/event');
                $this->model_setting_event->deleteEventByCode('giftcard_email');
                $this->model_setting_event->addEvent([
                    'code' => 'giftcard_email',
                    'description' => 'Sends email notifications when a gift card is processed',
                    'trigger' => 'catalog/model/giftcards/giftcard/processGiftCard/after',
                    'action' => 'mail/giftcard',
                    'status' => true,
                    'sort_order' => 1
                ]);
                $this->load->bridge->kill();
        */



        $this->load->language('giftcards/giftcard');

        // It brings the redeem logic and box
        $data['redeem_container'] = $this->load->controller('giftcards/redeem');


        // Set the title of the page
        $this->document->setTitle($this->language->get('heading_title'));

        // Breadcrumbs
        $datab['breadcrumbs'] = [];
        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
        ];
        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => "#"
        ];

        $data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');


        // Get the store URL for the active store
        $this->load->model('setting/store');
        $store_info = $this->model_setting_store->getStore();
        if (empty($store_info['url'])) {

            $data['siteurl'] = $this->config->get('site_url');
        } else {
            $data['siteurl'] = $store_info['url'];
        }
        $data['siteurl'] = preg_replace('#^https?://#', '', $data['siteurl']); // Remove http:// or https://
        $data['siteurl'] = rtrim($data['siteurl'], '/');



        $this->response->setOutput($this->load->view('giftcards/giftcard', $data));

    }

    /**
     * Retrieve and display the list of gift cards with pagination
     *
     * @return void
     */
    public function getGiftCards(): void
    {
        // Load language


        // Get pagination parameters (page number and limit)
        $page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 1;
        $limit = 10; // Limit of records per page
        $start = ($page - 1) * $limit; // Calculate the starting point for pagination

        // Initialize filters
        $filters = [];



        if (isset($this->request->get['physical'])) {
            $filters['physical'] = (int) $this->request->get['physical'];
        }

        // Load the model

        $this->load->model('giftcards/giftcard');

        // Fetch the gift cards

        $giftcards = $this->model_giftcards_giftcard->getGiftCards($start, $limit, $filters);

        $total = $this->model_giftcards_giftcard->getTotalGiftCards($filters);

        // Prepare response data
        $data = [
            'giftcards' => $giftcards,
            'pagination' => [
                'total' => $total,
                'pages' => ceil($total / $limit),
                'current' => $page
            ]
        ];


        $this->response->setOutput(json_encode($data));

    }


    public function view(): void
    {
        $giftcard_id = isset($this->request->get['card']) ? (int) $this->request->get['card'] : false;
        $data['giftcardId'] = $giftcard_id;
        $this->load->language('giftcards/giftcard');
        if (!$giftcard_id) {
            // If the gift card is not found, send a 404 response
            $this->response->redirect($this->url->link('error/not_found'));
            return;
        }

        $this->load->model('giftcards/giftcard');
        $giftcard = $this->model_giftcards_giftcard->getGiftCard($giftcard_id);

        if (!$giftcard) {
            // If the gift card is not found, send a 404 response
            $this->response->redirect($this->url->link('error/not_found'));
            return;
        }

        $data['heading_title'] = "Gift Card - " . $giftcard['card_name'];
        $this->document->setTitle($data['heading_title']);

        // Breadcrumbs
        $datab['breadcrumbs'] = [];
        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
        ];
        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => "/?route=giftcards/giftcard"
        ];
        $data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');
        $this->load->model('catalog/information');


        if ($this->config->get('giftcard_terms') && $this->config->get('giftcard_terms') > -1) {
            $information_info = $this->model_catalog_information->getInformation((int) $this->config->get('giftcard_terms'));
            $data['agree_label'] = sprintf($this->language->get('entry_i_agree_terms'), $this->url->link('information/information.info', 'language=' . $this->config->get('config_language') . '&information_id=' . $this->config->get('config_account_id')), $information_info['title']);
        }


        // Get the store URL for the active store
        $this->load->model('setting/store');
        $store_info = $this->model_setting_store->getStore();
        if (empty($store_info['url'])) {

            $data['siteurl'] = HTTP_SERVER;
        } else {
            $data['siteurl'] = $store_info['url'];
        }
        $data['siteurl'] = preg_replace('#^https?://#', '', $data['siteurl']); // Remove http:// or https://
        $data['siteurl'] = rtrim($data['siteurl'], '/');

        // Load customer info if logged in
        if ($this->customer->isLogged()) {
            $data['sender_email'] = $this->customer->getEmail();
            $data['sender_name'] = $this->customer->getFirstName() . " " . $this->customer->getLastName();
        } else {
            $data['sender_email'] = false;
            $data['sender_name'] = false;
        }

        $data['card'] = $giftcard;


        $this->response->setOutput($this->load->view('giftcards/view', $data));
    }


    public function addtocart(): void
    {
        // Load necessary models and language files
        $this->load->language('giftcards/giftcard');
        $json = [];

        // Check if the terms agreement is required
        if ($this->config->get('giftcard_terms') && $this->config->get('giftcard_terms') > -1) {
            if (!isset($this->request->post['agree_terms'])) {
                $this->load->model('catalog/information');
                $information_info = $this->model_catalog_information->getInformation((int) $this->config->get('giftcard_terms'));

                $json['error'] = sprintf($this->language->get('error_must_agree'), $information_info['title']);

            }
        }

        // Proceed with the logic only if no errors found
        if (empty($json['error'])) {
            // Validate the card ID
            $card_id = $this->request->get['card'] ?? 0;
            $filters = ['giftcard_id' => $card_id];
            $this->load->model('giftcards/giftcard');
            $card = $this->model_giftcards_giftcard->getGiftCards(0, 1, $filters)[0];

            if (!$card) {
                $json['error'] = $this->language->get('error_card_not_found');
            }

            // Proceed with the logic only if no errors found
            if (empty($json['error'])) {
                // Retrieve and validate posted data
                $data = $this->request->post;

                // Check for required fields
                if (
                    empty($data['receiver_name']) || empty($data['receiver_email']) ||
                    empty($data['sender_name']) || empty($data['sender_email']) ||
                    (empty($data['amount']) && $card['fixed'] != 1)
                ) {
                    $json['error'] = $this->language->get('error_required_fields');
                }

                // Proceed only if no errors found
                if (empty($json['error'])) {
                    // Validate email formats
                    if (
                        !filter_var($data['receiver_email'], FILTER_VALIDATE_EMAIL) ||
                        !filter_var($data['sender_email'], FILTER_VALIDATE_EMAIL)
                    ) {
                        $json['error'] = $this->language->get('error_invalid_email');
                    }
                }

                // Proceed only if no errors found
                if (empty($json['error'])) {
                    // Amount validation (if not fixed)
                    $amount = 0;
                    if ($card['fixed'] != 1) {
                        $amount = (float) $data['amount'];
                        if ($amount <= 0) {
                            $json['error'] = $this->language->get('error_invalid_amount');
                        }
                    } else {
                        foreach ($card['amountcl'] as $realamount) {
                            if ($data['amount'] == $realamount) {
                                $amount = $realamount;
                            }
                        }
                    }

                    // Proceed only if no errors found
                    if (empty($json['error'])) {
                        // Prepare gift card data for database and cart
                        $gift_card_data = [
                            'giftcard_id' => $card_id,
                            'customer_id' => $this->customer->getId(),
                            'receiver_name' => $data['receiver_name'],
                            'receiver_email' => $data['receiver_email'],
                            'sender_name' => $data['sender_name'],
                            'sender_email' => $data['sender_email'],
                            'physical' => (isset($data['ship_physical']) ? 1 : 0),
                            'message' => $data['message'] ?? '',
                            'amount' => $amount,
                            'giftcard_code' => $this->model_giftcards_giftcard->generateGiftCardCode($data['sender_email'])
                        ];

                        // Add the gift card to the database
                        $gift_card_id = $this->model_giftcards_giftcard->addCustomerGiftCard($gift_card_data);

                        // Add the gift card to the cart (or any other processing)
                        $this->cart->add($gift_card_id, 1, [], 0, false, $amount, 2);

                        // Set success message
                        $this->session->data['success'] = $this->language->get('text_giftcard_added');
                        $json['success'] = $this->language->get('text_giftcard_added');
                    }
                }
            }
        }

        // Respond with JSON
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }


    //by card id
    public function getGiftCardImage()
    {
        // Check if a valid gift card ID is provided
        $giftcard_id = isset($this->request->get['card']) ? (int) $this->request->get['card'] : 0;

        if ($giftcard_id <= 0) {
            // If no valid gift card ID is provided, send a 404 response
            $this->response->redirect($this->url->link('error/not_found'));
            return;
        }

        $this->load->model('giftcards/giftcard');


        // Fetch gift card details
        $giftcard = $this->model_giftcards_giftcard->getGiftCard($giftcard_id);

        if (!$giftcard) {
            // If the gift card is not found, send a 404 response
            $this->response->redirect($this->url->link('error/not_found'));
            return;
        }
        // Check if the gift card has an image
        if (isset($giftcard['theme_image']) && !empty($giftcard['theme_image'])) {
            $image_path = DIR_IMAGE . $giftcard['theme_image'];

            if (file_exists($image_path)) {
                // Output the image content
                $this->response->addHeader('Content-Type: image/' . pathinfo($giftcard['theme_image'], PATHINFO_EXTENSION));
                $this->response->setOutput(file_get_contents($image_path));
            } else {
                // If the image file does not exist, return a default image or an error response
                $this->response->redirect($this->url->link('error/not_found'));
            }
        } else {
            // If no image is set for the gift card, return a default image or error response
            $this->response->redirect($this->url->link('error/not_found'));
        }
    }





}
