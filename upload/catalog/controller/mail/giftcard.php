<?php
namespace Ventocart\Catalog\Controller\Mail;

/**
 * Class GiftCard
 *
 * @package Ventocart\Catalog\Controller\Mail
 */
class GiftCard extends \Ventocart\System\Engine\Controller
{
    public function index(string &$route, array &$args, &$output): void
    {


        // Load the language file for GiftCard email template
        $this->load->language('mail/giftcard');

        // Extract the first argument (which should be the array of gift cards)
        $giftcard_data = $output;
        $store_info = $giftcard_data['store_info'];
        unset($giftcard_data['store_info']);

        // Store specfics
        $store_url = $store_info['url'];
        $setting = $this->model_setting_setting->getSetting('config');
        $store_email = isset($setting['config_email']) ? $setting['config_email'] : $this->config->get('config_email');
        $logo = isset($setting['config_logo']) ? $setting['config_logo'] : $this->config->get('config_logo');
        $store_logo = $store_url . 'image/' . html_entity_decode($logo, ENT_QUOTES, 'UTF-8');


        // Check if the giftcard data exists and is an array
        if (is_array($giftcard_data)) {
            // Define store name and logo URL
            $store_name = html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');



            $data['store_logo'] = $store_logo;

            // Prepare store and email content variables
            $data['store'] = $store_name;
            $data['store_url'] = $store_url;
            $data['langCode'] = $this->config->get('config_language');

            $data['store_url_link'] = '<a href="' . htmlspecialchars($store_url) . '" target="_blank" rel="noopener noreferrer">' . htmlspecialchars($store_url) . '</a>';

            $data['store_url_clean'] = preg_replace('#^https?://#', '', rtrim($store_url, '/'));
            $data['text_footer'] = sprintf($this->language->get('text_footer'), $this->config->get('config_email') . " " . $data['store_url_link']);



            $data['sender_name'] = $giftcard_data[0]['sender_name'];
            // Assign the giftcards to the data array
            $data['giftcards'] = $giftcard_data;

            // Set email subject and content
            $data['subject'] = sprintf($this->language->get('text_subject'), $store_name);
            $data['text_message'] = sprintf($this->language->get('text_message'), $giftcard_data[0]['receiver_name'], $giftcard_data[0]['sender_name'], $giftcard_data[0]['giftcard_code']);

            // Send the email notification to the gift card receiver
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
                $mail->setTo($giftcard_data[0]['receiver_email']);
                $mail->setFrom($store_email);
                $mail->setSender($store_name);
                $mail->setSubject($data['subject']);
                $mail->setHtml($this->load->view('mail/giftcard', $data));
                $mail->send();
            }
        }
    }
}
