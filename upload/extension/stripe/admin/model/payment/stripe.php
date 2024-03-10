<?php

namespace Opencart\Admin\Model\Extension\Stripe\Payment;

require_once(DIR_EXTENSION . 'stripe/system/vendor/autoload.php');
class Stripe extends \Opencart\System\Engine\Model
{

    public function getPaymentData($order_id) {
        $query = $this->db->query("SELECT payment_data FROM `" . DB_PREFIX . "order` WHERE `order_id` = '" . (int)$order_id . "'");
    
        if ($query->num_rows) {
            return json_decode($query->row['payment_data'], true);
        } else {
            return array();
        }
    }
    
    
    public function getStripe()
	{

		if ($this->config->get('payment_stripe_environment') == 'live') {
			$stripe_secret_key = $this->config->get('payment_stripe_live_secret_key');
		} else {
			$stripe_secret_key = $this->config->get('payment_stripe_test_secret_key');
		}
		$stripe = new \Stripe\StripeClient($stripe_secret_key);
		return $stripe;
	}

    // To-Do: Leverage of webhooks
    public function install_webhooks(): void
	{
		$this->getStripe()->webhookEndpoints->create([
			'enabled_events' => [
				'customer.subscription.paused',
				'customer.subscription.deleted',
				'customer.subscription.resumed',
				'invoice.paid',


			],
			'url' => 'https://example.com/my/webhook/endpoint',
		]);

	}

}


?>