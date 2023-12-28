<?php

namespace Opencart\Catalog\Model\Extension\Stripe\Payment;
class  Stripe extends \Opencart\System\Engine\Model  {
	public function getMethod($address, $total) {

	 
		$this->load->language('extension/stripe/payment/stripe');

		$status = true;

		$method_data = array();

		if ($status) {
			$method_data = array(
				'code'       => 'stripe',
				'title'      => $this->language->get('text_title'),
				'terms'      => '',
				'sort_order' => $this->config->get('stripe_sort_order')
			);
		}

		return $method_data;
	}
	public function getMethods(array $address = []): array {
		$method_data = [];
	
		if (empty($address) || !isset($address['country_id']) || !isset($address['zone_id'])) {
			$status = true;
		} else {
			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone_to_geo_zone` WHERE `geo_zone_id` = '" . (int)$this->config->get('payment_stripe_geo_zone_id') . "' AND `country_id` = '" . (int)$address['country_id'] . "' AND (`zone_id` = '" . (int)$address['zone_id'] . "' OR `zone_id` = '0')");
	
			if (!$this->config->get('payment_stripe_geo_zone_id')) {
				$status = true;
			} elseif ($query->num_rows) {
				$status = true;
			} else {
				$status = false;
			}
		}
	
		if ($status) {
			$option_data['stripe'] = [
				'code' => 'stripe.stripe',
				'name' => $this->config->get('payment_stripe_title') ?: 'Pay with Stripe'
			];
	
			$method_data = [
				'code'       => 'stripe',
				'name'       => $this->config->get('payment_stripe_title') ?: 'Pay with Stripe',
				'option'     =>  $option_data,
				'sort_order' => $this->config->get('payment_stripe_sort_order')
			];
		}
	
		return $method_data;
	}
	public function log($file, $line, $caption, $message){

		if(!$this->config->get('payment_stripe_debug')){
			return;
		}

		$iso_time = date('c');
		$filename = 'stripe-'.strstr($iso_time, 'T', true).'.log';
	
		$log = new Log($filename);
		$msg = "[" . $iso_time . "] ";
		$msg .= "<" . $file . "> ";
		$msg .= "#" . $line . "# ";
		$msg .= "~" . $caption . "~ ";

		if(is_array($message)){
			$msg .= print_r($message, true);
		} else {
			$msg .= PHP_EOL . $message;
		}

		$msg .= PHP_EOL . PHP_EOL;		
		$log->write($msg);
	}
}
