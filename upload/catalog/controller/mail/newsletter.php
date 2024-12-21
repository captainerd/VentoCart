<?php
namespace Ventocart\Catalog\Controller\Mail;
/**
 * Class Forgotten
 *
 * @package Ventocart\Catalog\Controller\Mail
 */


class Newsletter extends \Ventocart\System\Engine\Controller
{
    public function index(string &$route, array &$args, &$output): void
    {
        $this->load->language('mail/newsletter');

        $this->load->model('setting/store');

        $store_url = $this->config->get('config_url') ?: HTTP_SERVER;
        $logo = $this->config->get('config_logo');
        $data['store_logo'] = $store_url . 'image/' . html_entity_decode($logo, ENT_QUOTES, 'UTF-8');
        $email = isset($args[0]) ? trim($args[0]) : '';
        $action = isset($args[1]) ? $args[1] : null;

        if ($output == 'text_not_found' || $output == 'text_already_subscribed') {
            // No action has been taken
            return;
        }
        if (!$email || !$action) {
            // Early return if necessary data is missing
            return;
        }

        $store_name = $this->config->get('config_name');
        $store_name = html_entity_decode($store_name, ENT_QUOTES, 'UTF-8');

        $data['store_name'] = $store_name;


        $store_name = html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');

        $next = $action == 'subscribe' ? 'unsubscribe' : 'subscribe';
        $data['store'] = $store_name;
        $data['store_url'] = $store_url . "?route=guest/newsletter&action=" . $next . '&email=' . $email;
        $data['ip_address'] =
            $this->language->get('text_ip_address') . " " .
            $this->request->server['REMOTE_ADDR'];

        $data['langCode'] = $this->config->get('config_language');
        $data['ip_address'] .= ' | ' . date('Y-m-d H:i:s');
        $data['ip_address'] .= ' | Agent: ' . ($this->request->server['HTTP_USER_AGENT'] ?? 'Unknown');



        // Set subject and appropriate messages using sprintf() and language variables
        $data['subject'] = sprintf($this->language->get('text_subject'), $store_name);
        $data['text_action_link'] = $this->language->get('text_action_link');
        $data['footer'] = $this->language->get('text_footer');

        // Detect the action (subscribe or unsubscribe) and set appropriate text



        if ($action === 'subscribe') {
            $data['text_message'] = sprintf($this->language->get('text_welcome'), $store_name);
        } elseif ($action === 'unsubscribe') {
            $data['text_message'] = sprintf($this->language->get('text_goodbye'), $store_name);
        }

        // Send the email notification to the subscriber/unsubscriber
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
            $mail->setTo($email);
            $mail->setFrom($this->config->get('config_email'));
            $mail->setSender($store_name);
            $mail->setSubject($data['subject']);
            $mail->setHtml($this->load->view('mail/newsletter', $data));
            $mail->send();
        }

    }

}
/*
Registering news letter mail event 
 $this->load->bridge('Admin')
$this->model_setting_event->addEvent([
    'code' => 'newsletter_notification',
    'description' => 'Sends email notifications when a user subscribes or unsubs',
    'trigger' => 'catalog/model/guest/newsletter/route/after',
    'action' => 'mail/newsletter',
    'status' => true,
    'sort_order' => 1
]);
*/