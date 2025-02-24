<?php
namespace Ventocart\Catalog\Model\GiftCards;

/**
 * GiftCard Model
 *
 * @package Ventocart\Catalog\Model\GiftCards
 */
class GiftCard extends \Ventocart\System\Engine\Model
{
    /**
     * Retrieve the list of gift cards with pagination.
     *
     * @param int $start The starting index for pagination
     * @param int $limit The limit of records to return
     * @param array $filters Optional filters for gift cards (e.g, physical)
     *
     * @return array List of gift cards
     */
    public function getGiftCards($start = 0, $limit = 10, $filters = []): array
    {

        $language_id = $this->config->get('config_language_id');
        $sql = "SELECT * FROM " . DB_PREFIX . "giftcards";

        // Apply filters if available
        $filterConditions = [];

        if (isset($filters['physical'])) {
            $filterConditions[] = "physical = '" . (int) $filters['physical'] . "'";
        }
        if (isset($filters['giftcard_id'])) {
            $filterConditions[] = "giftcard_id = '" . (int) $filters['giftcard_id'] . "'";
        }

        // If there are filter conditions, add WHERE clause
        if (!empty($filterConditions)) {
            $sql .= " WHERE " . implode(" AND ", $filterConditions);
        }


        $sql .= " LIMIT " . (int) $start . ", " . (int) $limit;
        $query = $this->db->query($sql);

        $giftcards = $query->rows;

        // Loop through each gift card and modify the card_name
        foreach ($giftcards as &$giftcard) {

            $card_name = json_decode($giftcard['card_name'], true);
            $prices = json_decode($giftcard['amount'], true);

            if (is_array($prices)) {
                foreach ($prices as $price) {
                    $newprice[] = $this->currency->format($price, $this->session->data['currency']);
                }
                $giftcard['amount'] = $newprice;
                $giftcard['amountcl'] = $prices;
            } else {
                $prices = false;
            }

            if (isset($card_name[$language_id])) {
                $giftcard['card_name'] = $card_name[$language_id];
            } else {
                $giftcard['card_name'] = reset($card_name); // Or provide a default string
            }
        }

        return $giftcards;
    }


    /**
     * Get the total number of gift cards
     *
     * @param array $filters Optional filters for gift cards (e.g.,  , physical)
     *
     * @return int The total number of gift cards
     */
    public function getTotalGiftCards($filters = []): int
    {

        $sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "giftcards ";
        if (!empty($filters['physical'])) {
            $sql .= " AND physical = '" . (int) $filters['physical'] . "'";
        }
        $query = $this->db->query($sql);

        return (int) $query->row['total'];
    }

    /**
     * insert new giftcard code to the database
     * 
     * @param string $data The gift card code.
     * @return int The gift card id
     */
    public function addCustomerGiftCard($data)
    {
        // Prepare data for insert
        $sql = "INSERT INTO " . DB_PREFIX . "customer_giftcard 
                SET giftcard_id = '" . (int) $data['giftcard_id'] . "',
                    customer_id = '" . (int) $data['customer_id'] . "',
                    message = '" . $this->db->escape($data['message']) . "',
                    receiver_email = '" . $this->db->escape($data['receiver_email']) . "',
                    sender_email = '" . $this->db->escape($data['sender_email']) . "',
                    receiver_name = '" . $this->db->escape($data['receiver_name']) . "',
                    sender_name = '" . $this->db->escape($data['sender_name']) . "',
                    balance = '" . (float) $data['amount'] . "',
                    amount = '" . (float) $data['amount'] . "',
                    physical = '" . (boolean) (isset($data['physical']) ? 1 : 0) . "',
                    expires = '" . (isset($data['expires']) ? $data['expires'] : 0) . "',
                    status = '" . (isset($data['status']) ? (float) $data['status'] : 0) . "',
                    giftcard_code = '" . $this->db->escape($data['giftcard_code']) . "',
                    date_added = NOW()";

        // Execute the insert query
        $this->db->query($sql);
        return $this->db->getLastId();
    }

    /**
     * Lookup a gift card by its unique redemption code.
     * 
     * @param string $code The gift card code.
     * @return array The gift card data if found, otherwise null.
     */
    public function lookupCardCode($code)
    {
        // Prepare SQL query to find the gift card with the provided code
        $sql = "SELECT * FROM " . DB_PREFIX . "customer_giftcard 
                WHERE giftcard_code = '" . $this->db->escape($code) . "' 
                LIMIT 1";

        $query = $this->db->query($sql);
        if ($query->num_rows) {
            return $query->row;
        } else {
            return []; // No gift card found
        }
    }

    /**
     * Generate a unique gift card code using one email and a random large number.
     * It will keep generating codes until it finds a unique one.
     * 
     * @param string $email The email address.
     * @return string The generated code in the format "VEXX-XXXX-XXXX-XXXX".
     */
    public function generateGiftCardCode($email)
    {
        // Define a flag to control the loop
        $isUnique = false;
        $giftCardCode = '';

        // Keep generating the code until a unique one is found
        while (!$isUnique) {
            // Combine the email and a random large number
            $combinedString = $email . uniqid(rand(1000000, 9999999), true);
            $hash = hash('sha256', $combinedString);
            $dynamicPrefix = strtoupper(substr(hash('sha256', $email), 0, 2));
            $giftCardCode = 'VE' . $dynamicPrefix . '-' . strtoupper(substr($hash, 0, 4)) . '-' . strtoupper(substr($hash, 4, 4)) . '-' . strtoupper(substr($hash, 8, 4));
            $existingGiftCard = $this->lookupCardCode($giftCardCode);

            // If no existing card is found, the code is unique
            if (empty($existingGiftCard)) {
                $isUnique = true;
            }
        }

        return $giftCardCode;
    }

    /**
     * Process a gift card based on the order product details.

     * @param array $order_product 
     * @return void                
     */


    public function processGiftCard($order_product): array
    {

        // Initialize an empty array to store gift card details
        $giftcards = [];
        $store_info = [];
        $this->load->model('setting/store');



        // Fetch the gift card entry from the database
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_giftcard 
                                    WHERE customer_giftcard_id = '" . (int) $order_product['product_id'] . "'");

        if ($query->num_rows) {
            $giftcard = $query->row;
            $giftcard_info = $this->getGiftCard($giftcard['giftcard_id']);

            $expires_months = isset($giftcard_info['expires_months']) ? (int) $giftcard_info['expires_months'] : 12; // Default to 12 months if not set
            $expires_date = date('Y-m-d', strtotime('+' . $expires_months . ' months'));


            $store_info = $this->model_setting_store->getStore();
            // Update the original gift card entry
            $this->db->query("UPDATE " . DB_PREFIX . "customer_giftcard 
                               SET status = 1, 
                                   balance = '" . (float) $order_product['price'] . "', 
                                   expires = '" . $expires_date . "' ,
                                   amount = '" . (float) $order_product['price'] . "' 
                               WHERE customer_giftcard_id = '" . (int) $giftcard['customer_giftcard_id'] . "'");

            // Add the first gift card to the array
            $code = $this->generateGiftCardCode($giftcard['sender_email']);
            $giftacardname = explode("-", $order_product['name']);
            $giftacardname = $giftacardname[0];
            $giftcards[] = [
                'giftcard_id' => $giftcard['giftcard_id'],
                'giftcard_name' => $giftacardname,
                'receiver_name' => $giftcard['receiver_name'],
                'receiver_email' => $giftcard['receiver_email'],
                'sender_name' => $giftcard['sender_name'],
                'sender_email' => $giftcard['sender_email'],
                'message' => $giftcard['message'],
                'balance' => (float) $order_product['price'],
                'giftcard_code' => $giftcard['giftcard_code'],
                'theme_image' => $store_info['url'] . '/?route=giftcards/giftcard.getGiftCardImage&card=' . $giftcard['giftcard_id'],
                'expires' => $expires_date,
                'status' => 1,
                'date_added' => date('Y-m-d H:i:s')
            ];

            // By checkout time, there is already one giftcard entry for the order, if quantity was more than 1, we add the rest now.
            if ((int) $order_product['quantity'] > 1) {
                $quantity = (int) $order_product['quantity'];
                $price = (float) $order_product['price'];
                $total = (float) $order_product['total'];

                // Validate the total matches quantity * price
                if ($total === $quantity * $price) {
                    for ($i = 1; $i < $quantity; $i++) {
                        $code = $this->generateGiftCardCode($giftcard['sender_email']);
                        // Clone the gift card for each additional quantity
                        $giftcard['amount'] = $price;
                        $giftcard['giftcard_code'] = $code;
                        $giftcard['status'] = 1;
                        $giftcard['giftcard_name'] = $giftacardname;
                        $giftcard['expires'] = $expires_date;
                        $this->addCustomerGiftCard($giftcard);

                        $giftcard['theme_image'] = $store_info['url'] . '?route=giftcards/giftcard.getGiftCardImage&card=' . $giftcard['giftcard_id'];

                        // Add each new gift card to the array
                        $giftcards[] = $giftcard;
                    }
                } else {
                    // Log a mismatch in total, quantity, and price
                    $this->log->write("Mismatch in gift card quantity and total for order_product_id: " . $order_product['order_product_id']);
                }
            }
        }
        $giftcards['store_info'] = $store_info;
        // Return the array of gift cards to event handler for mailing
        return $giftcards;
    }


    public function getGiftCard($giftcard_id)
    {
        $card_id = $giftcard_id ?? 0;
        $filters = ['giftcard_id' => $card_id];
        $this->load->model('giftcards/giftcard');
        $card = $this->getGiftCards(0, 1, $filters)[0];
        return $card;
    }

    public function redeemable(string $code): bool
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_giftcard 
            WHERE giftcard_code = '" . $this->db->escape($code) . "' 
            AND status = " . (int) 1 . " 
            AND balance > 0");

        return $query->num_rows > 0;
    }

    public function redeemCard(string $code, int $customerId): bool
    {
        $this->db->query("UPDATE " . DB_PREFIX . "customer_giftcard 
            SET status = 2, 
                customer_id = '" . (int) $customerId . "' 
            WHERE giftcard_code = '" . $this->db->escape($code) . "' 
            AND status = 1");

        // Check if the update was successful
        return $this->db->countAffected() > 0;
    }
    public function getCustomerNewGiftCard(string $code)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_giftcard 
    WHERE giftcard_code = '" . $this->db->escape($code) . "' 
    AND status = " . (int) 1 . " 
    AND balance > 0");
        return $query->row;
    }


    public function GetAccountCards($customer_id, $filter)
    {
        $sql = "SELECT gcg.giftcard_id, gcg.balance, gcg.amount, gcg.date_added, gcg.sender_email, g.card_name, g.theme_image, gcg.expires
                FROM " . DB_PREFIX . "customer_giftcard gcg
                LEFT JOIN " . DB_PREFIX . "giftcards g ON gcg.giftcard_id = g.giftcard_id
                WHERE gcg.customer_id = '" . (int) $customer_id . "'";

        if (isset($filter['status']) && !empty($filter['status'])) {
            $sql .= " AND gcg.status = '" . (int) $filter['status'] . "'";
        }

        if (isset($filter['balance']) && $filter['balance'] > 0) {
            $sql .= " AND gcg.balance > 0";
        }

        $sql .= " ORDER BY gcg.date_added DESC";

        if (isset($filter['limit']) && isset($filter['start'])) {
            $sql .= " LIMIT " . (int) $filter['start'] . ", " . (int) $filter['limit'];
        }
        $query = $this->db->query($sql);
        $language_id = $this->config->get('config_language_id');

        foreach ($query->rows as &$giftcard) {

            $card_name = isset($giftcard['card_name']) ? json_decode($giftcard['card_name'], true) : [];
            if (isset($card_name[$language_id])) {
                $giftcard['card_name'] = $card_name[$language_id];
            } else {
                $giftcard['card_name'] = reset($card_name); // Or provide a default string
            }
        }


        return $query->rows;
    }

    // for pagination
    public function GetAccountCardsTotal($customer_id, $filter)
    {
        $sql = "SELECT COUNT(*) AS total
                FROM " . DB_PREFIX . "customer_giftcard gcg
                LEFT JOIN " . DB_PREFIX . "giftcards g ON gcg.giftcard_id = g.giftcard_id
                WHERE gcg.customer_id = '" . (int) $customer_id . "'";

        if (isset($filter['status']) && !empty($filter['status'])) {
            $sql .= " AND gcg.status = '" . (int) $filter['status'] . "'";
        }

        if (isset($filter['balance']) && $filter['balance'] > 0) {
            $sql .= " AND gcg.balance > 0";
        }

        // Run the query to get the total count
        $query = $this->db->query($sql);

        return $query->row['total'];
    }

    public function GetTotalBalance($customer_id)
    {
        $sql = "SELECT SUM(balance) AS total_balance
                FROM " . DB_PREFIX . "customer_giftcard
                WHERE status = 2 AND customer_id = '" . (int) $customer_id . "' AND expires > NOW() ";

        $query = $this->db->query($sql);


        return $query->row['total_balance'] ? $query->row['total_balance'] : 0;
    }

    public function chargeAccount($customer_id, $amount)
    {
        $remaining = $amount;

        // Query active and unexpired gift cards with a positive balance
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_giftcard 
                                   WHERE customer_id = '" . (int) $customer_id . "' 
                                   AND balance > 0 
                                   AND status = 2
                                   AND expires > NOW() 
                                   ORDER BY expires ASC, balance ASC");

        $giftcards = $query->rows; // Fetch all matching gift cards

        foreach ($giftcards as &$giftcard) {
            if ($remaining <= 0) {
                break; // Stop if the required amount is already fulfilled
            }

            $deduction = min($giftcard['balance'], $remaining); // Take as much as needed or available
            $remaining -= $deduction; // Reduce the remaining amount
            $giftcard['balance'] -= $deduction; // Reduce the card's balance

            // Update the database with the new balance for the specific card
            $this->db->query("UPDATE " . DB_PREFIX . "customer_giftcard 
                              SET balance = '" . (float) $giftcard['balance'] . "' 
                              WHERE customer_giftcard_id  = '" . (int) $giftcard['customer_giftcard_id'] . "'");
        }

        return $remaining; // Return the remaining amount if not fully covered
    }





}
