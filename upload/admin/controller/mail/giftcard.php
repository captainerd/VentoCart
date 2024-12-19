<?php
namespace Ventocart\Admin\Controller\Mail;

/**
 * Class GiftCard
 *
 * @package Ventocart\Admin\Controller\Mail
 */
class GiftCard extends \Ventocart\System\Engine\Controller
{
    public function index(string &$route, array &$args, &$output): void
    {
        $this->log->write('GiftCard email triggered.');

        // Load the language file for GiftCard email template
        $this->load->language('mail/giftcard');

        // Check if the array has at least 6 elements and set defaults if necessary
        $sender_name = isset($args[0]) ? $args[0] : '';
        $sender_email = isset($args[1]) ? $args[1] : '';
        $receiver_name = isset($args[2]) ? $args[2] : '';
        $receiver_email = isset($args[3]) ? $args[3] : '';
        $giftcard_message = isset($args[4]) ? $args[4] : '';
        $giftcard_code = isset($args[5]) ? $args[5] : '';

        // Define store name
        $store_name = html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');

        // Prepare data for email template
        $data['store'] = $store_name;
        $data['sender_name'] = $sender_name;
        $data['sender_email'] = $sender_email;
        $data['receiver_name'] = $receiver_name;
        $data['receiver_email'] = $receiver_email;
        $data['giftcard_message'] = $giftcard_message;
        $data['giftcard_code'] = $giftcard_code;
        $data['store_url'] = $this->config->get('config_url');

        // Set email subject and content
        $data['subject'] = sprintf($this->language->get('text_subject'), $store_name);

        $data['text_footer'] = "gamiese";

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
            $mail->setTo($receiver_email);
            $mail->setFrom($this->config->get('config_email'));
            $mail->setSender($store_name);
            $mail->setSubject($data['subject']);
            $mail->setHtml($this->load->view('mail/newsletter', $data));
            $mail->send();
        }
    }
}