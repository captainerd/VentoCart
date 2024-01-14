<?php
namespace Opencart\Catalog\Controller\Checkout;
class Address extends \Opencart\System\Engine\Controller {

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

	
	public function index(): array {
	 
	 

		$this->load->language('checkout/payment_address');

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


	 
		$data['error_upload_size'] = sprintf($this->language->get('error_upload_size'), $this->config->get('config_file_max_size'));
		$data['config_file_max_size'] = ((int)$this->config->get('config_file_max_size') * 1024 * 1024);

		$data['upload'] = $this->url->link('tool/upload', 'language=' . $this->config->get('config_language'));

		$this->load->model('account/address');

		$data['addresses'] = $this->model_account_address->getAddresses($this->customer->getId());

		if (isset($this->session->data['payment_address']['address_id'])) {
			$data['address_id'] = $this->session->data['payment_address']['address_id'];
		} else {
			$data['address_id'] = 0;
		}

		$this->load->model('localisation/country');

		$data['countries'] = $this->model_localisation_country->getCountries();

		// Custom Fields
		$data['custom_fields'] = [];

		$this->load->model('account/custom_field');

		$custom_fields = $this->model_account_custom_field->getCustomFields($this->customer->getGroupId());

		foreach ($custom_fields as $custom_field) {
			if ($custom_field['location'] == 'address') {
				$data['custom_fields'][] = $custom_field;
			}
		}

		$data['language'] = $this->config->get('config_language');

		return $data;
	}

	public function save(): void {
 

		if (!isset( $this->request->get['address_type'])) {
			return;
		}
		$address_type = $this->request->get['address_type'];
		if ( ($address_type != "payment" && $address_type != "shipping")) {
			return;
		}
	 
		$json = [];
		$this->load->language('checkout/'.$address_type.'_address');
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

		// Validate if customer is logged in or customer session data is not set
		if (!$this->customer->isLogged() || !isset($this->session->data['customer'])) {
			$json['redirect'] = $this->url->link('account/login', 'language=' . $this->config->get('config_language'), true);
		}

 

		if (!$json) {
			$keys = [
				'firstname',
				'lastname',
				'company',
				'address_1',
				'phone',
				'city',
				'postcode',
				'country_id',
				'zone_id', 
				'custom_field'
			];
		 
			foreach ($keys as $key) {
				if (!isset($this->request->post[$key])) {
					$this->request->post[$key] = '';
				}
			}

			if ((oc_strlen($this->request->post['firstname']) < 1) || (oc_strlen($this->request->post['firstname']) > 32)) {
				$json['error']['firstname'] = $this->language->get('error_firstname');
			}

			if ((oc_strlen($this->request->post['lastname']) < 1) || (oc_strlen($this->request->post['lastname']) > 32)) {
				$json['error']['lastname'] = $this->language->get('error_lastname');
			}

			if ((oc_strlen($this->request->post['address_1']) < 3) || (oc_strlen($this->request->post['address_1']) > 128)) {
				$json['error']['address_1'] =   $this->language->get('error_address_1');
			}

			if ((oc_strlen($this->request->post['city']) < 2) || (oc_strlen($this->request->post['city']) > 128)) {
				$json['error']['city'] = $this->language->get('error_city');
			}
	 
							//remove spaces, "-", and "( )" as phone formated by the user. 
	     $phonetest = str_replace(array(" ", "-", "(", ")"), "", $this->request->post['payment_phone']);
							//check against regular expression, it starts with + followed by numbers only, minimum 6 chars, max 15
		    if (!isset($this->request->post['payment_phone']) || !preg_match('/^\+[0-9]{6,15}$/', $phonetest)) {
				$json['error']['phone'] =  $this->language->get('error_phone');
			 }

			$this->load->model('localisation/country');

			$country_info = $this->model_localisation_country->getCountry((int)$this->request->post['country_id']);

			if ( oc_strlen($this->request->post['postcode']) < 2 || oc_strlen($this->request->post['postcode']) > 10) {
				$json['error']['postcode'] = $this->language->get('error_postcode');
			}

			if ($this->request->post['country_id'] == '') {
				$json['error']['country'] = $this->language->get('error_country');
			}

		 if ($this->request->post['zone_id'] == '') {
				//$json['error']['zone'] = $this->language->get('error_zone');
		 	}

			// Custom field validation
			$this->load->model('account/custom_field');

			$custom_fields = $this->model_account_custom_field->getCustomFields($this->customer->getGroupId());

			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'address') {
					if ($custom_field['required'] && empty($this->request->post['custom_field'][$custom_field['custom_field_id']])) {
						$json['error']['custom_field_' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
					} elseif (($custom_field['type'] == 'text') && !empty($custom_field['validation']) && !preg_match(html_entity_decode($custom_field['validation'], ENT_QUOTES, 'UTF-8'), $this->request->post['custom_field'][$custom_field['custom_field_id']])) {
						$json['error']['custom_field_' . $custom_field['custom_field_id']] = sprintf($this->language->get('error_regex'), $custom_field['name']);
					}
				}
			}
		}

		if (!$json) {
			// If no default address add it
			$address_id = $this->customer->getAddressId();

			if (!$address_id) {
				$this->request->post['default'] = 1;
			}

			$this->load->model('account/address');

			$json['address_id'] = $this->model_account_address->addAddress($this->customer->getId(), $this->request->post);

			$json['addresses'] = $this->model_account_address->getAddresses($this->customer->getId());
			if (!isset($this->request->post['sameaddress'])) {
				$this->session->data["payment_address"] = $this->model_account_address->getAddress($this->customer->getId(), $json['address_id']);
				$this->session->data["shipping_address"] = $this->session->data["payment_address"];
			} else {
			$this->session->data[$address_type ."_address"] = $this->model_account_address->getAddress($this->customer->getId(), $json['address_id']);

			}

			$json['success'] = $this->language->get('text_success');

			// Clear payment and shipping methods
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function address(): void {
		$this->load->language('checkout/register');
		if (!isset( $this->request->get['address_type'])) {
			return;
		}
		$address_type = $this->request->get['address_type'];
		if ( ($address_type != "payment" && $address_type != "shipping")) {
			return;
		}

		
 
		$this->load->language('checkout/'.$address_type.'_address');

		$json = [];

		if (isset($this->request->get['address_id'])) {
			$address_id = (int)$this->request->get['address_id'];
		} else {
			$address_id = 0;
		}

		if (!isset($this->session->data['customer'])) {
			$json['redirect'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'), true);
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

		// Validate if customer is logged in or customer session data is not set
		if (!$this->customer->isLogged() || !isset($this->session->data['customer'])) {
			$json['redirect'] = $this->url->link('account/login', 'language=' . $this->config->get('config_language'), true);
		}

 

		if (!$json) {
			$this->load->model('account/address');

			$address_info = $this->model_account_address->getAddress($this->customer->getId(), $address_id);

			if (!$address_info) {
				$json['error'] = $this->language->get('error_address');

				unset($this->session->data['payment_address']);
				unset($this->session->data['shipping_method']);
				unset($this->session->data['shipping_methods']);
				unset($this->session->data['payment_method']);
				unset($this->session->data['payment_methods']);
			}
		}

		if (!$json) {
			$this->session->data[$address_type ."_address"] = $address_info;

			$json['success'] = $this->language->get('text_success');

			// Clear payment and shipping methods
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}