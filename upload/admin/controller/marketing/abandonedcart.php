<?php
namespace Ventocart\Admin\Controller\Marketing;
/**
 * Class AbandonedCart
 *
 * @package Ventocart\Admin\Controller\Marketing
 */
class AbandonedCart extends \Ventocart\System\Engine\Controller
{
    /**
     * @return void
     */
    public function index(): void
    {


        $this->load->language("marketing/abandonedcart");
        $this->load->model('setting/setting');

        // insert chart js
        $this->document->addScript('https://cdn.jsdelivr.net/npm/chart.js');
        // insert tinymce
        $this->document->addScript('view/javascript/tinymce/tinymce.min.js');


        // Retrieve all settings with the prefix 'your_extension_name'
        $data = $this->model_setting_setting->getSetting('abandonedcart');

        $this->load->model('marketing/abandonedcart');




        // Total guest and customer that are subscribed and older than thershold

        $data['totalcarts'] = $this->model_marketing_abandonedcart->getTotalCarts();

        // Total customer cards (registered accounts) that are subscribed and older than thershold
        $data['totalaccountcarts'] = $this->model_marketing_abandonedcart->getTotalCustomers();

        // Total guest carts that are abandoned and subscribed
        $data['totalguestcarts'] = $this->model_marketing_abandonedcart->getTotalGuests();

        // All carts, regadless if they are abandoned (older than threshold) and regadless if they are subscribed to newsletters
        $data['allcarts'] = $this->model_marketing_abandonedcart->getTotalGeneral();


        // Total carts that are abandoned, including subscribed or not

        $data['totalcartsabandoned'] = $this->model_marketing_abandonedcart->getTotalGeneralAbandoned();

        // Chart use, carts per day for the last 30 days 
        $data['cartsPerDay'] = $this->model_marketing_abandonedcart->getCartsPerDayLast30Days();

        // Chart use, abandoned and subscripted to newsletter, carts
        $data['cartsAbandonedSubbedPerDay'] = $this->model_marketing_abandonedcart->getAbandonedNewsLetterCartsPerDayLast30Days();

        // Chart use, all carts with more than 1 product in them.
        $data['cartsWithMorethan1Product'] = $this->model_marketing_abandonedcart->getCartsPerDayLast30DaysMoreThan1Products();

        // Chart use, clicks on dates recovered from abandoned email campeings 
        $data['clicksonemail'] = $this->model_marketing_abandonedcart->getClicksReturns30Days();
        $this->load->model('localisation/language'); // it is already loaded
        $data['languages'] = $this->model_localisation_language->getLanguages();

        // Date labels for Chart Js
        $labels = [];
        for ($i = 30; $i >= 0; $i--) {
            $date = date('m/d', strtotime("-$i days"));
            $labels[] = $date;
        }
        $data['chartLabels'] = $labels;



        if (!isset($data['abandonedcart_abandoned_threshold'])) {
            $data['abandonedcart_abandoned_threshold'] = 3;
        }
        if (!isset($data['abandonedcart_repeat_frequency'])) {
            $data['abandonedcart_repeat_frequency'] = 6;
        }
        if (!isset($data['abandonedcart_total_notifications'])) {
            $data['abandonedcart_total_notifications'] = 3;
        }
        if (!isset($data['abandonedcart_cart_memory'])) {
            $data['abandonedcart_cart_memory'] = 4;
        }
        $this->load->language("marketing/abandonedcart");
        $this->load->model('marketing/abandonedcart');

        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];


        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('marketing/abandonedcart', 'user_token=' . $this->session->data['user_token'])
        ];


        $data['user_token'] = $this->session->data['user_token'];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');




        $this->response->setOutput($this->load->view('marketing/abandonedcart', $data));
    }

    public function save(): void
    {
        $json = [];
        $this->load->language("marketing/abandonedcart");

        if (!$this->user->hasPermission('modify', 'marketing/abandonedcart')) {
            $json['error']['warning'] = $this->language->get('error_permission');
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
            return;
        }

        // Validate the inputs
        $languages = $this->model_localisation_language->getLanguages();


        foreach ($languages as $index => $language) {

            if (empty($this->request->post['noticetemplate'][$language['language_id']])) {

                $json['error']['noticetemplate'] = $this->language->get('error_noticetemplate');

            }
            if (empty($this->request->post['noticesubject'][$language['language_id']])) {

                $json['error']['noticesubject'] = $this->language->get('error_noticesubject');

            }
        }

        if (!isset($this->request->post['abandoned_threshold']) || !is_numeric($this->request->post['abandoned_threshold']) || $this->request->post['abandoned_threshold'] <= 0) {
            $json['error']['abandoned_threshold'] = $this->language->get('error_abandoned_threshold');
        }

        if (!isset($this->request->post['repeat_frequency']) || !is_numeric($this->request->post['repeat_frequency']) || $this->request->post['repeat_frequency'] <= 0) {
            $json['error']['repeat_frequency'] = $this->language->get('error_repeat_frequency');
        }

        if (!isset($this->request->post['total_notifications']) || !is_numeric($this->request->post['total_notifications']) || $this->request->post['total_notifications'] < 0) {
            $json['error']['total_notifications'] = $this->language->get('error_total_notifications');
        }

        if (!isset($this->request->post['abandonedcart_cart_memory']) || !is_numeric($this->request->post['abandonedcart_cart_memory']) || $this->request->post['abandonedcart_cart_memory'] < 0) {
            $json['error']['abandonedcart_cart_memory'] = $this->language->get('error_abandonedcart_cart_memory');
        }

        // If there are validation errors, return them
        if (!empty($json['error'])) {
            $this->response->setOutput(json_encode($json));
            return;
        }

        // If validation is successful, save the settings
        $this->load->model('setting/setting');

        $this->model_setting_setting->editSetting('abandonedcart', [
            'abandonedcart_abandoned_threshold' => $this->request->post['abandoned_threshold'],
            'abandonedcart_repeat_frequency' => $this->request->post['repeat_frequency'],
            'abandonedcart_total_notifications' => $this->request->post['total_notifications'],
            'abandonedcart_cart_memory' => $this->request->post['abandonedcart_cart_memory'],
            'abandonedcart_template' => $this->request->post['noticetemplate'],
            'abandonedcart_subject' => $this->request->post['noticesubject'],
        ]);

        // Return success response
        $json['success'] = 'Settings saved successfully!';
        $this->response->setOutput(json_encode($json));
    }

    public function getPagedCarts()
    {
        $pages = 10; // Items per page
        $page = 0;
        if (isset($this->request->get['page'])) {
            $page = (int) $this->request->get['page'] - 1;
        }
        $this->load->model('localisation/language');
        $this->load->model('marketing/abandonedcart');

        // Get total carts
        $totalCarts = $this->model_marketing_abandonedcart->getTotalGeneral();


        // Fetch paged carts
        $customers = $this->model_marketing_abandonedcart->getTotalGeneralWithDetails($page, $pages);

        foreach ($customers as $indexcustomer => $customer) {
            $cart = clone $this->cart;
            $cartcontents = $cart->getProducts($customer['cart']);

            unset($customers[$indexcustomer]['cart']);
            foreach ($cartcontents as $index => $cartcontent) {

                $newcartitem = [
                    'product_name' => $cartcontent['name'],
                    'product_id' => $cartcontent['product_id'],
                    'price' => $cartcontent['price'],
                    'quantity' => $cartcontent['quantity'],
                    'sku' => $cartcontent['sku'],
                    'options' => '',
                ];
                $optionstring = '';
                foreach ($cartcontent['option'] as $option) {
                    $optionstring .= "[ " . $option['name'] . ": " . $option['value'] . " ] - ";
                }
                $newcartitem['options'] = $optionstring;
                $customers[$indexcustomer]['cart'][] = $newcartitem;
            }
        }


        // Calculate total pages
        $totalPages = ceil($totalCarts / $pages);

        // Return as JSON
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode([
            'carts' => $customers,
            'totalPages' => $totalPages
        ]));
    }

    public function scheduleNow(): void
    {
        $this->load->language('marketing/abandonedcart');


        if (!$this->user->hasPermission('modify', 'marketing/abandonedcart')) {
            $json['error']['warning'] = $this->language->get('error_permission');
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
            return;
        }



        $page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 1;
        $limit = 5;
        $this->load->model('marketing/abandonedcart');
        $total = $this->model_marketing_abandonedcart->getAbandonedCount();

        $start = ($page - 1) * $limit;


        $filter = [
            'limit' => $limit,
            'start' => $start
        ];

        $sendmail = $this->sendNotifications($filter);

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode([
            'success' => sprintf($this->language->get('text_schedule_processed'), $total, $sendmail),
            'total' => $total,
            'page' => $page,
            'done' => $limit * $page
        ]));
    }

    public function sendNotifications($filter = []): int
    {


        $this->load->model('setting/setting');

        $this->load->model('marketing/abandonedcart');
        $this->load->model('localisation/language');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');

        // Retrieve the total notifications and repeat frequency settings
        $totalNotificationsLimit = isset($settings['abandonedcart_total_notifications']) ? (int) $settings['abandonedcart_total_notifications'] : 3;
        $repeatFrequency = isset($settings['abandonedcart_repeat_frequency']) ? (int) $settings['abandonedcart_repeat_frequency'] : 4;

        // Retrieve the list of abandoned carts to process
        $abandoned = $this->model_marketing_abandonedcart->getAbandoned($filter);


        $langCollection = $this->model_localisation_language->getLanguages();

        // Get stores default if later is a guest and doesn't have to set.
        $languageId = $langCollection[$this->config->get('config_language')]['language_id'];
        $send = 0;

        foreach ($abandoned as $cart) {

            if (empty($cart['email'])) {
                $cart['email'] = $this->model_marketing_abandonedcart->emailFromNewsletter($cart['session_id']);
            }
            if (empty($cart['email'])) {

                continue; // Ignore this particular cart
            }
            // Skip if total notices sent exceeds or equals the limit
            if ((int) $cart['total_notices'] >= $totalNotificationsLimit) {
                continue; // Ignore this stupid cart
            }

            // Check if the last notice date is set
            if (!empty($cart['date_lastnotice'])) {
                // Calculate the next eligible date for sending a notice
                $nextEligibleDate = date('Y-m-d H:i:s', strtotime($cart['date_lastnotice'] . " + $repeatFrequency days"));

                // Skip if the last notice was sent too recently
                if (strtotime($nextEligibleDate) > time()) {
                    continue; // Ignore this idiotic cart
                }
            }

            if (!empty($cart['language_id'])) {
                $languageId = $cart['language_id'];

            }
            // Id rather not do aikido than sql calls via localisation model 
            $cart['langcode'] = array_key_first(array_filter($langCollection, function ($language) use ($languageId) {
                return $language['language_id'] == $languageId;
            }));
            $storeId = 0;
            if (!empty($cart['store_id'])) {
                $storeId = $cart['store_id'];
            }
            $cart['store_id'] = $storeId;

            $message = $this->MarkUp($settings['abandonedcart_template'][$languageId], $cart);
            $subject = $settings['abandonedcart_subject'][$languageId];

            $emailSent = $this->Sendmail($cart['email'], $subject, $message);

            // Only increment the notice count if the email was sent successfully
            if ($emailSent) {
                $send++;
                $this->model_marketing_abandonedcart->addOneNotice($cart['customer_id'], $cart['session_id']);
            }

        }
        return $send;
    }
    private function Sendmail($email, $subject, $message)
    {
        $mailSent = false;

        try {
            if ($this->config->get('config_mail_engine')) {
                $mail_option = [
                    'parameter' => $this->config->get('config_mail_parameter'),
                    'smtp_hostname' => $this->config->get('config_mail_smtp_hostname'),
                    'smtp_username' => $this->config->get('config_mail_smtp_username'),
                    'smtp_password' => html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8'),
                    'smtp_port' => $this->config->get('config_mail_smtp_port'),
                    'smtp_timeout' => $this->config->get('config_mail_smtp_timeout')
                ];

                $mail = new \Ventocart\System\Library\Mail($this->config->get('config_mail_engine'), $mail_option);


                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $data['email'] = $email;
                    $data['langCode'] = $message['langcode'];
                    $data['footer'] = $message['footer'];
                    $data['message'] = $message['msg'];
                    $data['store_logo'] = $message['logo'];
                    $data['store_name'] = $message['store_name'];
                    $data['subject'] = $subject;
                    $mail->setTo(trim($email));
                    $mail->setFrom($message['store_email']);
                    $mail->setSender(html_entity_decode($message['store_email'], ENT_QUOTES, 'UTF-8'));
                    $mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));

                    $msg = $this->load->view('mail/newsletter', $data);

                    $mail->setHtml($msg);
                    $mailSent = $mail->send();

                }
            }
        } catch (\Exception $e) {

            $this->log->write("Mail send error: " . $e->getMessage());
        }
        return $mailSent;

    }
    // Because "mark-down" is already taken 
    private function MarkUp($template, $cart)
    {

        $this->load->language("marketing/abandonedcart");
        $this->load->model('marketing/abandonedcart');
        $this->load->model('setting/setting');
        $template = html_entity_decode($template);
        $cart['products'] = $this->model_marketing_abandonedcart->getCartProducts($cart);
        // Get store ID and set default if not provided
        $storeId = isset($cart['store_id']) ? $cart['store_id'] : 0;

        // Get store name and URL
        if ($storeId == 0) {
            $store_name = $this->config->get('config_name');  // Default store name
            $store_url = HTTP_CATALOG;  // Default store URL
        } else {
            $this->load->model('setting/store');
            $store_info = $this->model_setting_store->getStore($storeId);

            $store_name = $store_info ? $store_info['name'] : $this->config->get('config_name');
            $store_url = $store_info ? $store_info['url'] : HTTP_CATALOG;
        }

        $setting = $this->model_setting_setting->getSetting('config', $storeId);
        $logo = isset($setting['config_logo']) ? $setting['config_logo'] : $this->config->get('config_logo');

        $logo = $store_url . 'image/' . html_entity_decode($logo, ENT_QUOTES, 'UTF-8');

        $store_email = isset($setting['config_email']) ? $setting['config_email'] : $this->config->get('config_email');
        // Replace [sitename] and [siteurl]
        $template = str_replace('[sitename]', $store_name, $template);
        $template = str_replace('[siteurl]', $store_url, $template);

        // Replace [products] with a styled product container
        $products_html = '<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 shadow p-3 mb-5 bg-body rounded">';

        foreach ($cart['products'] as $product) {
            $product_image = $store_url . "?route=product/product.getImage&width=150&height=150&image=" . $product['product_image'];
            $product_name = isset($product['product_name']) ? htmlspecialchars($product['product_name']) : "-";
            $product_name = (strlen($product_name) > 12) ? substr($product_name, 0, 12) . "..." : $product_name;


            $products_html .= '
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="' . $product_image . '" class="card-img-top img-fluid" alt="' . $product_name . '">
                        <div class="card-body text-center">
                            <h6 class="card-title" style="font-size: 0.9rem;">' . $product_name . '</h6>
                        </div>
                    </div>
                </div>';
        }

        $products_html .= '</div>';

        // Replace [products] with the styled HTML
        $template = str_replace('[products]', $products_html, $template);
        if (!empty($cart['firstname'])) {
            $template = str_replace('[name]', $cart['firstname'], $template);  // Use registered name
        } else {
            $template = str_replace('[name]', $this->language->get('mail_text_customer'), $template);  // Use "Customer" for guests
        }
        // Replace [cart-button] with a Bootstrap-styled button
        $cart_button_html = '<div class="text-center">
        <a href="' . $store_url . 'index.php?route=guest/newsletter.cartReturn" class="btn btn-primary">' . $this->language->get('mail_text_return_to_cart') . '</a>
    </div>';
        $template = str_replace('[cart-button]', $cart_button_html, $template);


        $this->load->language("marketing/contact");

        $footer_template_pre = $this->language->get('newsletter_footer');
        $unsub_url = $store_url . "index.php?route=guest/newsletter&email=" . urlencode($cart['email']) . "&action=unsubscribe";
        $unsub = '<a href="' . $unsub_url . '">' . $this->language->get('newsletter_unsubscribe') . '</a>';
        $footer = sprintf($footer_template_pre, $store_name, $unsub);


        // Return the final template after replacements
        return [
            'msg' => $template,
            'footer' => $footer,
            'store_name' => $store_name,
            'langcode' => $cart['langcode'],
            'logo' => $logo,
            'store_email' => $store_email
        ];
    }




}