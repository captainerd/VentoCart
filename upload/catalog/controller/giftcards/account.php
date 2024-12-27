<?php
namespace Ventocart\Catalog\Controller\GiftCards;
/**
 * Class account
 *
 * @package Ventocart\Catalog\Controller\GiftCards
 */
class Account extends \Ventocart\System\Engine\Controller
{
    public function index(): void
    {
        $this->load->language('account/account');
        $this->load->language('giftcards/giftcard');



        // Breadcrumbs
        $datab['breadcrumbs'] = [];
        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
        ];
        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('text_account'),
            'href' => $this->url->link('account/account', 'language=' . $this->config->get('config_language'))
        ];

        $datab['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => "#"
        ];

        $this->load->model('giftcards/giftcard');
        // Fetch the total balance

        $data['total'] = $this->currency->format($this->model_giftcards_giftcard->GetTotalBalance($this->customer->getId()), $this->session->data['currency']);

        // It brings the redeem logic and box
        $data['redeem_container'] = $this->load->controller('giftcards/redeem');

        $data['breadcrumb'] = $this->load->view('common/breadcrumb', $datab);
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');
        $data['continue'] = $this->url->link('account/account');



        $this->response->setOutput($this->load->view('giftcards/account', $data));

    }
    public function getMyCards()
    {

        $this->load->model('giftcards/giftcard');

        $items_per_page = 10;

        // Fetch the gift cards with filters
        $filter = [
            'status' => 2,
            'balance' => 0,
            'limit' => $items_per_page,
            'start' => ($this->request->get['page'] - 1) * $items_per_page
        ];

        $giftcards = $this->model_giftcards_giftcard->GetAccountCards($this->customer->getId(), $filter);

        $Totalgiftcards = $this->model_giftcards_giftcard->GetAccountCardsTotal($this->customer->getId(), $filter);

        // Prepare giftcards data
        $giftcards_data = [];
        foreach ($giftcards as $giftcard) {


            $expires = strtotime($giftcard['expires']);
            $current_date = time();
            $status = ($expires > $current_date) ? true : false;

            $giftcards_data[] = [
                'card_name' => $giftcard['card_name'],
                'balance' => $this->currency->format($giftcard['balance'], $this->session->data['currency']),
                'date_added' => date('Y-m-d', strtotime($giftcard['date_added'])),
                'sender_email' => $giftcard['sender_email'],
                'theme_image' => $giftcard['theme_image'],
                'expires' => $giftcard['expires'],
                'amount' => $this->currency->format($giftcard['amount'], $this->session->data['currency']),
                'status' => $status
            ];
        }

        // Prepare pagination
        $pagination = [
            'pages' => ($Totalgiftcards / $items_per_page),
            'current' => (int) $this->request->get['page']
        ];

        // Return JSON response
        $this->response->setOutput(json_encode([
            'total' => $Totalgiftcards,
            'giftcards' => $giftcards_data,
            'pagination' => $pagination
        ]));
    }

}