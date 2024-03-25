<?php
namespace Opencart\Admin\Controller\Extension\VentoCart\Shipping;

class ZoneShipping extends \Opencart\System\Engine\Controller
{

    public function index(): void
    {
        $this->load->language('extension/ventocart/shipping/zoneshipping');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping')
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/ventocart/shipping/zoneshipping', 'user_token=' . $this->session->data['user_token'])
        ];
        $this->load->model('localisation/weight_class');

        $data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();
        $this->load->model('localisation/length_class');


        $data['default_weigth'] = $this->config->get('config_weight_class_id');
        $this->load->model('localisation/geo_zone');


        $data['geoZones'] = $this->model_localisation_geo_zone->getGeoZones();


        $this->load->model('extension/ventocart/shipping/zoneshipping');

        $data['filters'] = $this->model_extension_ventocart_shipping_zoneshipping->getAllShippingZonesCompanies();


        $data['entries'] = $this->model_extension_ventocart_shipping_zoneshipping->getAllShippingZones();

        $data['save'] = $this->url->link('extension/ventocart/shipping/zoneshipping.save', 'user_token=' . $this->session->data['user_token']);
        $data['user_token'] = $this->session->data['user_token'];
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping');

        $data['status'] = $this->config->get('shipping_zoneshipping_status');
        $data['shipping_zoneshipping_sort_order'] = $this->config->get('shipping_zoneshipping_sort_order') ? $this->config->get('shipping_zoneshipping_sort_order') : 0;

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/ventocart/shipping/zoneshipping', $data));
    }

    public function save(): void
    {
        $this->load->language('extension/ventocart/shipping/zoneshipping');

        $json = [];

        if (!$this->user->hasPermission('modify', 'extension/ventocart/shipping/zoneshipping')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            $this->load->model('setting/setting');
            // Only these two keys should go in setting
            $keysToKeep = array('shipping_zoneshipping_status', 'shipping_zoneshipping_sort_order');
            $this->request->post = array_intersect_key($this->request->post, array_flip($keysToKeep));
            $this->model_setting_setting->editSetting('shipping_zoneshipping', $this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }


    public function saveentries(): void
    {
        $json = [];
        $this->load->language('extension/ventocart/shipping/zoneshipping');
        // Validate permissions
        if (!$this->user->hasPermission('modify', 'extension/ventocart/shipping/zoneshipping')) {
            $json['error'] = $this->language->get('error_permission');
        }

        // If no permission error, proceed
        if (!$json) {
            // Validate and sanitize posted data
            $name = isset ($this->request->post['name']) ? trim($this->request->post['name']) : '';
            $displayName = isset ($this->request->post['name']) ? trim($this->request->post['displayName']) : '';
            $countryId = isset ($this->request->post['geo_zone_id']) ? (int) $this->request->post['geo_zone_id'] : 0;
            $pricelist = isset ($this->request->post['price_list']) ? $this->request->post['price_list'] : [];

            $volumetric = isset ($this->request->post['volumetric']) ? (float) $this->request->post['volumetric'] : 0;

            $weightClassId = isset ($this->request->post['weight_class_id']) ? (int) $this->request->post['weight_class_id'] : 0;

            $postalCodes = isset ($this->request->post['postal_codes']) ? $this->request->post['postal_codes'] : '';
            $shippingEntryId = isset ($this->request->post['shipping_entry_id']) ? (int) $this->request->post['shipping_entry_id'] : 0;
            // Validate other required fields as needed



            // Check if any required field is empty
            if (empty ($name) || empty ($countryId)) {
                $json['error'] = $this->language->get('text_error_fill_form');
            } else {
                // Check if weight or length/width/height is provided
                if (empty ($pricelist)) {
                    $json['error'] = $this->language->get('text_error_no_pricelist');
                }
            }
            // If no errors, proceed to save or edit
            if (!$json) {
                $this->load->model('extension/ventocart/shipping/zoneshipping');
                // Call model function to save or edit the data
                $shippingEntryId = $this->model_extension_ventocart_shipping_zoneshipping->saveOrUpdateEntry($shippingEntryId, $name, $displayName, $volumetric, $countryId, $pricelist, $weightClassId, $postalCodes);

                if ($shippingEntryId !== false) {
                    $json['success'] = $this->language->get('text_success');
                } else {
                    $json['error'] = $this->language->get('text_failed');
                }
            }
        }

        // Send JSON response
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
    public function deleteentries(): void
    {
        $json = [];
        $this->load->language('extension/ventocart/shipping/zoneshipping');
        // Validate permissions
        if (!$this->user->hasPermission('modify', 'extension/ventocart/shipping/zoneshipping')) {
            $json['error'] = $this->language->get('error_permission');
        }

        // If no permission error, proceed
        if (!$json) {
            // Validate and sanitize posted data
            $shippingEntryId = isset ($this->request->post['shipping_entry_id']) ? (int) $this->request->post['shipping_entry_id'] : 0;

            // Check if shipping_entry_id is provided
            if ($shippingEntryId == 0) {
                $json['error'] = 'Shipping Entry ID is required';
            } else {
                $this->load->model('extension/ventocart/shipping/zoneshipping');
                // Call model function to delete the entry
                $success = $this->model_extension_ventocart_shipping_zoneshipping->deleteEntryById($shippingEntryId);

                if ($success) {
                    $json['success'] = 'Entry deleted successfully';
                } else {
                    $json['error'] = 'Failed to delete entry';
                }
            }
        }

        // Send JSON response
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getPostalCodes(): void
    {
        $json = [];
        $this->load->language('extension/ventocart/shipping/zoneshipping');
        // Validate permissions
        if (!$this->user->hasPermission('modify', 'extension/ventocart/shipping/zoneshipping')) {
            $json['error'] = $this->language->get('error_permission');
        }

        // If no permission error, proceed
        if (!$json) {
            // Validate and sanitize posted data
            $shippingEntryId = isset ($this->request->post['shipping_entry_id']) ? (int) $this->request->post['shipping_entry_id'] : 0;

            // Check if shipping_entry_id is provided
            if ($shippingEntryId == 0) {
                $json['error'] = 'Shipping Entry ID is required';
            } else {
                $this->load->model('extension/ventocart/shipping/zoneshipping');
                // Call model function to delete the entry
                $success = $this->model_extension_ventocart_shipping_zoneshipping->getPostalCodes($shippingEntryId);


                if ($success) {
                    $json['postalCodes'] = $success;
                } else {
                    $json['error'] = 'Failed to delete entry';
                }
            }
        }

        // Send JSON response
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getZones(): void
    {
        $json = [];
        $this->load->language('extension/ventocart/shipping/zoneshipping');
        // Validate permissions
        if (!$this->user->hasPermission('modify', 'extension/ventocart/shipping/zoneshipping')) {
            $json['error'] = $this->language->get('error_permission');
        }

        // If no permission error, proceed
        if (!$json) {
            // Validate and sanitize posted data
            $displayName = isset ($this->request->post['displayName']) ? $this->request->post['displayName'] : 0;

            // Check if shipping_entry_id is provided
            if ($displayName == 0) {
                $json['error'] = 'Shipping Company is required ';
            } else {
                $this->load->model('extension/ventocart/shipping/zoneshipping');
                // Call model function to delete the entry
                $success = $this->model_extension_ventocart_shipping_zoneshipping->getZones($displayName);


                if ($success) {
                    $json['zones'] = $success;
                } else {
                    $json['error'] = 'Failed to delete entry';
                }
            }
        }

        // Send JSON response
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function install(): void
    {

        $this->db->query("
    CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "shipping_pzones (
        shipping_entry_id INT(11) NOT NULL AUTO_INCREMENT,
        geo_zone_id INT(11),
        pricelist TEXT,
        name VARCHAR(100),
        displayName VARCHAR(100),
        weight_class_id INT(11),
        volumetric INT(11),
        PRIMARY KEY (shipping_entry_id)
    )");

        $this->db->query("
    CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "shipping_pcodes (
        shipping_code_id INT(11) NOT NULL AUTO_INCREMENT,
        post_code VARCHAR(15),
        shipping_entry_id INT(11),
        PRIMARY KEY (shipping_code_id)
    )");


    }

    public function uninstall(): void
    {

        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "shipping_pzones`");
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "shipping_pcodes`");
    }
}