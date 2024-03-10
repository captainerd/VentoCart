<?php

namespace Opencart\Catalog\Controller\Extension\Stripe\Cron;

use Exception;


class Subscriptions extends \Opencart\System\Engine\Controller
{

    //Stripe will automatically send invoices to customers according to your subscriptions settings. https://dashboard.stripe.com/account/billing/automatic
    //You may or may not want to turn addHistory notify parameter to false in the addHistory methods bellow
    public function index(int $cron_id, string $code, string $cycle, string $date_added, string $date_modified): void {
 

 
        $this->load->model('extension/stripe/payment/stripe');

        $this->log->write("Stripe Subscriptions cron running...");
        $expired = $this->model_extension_stripe_payment_stripe->getExipired();
     
        if (!empty($expired)) {
            foreach ($expired as $subscription) {
                $previous_info = json_decode($subscription['payment_api_data'], true);

                if (!empty($subscription['payment_id']) && (empty($previous_info) || !isset($previous_info['status']))) {

                    // Set to active to test an incomplete subscription to check against stripe status
                    $previous_info['status'] = 'active';
                }

                // dont run API for inactive,canceled subs
                if ($previous_info['status'] == 'active' || $previous_info['status'] == 'past_due') {
                
                    $stripe_sub = $this->model_extension_stripe_payment_stripe->getStripe()->subscriptions->retrieve($subscription['payment_id']);

                    //Set the current status
                  

                    $localStatus = $this->model_extension_stripe_payment_stripe->stripeStatusToLocalId($stripe_sub['status']);

                    // updateLocalSubscription() synchs local with stripe, updates local status to reflect stripe, payment id data and next date to re-check

                    $this->model_extension_stripe_payment_stripe->updateLocalSubscription(
                        $subscription['payment_id'],
                        $localStatus,
                        $stripe_sub['current_period_end'],
                        $stripe_sub
                    );
            
                    if ($stripe_sub['status'] == 'active' && $previous_info['status'] == 'active') {
                        //Was active, found to be active again, maybe create a new order
                     
                        $this->subscription_cycle($subscription['subscription_id']);

                    } else if ($previous_info['status'] == 'past_due' && $stripe_sub['status'] == 'active') {
                        $this->subscription_activate($subscription['subscription_id']);

                    } else {
                        $this->subscription_deactivate($subscription['subscription_id']);
                    }
                }
            }
        }

    }

    // A new subscription installed 
    public function subscription_setup($id)
    {
        $this->log->write("Subscription installed: ID #" . $id);
        // Your SaaS install/setup  code here

    }
    // A subscription past_due got paid
    public function subscription_activate($id)
    {
        // Create new order, status, send mail as cycle
        $this->subscription_cycle($id);

        // Your SaaS ususpend /reactivate code here

    }
 

    // Subscription was active, and found it is no longer active for the next cycle.
    public function subscription_deactivate($id)
    {
        $this->load->model('checkout/subscription');
        $this->model_checkout_subscription->addHistory($id, $this->config->get('config_subscription_failed_status_id'), '', true);
        $this->log->write("Subscription deactivated: ID #" . $id);

        // Your SaaS suspend/deactive code here

    }
    // A new subscription installed 
    public function subscription_cycle($id)
    {
       
        $this->load->model('extension/stripe/payment/stripe');
        $this->load->model('checkout/order');
        $this->load->model('checkout/subscription');
        $this->model_checkout_subscription->addHistory($id, $this->config->get('config_subscription_active_status_id'), 'Subscription renewal', true);

       $new_order_id =  $this->model_extension_stripe_payment_stripe->createOrder($id); // Generate a clone order of the fist order with current timestamps

       $this->model_checkout_order->addHistory($new_order_id, $this->config->get('payment_stripe_order_success_status_id'), 'Subscription renewal', false);

       $this->log->write("Subscription Renewed: ID #" . $id);
      

        // Any maintenance SaaS code for active subscriptions here

    }

}