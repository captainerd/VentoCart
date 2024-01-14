<?php
namespace Opencart\Catalog\Controller\Checkout;
use Opencart\Catalog\Model\Localization\Country;


class Register extends \Opencart\System\Engine\Controller {

	private function getIPAddress()
{
	//return '200.7.98.19';
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
	 
    return $ip;
} 






	public function index(): string {
		
		$this->load->language('checkout/register');

		// Task 1: Get the user's IP address
        $userIP = $this->getIPAddress();

        // Task 2: Load the func.php file
		require_once(  DIR_STORAGE . 'vendor/geolite2/func.php');

        // Task 3: Use the function to get the country code
        $geolocatedCode = getCountryCodeFromIP($userIP);

        // Task 5: Store the result in $data['geolocated_code']
	
        $data['geolocated_code'] = $geolocatedCode;
		$this->load->model('localisation/country');

 
		// Perform the database lookup using the model
		$countryInfo = $this->model_localisation_country->getCountryByIsoCode2($geolocatedCode);
	
	 $countryId = 0;
		if (!empty($countryInfo) && is_array($countryInfo)) {
			$firstCountry = $countryInfo[0]; // Get the first element of the outer array
			$countryId = $firstCountry['country_id']; // Extract the "country_id" from the inner array
			 
		}  
		$data['pre_select_country_id'] = $countryId;

		$data['country_company_fields'] =  json_encode($this->language->get('country_company_fields'));


		$data['text_login'] = sprintf($this->language->get('text_login'), $this->url->link('account/login', 'language=' . $this->config->get('config_language') . '&redirect=' . urlencode($this->url->link('checkout/checkout', 'language=' . $this->config->get('config_language'), true))));
		 
		$data['entry_newsletter'] = sprintf($this->language->get('entry_newsletter'), $this->config->get('config_name'));

		$data['error_upload_size'] = sprintf($this->language->get('error_upload_size'), $this->config->get('config_file_max_size'));
	 
		$data['config_show_company_field'] = $this->config->get('config_show_company_field');
		$data['config_checkout_guest'] = ($this->config->get('config_checkout_guest') && !$this->config->get('config_customer_price') && !$this->cart->hasDownload() && !$this->cart->hasSubscription());
		$data['config_file_max_size'] = ((int)$this->config->get('config_file_max_size') * 1024 * 1024);
	   

		$data['shipping_required'] = $this->cart->hasShipping();

		$data['upload'] = $this->url->link('tool/upload', 'language=' . $this->config->get('config_language'));

		$data['customer_groups'] = [];

		if (is_array($this->config->get('config_customer_group_display'))) {
			$this->load->model('account/customer_group');

			$customer_groups = $this->model_account_customer_group->getCustomerGroups();

			foreach ($customer_groups  as $customer_group) {
				if (in_array($customer_group['customer_group_id'], $this->config->get('config_customer_group_display'))) {
					$data['customer_groups'][] = $customer_group;
				}
			}
		}

		if (isset($this->session->data['customer']['customer_id'])) {
			$data['account'] = $this->session->data['customer']['customer_id'];
		} else {
			$data['account'] = 1;
		}

		if (isset($this->session->data['customer'])) {
			$data['customer_group_id'] = $this->session->data['customer']['customer_group_id'];
			$data['firstname'] = $this->session->data['customer']['firstname'];
			$data['lastname'] = $this->session->data['customer']['lastname'];
			$data['email'] = $this->session->data['customer']['email'];
			$data['account_custom_field'] = $this->session->data['customer']['custom_field'];
		} else {
			$data['customer_group_id'] = $this->config->get('config_customer_group_id');
			$data['firstname'] = '';
			$data['lastname'] = '';
			$data['email'] = '';
			$data['telephone'] = '';
			$data['account_custom_field'] = [];
		}

		if (isset($this->session->data['payment_address'])) {
			$data['payment_firstname'] = $this->session->data['payment_address']['firstname'];
			$data['payment_lastname'] = $this->session->data['payment_address']['lastname'];
			$data['payment_company'] = $this->session->data['payment_address']['company'];
			$data['payment_address_1'] = $this->session->data['payment_address']['address_1'];
			$data['payment_phone'] = $this->session->data['payment_address']['phone'];
			$data['payment_postcode'] = $this->session->data['payment_address']['postcode'];
			$data['payment_city'] = $this->session->data['payment_address']['city'];
			$data['payment_country_id'] = (int)$this->session->data['payment_address']['country_id'];
			$data['payment_zone_id'] = $this->session->data['payment_address']['zone_id'];
			$data['payment_custom_field'] = $this->session->data['payment_address']['custom_field'];
		} else {
			$data['payment_firstname'] = '';
			$data['payment_lastname'] = '';
			$data['payment_company'] = '';
			$data['payment_address_1'] = '';
			$data['payment_phone'] = '';
			$data['payment_postcode'] = '';
			$data['payment_city'] = '';
			$data['payment_country_id'] = $this->config->get('config_country_id');
			$data['payment_zone_id'] = '';
			$data['payment_custom_field'] = [];
		}

		if (isset($this->session->data['shipping_address']['address_id'])) {
			$data['shipping_firstname'] = $this->session->data['shipping_address']['firstname'];
			$data['shipping_lastname'] = $this->session->data['shipping_address']['lastname'];
			$data['shipping_company'] = $this->session->data['shipping_address']['company'];
			$data['shipping_address_1'] = $this->session->data['shipping_address']['address_1'];
			$data['shipping_phone'] = $this->session->data['shipping_address']['phone'];
			$data['shipping_postcode'] = $this->session->data['shipping_address']['postcode'];
			$data['shipping_city'] = $this->session->data['shipping_address']['city'];
			$data['shipping_country_id'] = (int)$this->session->data['shipping_address']['country_id'];
			$data['shipping_zone_id'] = $this->session->data['shipping_address']['zone_id'];
			$data['shipping_custom_field'] = $this->session->data['shipping_address']['custom_field'];
		} else {
			$data['shipping_firstname'] = '';
			$data['shipping_lastname'] = '';
			$data['shipping_company'] = '';
			$data['shipping_address_1'] = '';
			$data['shipping_phone'] = '';

			if (isset($this->session->data['shipping_address']['postcode'])) {
				$data['shipping_postcode'] = $this->session->data['shipping_address']['postcode'];
			} else {
				$data['shipping_postcode'] = '';
			}

			$data['shipping_city'] = '';

			if (isset($this->session->data['shipping_address']['country_id'])) {
				$data['shipping_country_id'] = $this->session->data['shipping_address']['country_id'];
			} else {
				$data['shipping_country_id'] = $this->config->get('config_country_id');
			}

			if (isset($this->session->data['shipping_address']['zone_id'])) {
				$data['shipping_zone_id'] = $this->session->data['shipping_address']['zone_id'];
			} else {
				$data['shipping_zone_id'] = '';
			}

			$data['shipping_custom_field'] = [];
		}

		$this->load->model('localisation/country');

		$data['countries'] = $this->model_localisation_country->getCountries();

		$geolocatedCountryInfo = $this->model_localisation_country->getCountryByIsoCode2($geolocatedCode);
        if ($geolocatedCountryInfo) {
            $data['geolocated_country'] = $geolocatedCountryInfo[0]['country_id'];
        } else {
            $data['geolocated_country'] = '';
        }
		

		// Custom Fields
		$this->load->model('account/custom_field');

		$data['custom_fields'] = $this->model_account_custom_field->getCustomFields();
	

		// Captcha
		$this->load->model('setting/extension');

		$extension_info = $this->model_setting_extension->getExtensionByCode('captcha', $this->config->get('config_captcha'));

		if ($extension_info && $this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('register', (array)$this->config->get('config_captcha_page'))) {
			$data['captcha'] = $this->load->controller('extension/'  . $extension_info['extension'] . '/captcha/' . $extension_info['code']);
		} else {
			$data['captcha'] = '';
		}

		$this->load->model('catalog/information');

		$information_info = $this->model_catalog_information->getInformation($this->config->get('config_account_id'));

		if ($information_info) {
			$data['text_agree'] = sprintf($this->language->get('text_agree'), $this->url->link('information/information.info', 'language=' . $this->config->get('config_language') . '&information_id=' . $this->config->get('config_account_id')), $information_info['title']);
		} else {
			$data['text_agree'] = '';
		}

		$data['language'] = $this->config->get('config_language');

	 


		return $this->load->view('checkout/register', $data);
	}
 
	public function save(): void {
		$this->load->language('checkout/register');
		$oldAddress = null;
		if (isset($this->session->data['shipping_address'])) $oldAddress = $this->session->data['shipping_address'];

		$json = [];

		$keys = [
			'account',
			'customer_group_id',
			'firstname',
			'lastname',
			'email',
			'phone',
			'payment_company',
			'payment_address_1',
			'payment_phone',
			'payment_city',
			'payment_postcode',
			'payment_country_id',
			'payment_zone_id',
			'payment_custom_field',
			'address_match',
			'shipping_firstname',
			'shipping_lastname',
			'shipping_company',
			'shipping_address_1',
			'shipping_phone',
			'shipping_city',
			'shipping_postcode',
			'shipping_country_id',
			'shipping_zone_id',
			'shipping_custom_field',
			'password',
			'agree'
		];

		foreach ($keys as $key) {
			if (!isset($this->request->post[$key])) {
				$this->request->post[$key] = '';
			}
		}
 
		// Force account requires subscript or is a downloadable product.
		if ($this->cart->hasDownload() || $this->cart->hasSubscription()) {
			$this->request->post['account'] = 1;
		}

		// Validate cart has products and has stock.
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);
		}

		// Validate minimum quantity requirements.
		$products = $this->cart->getProducts();

		foreach ($products as $product) {
			if (!$product['minimum']) {
				$json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);

				break;
			}
		}

		if (!$json) {
			// If not guest checkout disabled, login require price or cart has downloads
			if (!$this->customer->isLogged() && !$this->request->post['account'] && (!$this->config->get('config_checkout_guest') || $this->config->get('config_customer_price'))) {
				$json['error']['warning'] = $this->language->get('error_guest');
			} 

			// Customer Group
			if ($this->request->post['customer_group_id']) {
				$customer_group_id = (int)$this->request->post['customer_group_id'];
			} else {
				$customer_group_id = (int)$this->config->get('config_customer_group_id');
			}

			$this->load->model('account/customer_group');

			$customer_group_info = $this->model_account_customer_group->getCustomerGroup($customer_group_id);

			if (!$customer_group_info || !in_array($customer_group_id, (array)$this->config->get('config_customer_group_display'))) {
				$json['error']['warning'] = $this->language->get('error_customer_group');
			}

			if ((oc_strlen($this->request->post['firstname']) < 1) || (oc_strlen($this->request->post['firstname']) > 32)) {
				$json['error']['firstname'] = $this->language->get('error_firstname');
			}

			if ((oc_strlen($this->request->post['lastname']) < 1) || (oc_strlen($this->request->post['lastname']) > 32)) {
				$json['error']['lastname'] = $this->language->get('error_lastname');
			}
	

			if ((oc_strlen($this->request->post['email']) > 96) || !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
				$json['error']['email'] = $this->language->get('error_email');
			}

			if ((oc_strlen($this->request->post['shipping_company']) < 1 || oc_strlen($this->request->post['shipping_company']) > 32) && isset($this->request->post['shipping_custom_field']['address'][31]) && $this->request->post['shipping_custom_field']['address'][31] == '49') {
				$json['error']['shipping_company'] = $this->language->get('error_firstname');
			}
			
			$this->load->model('account/customer');

			if ($this->request->post['account'] && $this->model_account_customer->getTotalCustomersByEmail($this->request->post['email'])) {
				$json['error']['warning'] = $this->language->get('error_exists');
			}

		 

	 
			// Custom field validation
			$this->load->model('account/custom_field');

			$custom_fields = $this->model_account_custom_field->getCustomFields($customer_group_id);

			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'account') {
					if ($custom_field['required'] && empty($this->request->post['custom_field'][$custom_field['location']][$custom_field['custom_field_id']])) {
						$json['error']['custom_field_' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
					} elseif (($custom_field['type'] == 'text') && !empty($custom_field['validation']) && !preg_match(html_entity_decode($custom_field['validation'], ENT_QUOTES, 'UTF-8'), $this->request->post['custom_field'][$custom_field['location']][$custom_field['custom_field_id']])) {
						$json['error']['custom_field_' . $custom_field['custom_field_id']];//sprintf($this->language->get('error_regex'), $custom_field['name']);
					}
				}
			}

		 
				if ((oc_strlen($this->request->post['payment_address_1']) < 3) || (oc_strlen($this->request->post['payment_address_1']) > 128)) {
					$json['error']['payment_address_1'] = $this->language->get('error_address_1');
				}
				//remove spaces, "-", and "( )" as phone formated by the user. 
				$phonetest = str_replace(array(" ", "-", "(", ")"), "", $this->request->post['payment_phone']);
				//check against regular expression, it starts with + followed by numbers only, minimum 6 chars, max 15
				if (!isset($this->request->post['payment_phone']) || !preg_match('/^\+[0-9]{6,15}$/', $phonetest)) {
					$json['error']['payment_phone'] =  $this->language->get('error_phone');
				}

				if ((oc_strlen($this->request->post['payment_city']) < 2) || (oc_strlen($this->request->post['payment_city']) > 128)) {
					$json['error']['payment_city'] = $this->language->get('error_city');
				}

				$this->load->model('localisation/country');

				$payment_country_info = $this->model_localisation_country->getCountry((int)$this->request->post['payment_country_id']);

				if ($payment_country_info && $payment_country_info['postcode_required'] && (oc_strlen($this->request->post['payment_postcode']) < 2 || oc_strlen($this->request->post['payment_postcode']) > 10)) {
					$json['error']['payment_postcode'] = $this->language->get('error_postcode');
				}

				if ($this->request->post['payment_country_id'] == '') {
					$json['error']['payment_country'] = $this->language->get('error_country');
				}

				if ($this->request->post['payment_zone_id'] == '') {
			 		$json['error']['payment_zone'] = $this->language->get('error_zone');
				}

				// Custom field validation
				foreach ($custom_fields as $custom_field) {
					if ($custom_field['location'] == 'address') {
						if ($custom_field['required'] && empty($this->request->post['payment_custom_field'][$custom_field['location']][$custom_field['custom_field_id']])) {
							$json['error']['payment_custom_field_' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
						} elseif (($custom_field['type'] == 'text') && !empty($custom_field['validation']) && !preg_match(html_entity_decode($custom_field['validation'], ENT_QUOTES, 'UTF-8'), $this->request->post['payment_custom_field'][$custom_field['location']][$custom_field['custom_field_id']]) ) {
							$json['error']['payment_custom_field_' . $custom_field['custom_field_id']]; //$custom_field['custom_field_id'];//sprintf($this->language->get('error_regex'), $custom_field['name']);
						}
					}
				}
			 

			if ($this->cart->hasShipping() && !$this->request->post['address_match']) {
				// If payment address not required we need to use the firstname and lastname from the account.
			 
					if ((oc_strlen($this->request->post['shipping_firstname']) < 1) || (oc_strlen($this->request->post['shipping_firstname']) > 32)) {
						$json['error']['shipping_firstname'] = $this->language->get('error_firstname');
					}

					if ((oc_strlen($this->request->post['shipping_lastname']) < 1) || (oc_strlen($this->request->post['shipping_lastname']) > 32)) {
						$json['error']['shipping_lastname'] = $this->language->get('error_lastname');
					}
			 

				if ((oc_strlen($this->request->post['shipping_address_1']) < 3) || (oc_strlen($this->request->post['shipping_address_1']) > 128)) {
					$json['error']['shipping_address_1'] = $this->language->get('error_address_1');
				}
				//remove spaces, "-", and "( )" as phone formated by the user. 
				$phonetest = str_replace(array(" ", "-", "(", ")"), "", $this->request->post['shipping_phone']);
	 
				if (!isset($this->request->post['shipping_phone']) || !preg_match('/^\+[0-9]{6,15}$/', $phonetest)) {
					$json['error']['shipping_phone'] =  $this->language->get('error_phone');
				}

				if ((oc_strlen($this->request->post['shipping_city']) < 2) || (oc_strlen($this->request->post['shipping_city']) > 128)) {
					$json['error']['shipping_city'] = $this->language->get('error_city');
				}

				$this->load->model('localisation/country');

				$shipping_country_info = $this->model_localisation_country->getCountry((int)$this->request->post['shipping_country_id']);

				if ($shipping_country_info && $shipping_country_info['postcode_required'] && (oc_strlen($this->request->post['shipping_postcode']) < 2 || oc_strlen($this->request->post['shipping_postcode']) > 10)) {
					$json['error']['shipping_postcode'] = $this->language->get('error_postcode');
				}

				if ($this->request->post['shipping_country_id'] == '') {
					$json['error']['shipping_country'] = $this->language->get('error_country');
				}

				if ($this->request->post['shipping_zone_id'] == '') {
			//		$json['error']['shipping_zone'] = $this->language->get('error_zone');
				}

				// Custom field validation
				foreach ($custom_fields as $custom_field) {
					if ($custom_field['location'] == 'address') {
						if ($custom_field['required'] && empty($this->request->post['shipping_custom_field'][$custom_field['location']][$custom_field['custom_field_id']])) {
							$json['error']['shipping_custom_field_' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
						} elseif (($custom_field['type'] == 'text') && !empty($custom_field['validation']) && !preg_match(html_entity_decode($custom_field['validation'], ENT_QUOTES, 'UTF-8'), $this->request->post['shipping_custom_field'][$custom_field['location']][$custom_field['custom_field_id']])  && ($custom_field['custom_field_id'] == 51 && $this->request->post['shipping_custom_field']['address'][31] == '49')) {
							$json['error']['shipping_custom_field_' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_regex'), $custom_field['name']);
						}
					}
				}
			}

			// If account register password required
			if ($this->request->post['account'] && (oc_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) < 4) || (oc_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) > 40)) {
				$json['error']['password'] = $this->language->get('error_password');
			}

			if ($this->request->post['account']) {
				$this->load->model('catalog/information');

				$information_info = $this->model_catalog_information->getInformation($this->config->get('config_account_id'));

				if ($information_info && !$this->request->post['agree']) {
					$json['error']['warning'] = sprintf($this->language->get('error_agree'), $information_info['title']);
				}
			}

			// Captcha
			$this->load->model('setting/extension');

			if (!$this->customer->isLogged()) {
				$extension_info = $this->model_setting_extension->getExtensionByCode('captcha', $this->config->get('config_captcha'));

				if ($extension_info && $this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('register', (array)$this->config->get('config_captcha_page'))) {
					$captcha = $this->load->controller('extension/' . $extension_info['extension'] . '/captcha/' . $extension_info['code'] . '.validate');

					if ($captcha) {
						$json['error']['captcha'] = $captcha;
					}
				}
			}
		}

		if (!$json) {
			// Add customer details into session
			$customer_data = [
				'customer_id'       => 0,
				'customer_group_id' => $customer_group_id,
				'firstname'         => $this->request->post['firstname'],
				'lastname'          => $this->request->post['lastname'],
				'email'             => $this->request->post['email'],
				'agree'             => $this->request->post['agree'],
				'phone'      => $this->request->post['payment_phone'],
				'custom_field'      => isset($this->request->post['custom_field']) ? $this->request->post['custom_field'] : []
			];

			// Register
			if ($this->request->post['account']) {
				$customer_data['customer_id'] = $this->model_account_customer->addCustomer($this->request->post);
			}

			// Logged so edit customer details
			if ($this->customer->isLogged()) {
				$this->model_account_customer->editCustomer($this->customer->getId(), $this->request->post);
			}

			// Check if current customer group requires approval
			if (!$customer_group_info['approval']) {
				$this->session->data['customer'] = $customer_data;
			}

			$this->load->model('account/address');

			// Payment Address
		 
				if (isset($this->session->data['payment_address']['address_id'])) {
					$address_id = $this->session->data['payment_address']['address_id'];
				} else {
					$address_id = 0;
				}

				if ($payment_country_info) {
					$country = $payment_country_info['name'];
					$iso_code_2 = $payment_country_info['iso_code_2'];
					$iso_code_3 = $payment_country_info['iso_code_3'];
					$address_format = $payment_country_info['address_format'];
				} else {
					$country = '';
					$iso_code_2 = '';
					$iso_code_3 = '';
					$address_format = '';
				}

				$this->load->model('localisation/zone');

			//	$zone_info = $this->model_localisation_zone->getZone($this->request->post['payment_zone_id']);
 
					$zone = '';
					$zone_code = '';
			 

				$payment_address_data = [
					'address_id'     => $address_id,
					'firstname'      => $this->request->post['firstname'],
					'lastname'       => $this->request->post['lastname'],
					'company'        => $this->request->post['payment_company'],
					'address_1'      => $this->request->post['payment_address_1'],
					'phone'      => $this->request->post['payment_phone'],
					'city'           => $this->request->post['payment_city'],
					'postcode'       => $this->request->post['payment_postcode'],
					'zone_id'        => $this->request->post['payment_zone_id'],
					'zone'           => isset($this->request->post['payment_zone']) ? $this->request->post['payment_zone'] : $zone,
					'zone_code'      => $zone_code,
					'country_id'     => $this->request->post['payment_country_id'],
					'country'        => $country,
					'iso_code_2'     => $iso_code_2,
					'iso_code_3'     => $iso_code_3,
					'address_format' => $address_format,
					'custom_field'   => isset($this->request->post['payment_custom_field']) ? $this->request->post['payment_custom_field'] : []
				];
		 
				// Add
				if ($this->request->post['account']) {
					$payment_address_data['default'] = 1;

					$payment_address_data['address_id'] = $this->model_account_address->addAddress($customer_data['customer_id'], $payment_address_data);
				}

				// Edit
				if ($this->customer->isLogged() && $payment_address_data['address_id']) {
					$this->model_account_address->editAddress($payment_address_data['address_id'], $payment_address_data);
				}

				// Requires Approval
				if (!$customer_group_info['approval']) {
					$this->session->data['payment_address'] = $payment_address_data;
				}
			 

			// Shipping Address
			if ($this->cart->hasShipping()) {
				if (!$this->request->post['address_match']) {
					if (isset($this->session->data['shipping_address']['address_id'])) {
						$address_id = $this->session->data['shipping_address']['address_id'];
					} else {
						$address_id = 0;
					}

					 
						$firstname = $this->request->post['shipping_firstname'];
						$lastname = $this->request->post['shipping_lastname'];
				 

					if ($shipping_country_info) {
						$country = $shipping_country_info['name'];
						$iso_code_2 = $shipping_country_info['iso_code_2'];
						$iso_code_3 = $shipping_country_info['iso_code_3'];
						$address_format = $shipping_country_info['address_format'];
					} else {
						$country = '';
						$iso_code_2 = '';
						$iso_code_3 = '';
						$address_format = '';
					}

					$this->load->model('localisation/zone');
					$zone_info = null;

				//	$zone_info = $this->model_localisation_zone->getZone($this->request->post['shipping_zone_id']);

					if ($zone_info) {
						$zone = $zone_info['name'];
						$zone_code = $zone_info['code'];
					} else {
						$zone = '';
						$zone_code = '';
					}

					$shipping_address_data = [
						'address_id'     => $address_id,
						'firstname'      => $firstname,
						'lastname'       => $lastname,
						'company'        => $this->request->post['shipping_company'],
						'address_1'      => $this->request->post['shipping_address_1'],
						'phone'      => $this->request->post['shipping_phone'],
						'city'           => $this->request->post['shipping_city'],
						'postcode'       => $this->request->post['shipping_postcode'],
						'zone_id'        => $this->request->post['shipping_zone_id'],
						'zone'           => isset($this->request->post['shipping_zone']) ? $this->request->post['shipping_zone'] : $zone,
						'zone_code'      => $zone_code,
						'country_id'     => $this->request->post['shipping_country_id'],
						'country'        => $country,
						'iso_code_2'     => $iso_code_2,
						'iso_code_3'     => $iso_code_3,
						'address_format' => $address_format,
						'custom_field'   => isset($this->request->post['shipping_custom_field']) ? $this->request->post['shipping_custom_field'] : []
					];

					// Add
					if ($this->request->post['account']) {
					 

						$shipping_address_data['address_id'] = $this->model_account_address->addAddress($customer_data['customer_id'], $shipping_address_data);
					}

					// Edit
					if ($this->customer->isLogged() && $shipping_address_data['address_id']) {
						$this->model_account_address->editAddress($shipping_address_data['address_id'], $shipping_address_data);
					}

					// Requires Approval
					if (!$customer_group_info['approval']) {
						$this->session->data['shipping_address'] = $shipping_address_data;
					}
				} elseif (!$customer_group_info['approval']) {
					$this->session->data['shipping_address'] = $this->session->data['payment_address'];

					// Remove the address id so if the customer changes their mind and requires changing a different shipping address it will create a new address.
					$this->session->data['shipping_address']['address_id'] = 0;
				}
			}

			// If everything good login
			if (!$customer_group_info['approval']) {
				if ($this->request->post['account']) {
					$this->customer->login($this->request->post['email'], $this->request->post['password']);

					// Create customer token
					$this->session->data['customer_token'] = oc_token(26);

					$json['success'] = $this->language->get('text_success_add');
				} elseif ($this->customer->isLogged()) {
					$json['success'] = $this->language->get('text_success_edit');
				} else {
					$json['success'] = $this->language->get('text_success_guest');
				}
			} else {
				// If account needs approval we redirect to the account success / requires approval page.
				$json['redirect'] = $this->url->link('account/success', 'language=' . $this->config->get('config_language'), true);
			}
		 

			if (isset($oldAddres) && $oldAddress['country_id'] != $this->session->data['shipping_address']['country_id'] ) {
			 ///unset($this->session->data['shipping_method']); it is handeled by the shipping ext now.
			 unset($this->session->data['shipping_methods']);
			// unset($this->session->data['payment_method']); payment methods are always the same geographically )
			// unset($this->session->data['payment_methods']);
			 $json['reset'] = 'true';
			}
	 



			// Clear any previous login attempts for unregistered accounts.
			$this->model_account_customer->deleteLoginAttempts($this->request->post['email']);
		}

	 
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
