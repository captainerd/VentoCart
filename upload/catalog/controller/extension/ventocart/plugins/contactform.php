<?php
namespace Ventocart\Catalog\Controller\Extension\Ventocart\Plugins;
class ContactForm extends \Ventocart\System\Engine\Controller
{
    public function index(): string
    {
        $this->load->language('information/contact');
        $data['send'] = $this->url->link('information/contact.send');

        $data['name'] = $this->customer->getFirstName();
        $data['email'] = $this->customer->getEmail();
        $this->session->data['email_token'] = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);
        $data['email_field'] = $this->session->data['email_token'];
        // Captcha
        $this->load->model('setting/extension');

        $extension_info = $this->model_setting_extension->getExtensionByCode('captcha', $this->config->get('config_captcha'));

        if ($extension_info && $this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('contact', (array) $this->config->get('config_captcha_page'))) {
            $data['captcha'] = $this->load->controller('extension/' . $extension_info['extension'] . '/captcha/' . $extension_info['code']);
        } else {
            $data['captcha'] = '';
        }



        return $this->load->view('extension/ventocart/plugins/contactform', $data);

    }

}
?>