<?php
namespace Ventocart\Catalog\Model\Guest;
class Newsletter extends \Ventocart\System\Engine\Model
{
    /**
     * Routes the email to the appropriate action handler.
     *
     * @param string $email The email address involved in the action.
     * @param string $action The action to be performed (e.g., 'subscribe', 'unsubscribe').
     * @return string Returns a status or message indicating the result of the routing.
     * 
     * This function ensures a single event handler can manage multiple email-related actions. 
     *  same event can send the appropriate email for both subscribing and unsubscribing.
     */
    public function route($email, $action): string
    {

        if (method_exists($this, $action)) {
            return $this->{$action}($email);
        }
        return null;
    }

    /**
     * Subscribes a user to the mailing list.
     *
     * @param string $email The email address to subscribe.
     * 
     * This function adds the provided email address to the subscription list. 
     * It ensures that the email address is valid and not already subscribed. 
     * Additional actions like sending a confirmation email can also be triggered here.
     */

    public function subscribe($email)
    {

        // Check if the email exists in the customer table
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer` WHERE `email` = '" . $this->db->escape($email) . "'");

        if ($query->num_rows > 0) {
            // If the email is found in the customer table, check the newsletter column
            if ($query->row['newsletter'] == 0) {
                // Update the newsletter column to 1 if it's currently 0
                $this->db->query("UPDATE `" . DB_PREFIX . "customer` SET `newsletter` = 1 WHERE `email` = '" . $this->db->escape($email) . "'");
                return 'text_success';
            } else {
                // If it's already 1, the user is already subscribed
                return 'text_already_subscribed';
            }
        }

        // Check if the email already exists in the newsletter table
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "newsletter` WHERE `email` = '" . $this->db->escape($email) . "' AND `store_id` = '" . (int) $this->config->get('config_store_id') . "'");

        if ($query->num_rows > 0) {
            return 'text_already_subscribed';
        }

        // Insert the new email into the newsletter table
        $this->db->query("INSERT INTO `" . DB_PREFIX . "newsletter` (`email`, `store_id`, `session_id`) VALUES ('" . $this->db->escape($email) . "', '" . (int) $this->config->get('config_store_id') . "', '" . $this->session->getId() . "')");

        return 'text_success';
    }

    /**
     * Unsubscribes a user from the mailing list.
     *
     * @param string $email The email address to unsubscribe.
     * 
     * This function removes the provided email address from the subscription list.
     * It ensures that the email is valid and currently subscribed before attempting removal.
     * Additional actions like sending a confirmation email or updating logs can also be performed here.
     */
    public function unsubscribe($email)
    {

        // Check if the email exists in the newsletter table
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "newsletter` WHERE `email` = '" . $this->db->escape($email) . "' AND `store_id` = '" . (int) $this->config->get('config_store_id') . "'");


        if ($query->num_rows > 0) {
            // Check if the email exists in the customer table


            // Delete the email from the newsletter table if it's not in the customer table
            $this->db->query("DELETE FROM `" . DB_PREFIX . "newsletter` WHERE `email` = '" . $this->db->escape($email) . "' AND `store_id` = '" . (int) $this->config->get('config_store_id') . "'");


            return 'text_unsubscribe_success';
        } else {

            $customer_query = $this->db->query("SELECT `newsletter` FROM `" . DB_PREFIX . "customer` WHERE `email` = '" . $this->db->escape($email) . "' AND `store_id` = '" . (int) $this->config->get('config_store_id') . "'");


            if ($customer_query->num_rows > 0) {
                if ($customer_query->row['newsletter'] == 1) {
                    // Update the newsletter column to 0 if it's currently 1
                    $this->db->query("UPDATE `" . DB_PREFIX . "customer` SET `newsletter` = 0 WHERE `email` = '" . $this->db->escape($email) . "'");
                    return 'text_unsubscribe_success';
                } else {
                    // If it's already 0, the user is already unsubscribed
                    return 'already_unsubscribed';
                }
            }
            return 'text_not_found';
        }
    }


    /**
     * Updates session data for guest users.
     *
     * @param string $new_session_id The new session ID for the current user session.
     * @param string $old_session_id The old session ID that needs to be synced or replaced.
     * 
     * This function is used by the `controller startup/customer` to sync the 'forever' cookie for guest users analytics.
     */
    public function updateSessions($new_session_id, $old_session_id)
    {

        $this->db->query("UPDATE `" . DB_PREFIX . "cart` SET `session_id` = '" . $this->db->escape($new_session_id) . "' WHERE `session_id` = '" . $this->db->escape($old_session_id) . "'");
        $this->db->query("UPDATE `" . DB_PREFIX . "newsletter` SET `session_id` = '" . $this->db->escape($new_session_id) . "' WHERE `session_id` = '" . $this->db->escape($old_session_id) . "'");
    }

    /**
     * Tracks one-click actions for abandoned carts.
     *
     * This function is used to log interactions related to one-click actions from users who abandoned their carts.
     */
    public function addOneClick()
    {
        $customer_id = $this->customer->getId();
        $session_id = $this->session->getId();

        // Get the current date for date_last_click
        $current_date = date('Y-m-d H:i:s');

        // Update the date_last_click and increment click_count for the corresponding identifier
        $this->db->query("
            UPDATE `" . DB_PREFIX . "cart_abandoned` 
            SET 
                date_last_click = '" . $this->db->escape($current_date) . "',
                click_count = click_count + 1
            WHERE 
                (customer_id = 0 AND session_id = '" . $this->db->escape($session_id) . "')
                OR (customer_id != 0 AND customer_id = '" . (int) $customer_id . "')
        ");
    }


    /**
     * Checks if a user is subscribed to the newsletter.
     *
     * This function checks two conditions:
     * 1. If the user is a registered customer and their `newsletter` field is set to 1.
     * 2. If the user's session ID exists in the `newsletter` table.
     * 
     * @return bool Returns true if the user is a subscriber, false otherwise.
     */
    public function isSubscriber(): bool
    {
        // Get customer ID and session ID
        $customer_id = $this->customer->getId();
        $session_id = $this->session->getId();

        // Check if the user is a registered customer and subscribed to the newsletter
        if ($customer_id) {
            $query = $this->db->query("SELECT `newsletter` FROM `" . DB_PREFIX . "customer` WHERE `customer_id` = '" . (int) $customer_id . "'");

            if ($query->num_rows > 0 && $query->row['newsletter'] == 1) {
                return true; // Registered customer with subscription
            }
        }

        // Check if the user is a guest and their session ID exists in the newsletter table
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "newsletter` WHERE `session_id` = '" . $this->db->escape($session_id) . "'");

        if ($query->num_rows > 0) {
            return true; // Guest user with subscription
        }

        return false; // Not subscribed
    }
}
