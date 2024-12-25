<?php
namespace Ventocart\Admin\Model\Marketing;
/**
 * Class GiftCards
 *
 * @package Ventocart\Admin\Model\Marketing
 */
class GiftCards extends \Ventocart\System\Engine\Model
{

    public function updateGiftCard($data): void
    {
        // Extract data from the $data array
        $store_id = isset($data['store_id']) ? (int) $data['store_id'] : 0;
        $expires = isset($data['expires']) ? (int) $data['expires'] : 12;
        $giftcard_id = isset($data['giftcard_id']) ? (int) $data['giftcard_id'] : 0;
        $physical = isset($data['physical']) ? (int) $data['physical'] : 0;
        $theme_image = isset($data['giftcardimage']) ? $data['giftcardimage'] : '';
        $card_name = isset($data['gift_card_name']) ? json_encode($data['gift_card_name']) : '';
        $fixed = isset($data['card_type']) ? $data['card_type'] : 0;
        $amount = isset($data['amount']) ? json_encode($data['amount']) : '';
        $date_added = date('Y-m-d H:i:s');

        if ($giftcard_id === 0) {
            // Insert new gift card
            $sql = "INSERT INTO " . DB_PREFIX . "giftcards SET 
                    theme_image = '" . $this->db->escape($theme_image) . "',
                    fixed = '" . (int) $fixed . "',
                    amount = '" . $this->db->escape($amount) . "',
                    card_name = '" . $this->db->escape($card_name) . "',
                    store_id = '" . $this->db->escape($store_id) . "',
                    expires_months = '" . $this->db->escape($expires) . "',
                    physical  = '" . $this->db->escape($physical) . "',
                    date_added = '" . $this->db->escape($date_added) . "'";

            $this->db->query($sql);
        } else {
            // Update existing gift card
            $sql = "UPDATE " . DB_PREFIX . "giftcards SET 
                    theme_image = '" . $this->db->escape($theme_image) . "',
                    fixed = '" . (int) $fixed . "',
                    amount = '" . $this->db->escape($amount) . "',
                    card_name = '" . $this->db->escape($card_name) . "',
                    store_id = '" . $this->db->escape($store_id) . "',
                    expires_months = '" . $this->db->escape($expires) . "',
                    physical  = '" . $this->db->escape($physical) . "' 
                    WHERE giftcard_id = '" . (int) $giftcard_id . "'";


            $this->db->query($sql);
        }
    }
    public function getGiftCards(array $filter): array
    {
        $start = isset($filter['start']) ? (int) $filter['start'] : 0;
        $limit = isset($filter['limit']) ? (int) $filter['limit'] : 10;

        $sql = "SELECT * FROM " . DB_PREFIX . "giftcards";

        if (isset($filter['search']) && !empty($filter['search'])) {
            $search = $this->db->escape($filter['search']);
            $sql .= " WHERE card_name LIKE '%" . $search . "%'";
        }

        $sql .= " ORDER BY date_added DESC";
        $sql .= " LIMIT " . (int) $start . "," . (int) $limit;

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getTotalGiftCards(array $filter): int
    {
        $sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "giftcards";

        if (isset($filter['search']) && !empty($filter['search'])) {
            $search = $this->db->escape($filter['search']);
            $sql .= " WHERE card_name LIKE '%" . $search . "%'";
        }

        $query = $this->db->query($sql);

        return (int) $query->row['total'];
    }

    public function deleteGiftCard($giftcard_id)
    {
        // Use the database connection to delete the gift card
        $this->db->query("DELETE FROM " . DB_PREFIX . "giftcards WHERE giftcard_id = " . (int) $giftcard_id);
    }

    public function getTotalCustomerGiftCards()
    {

        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_giftcard");

        return $query->row['total'];
    }

    public function getTotalPurchasedGiftCards()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_giftcard WHERE status >= 1");

        return $query->row['total'];
    }

    public function getTotalGiftCardBalances()
    {
        $query = $this->db->query("SELECT SUM(balance) AS total_balance FROM " . DB_PREFIX . "customer_giftcard");

        return $query->row['total_balance'] !== null ? $query->row['total_balance'] : 0;
    }



    public function GetAccountCardsTotal($filter)
    {
        $sql = "SELECT COUNT(*) AS total
                FROM " . DB_PREFIX . "customer_giftcard gcg
                LEFT JOIN " . DB_PREFIX . "giftcards g ON gcg.giftcard_id = g.giftcard_id";

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
    public function GetAccountCards($filter)
    {
        $sql = "SELECT gcg.giftcard_id, gcg.balance, gcg.amount, gcg.giftcard_code, gcg.customer_id, gcg.date_added, gcg.sender_email, 
                       g.card_name, g.theme_image, gcg.status, c.firstname, c.lastname
                FROM " . DB_PREFIX . "customer_giftcard gcg
                LEFT JOIN " . DB_PREFIX . "giftcards g ON gcg.giftcard_id = g.giftcard_id
                LEFT JOIN " . DB_PREFIX . "customer c ON gcg.customer_id = c.customer_id  
             ";

        // Filter by status if provided
        if (isset($filter['status']) && !empty($filter['status'])) {
            $sql .= " AND gcg.status = '" . (int) $filter['status'] . "'";
        }

        // Filter by balance if provided
        if (isset($filter['balance']) && $filter['balance'] > 0) {
            $sql .= " AND gcg.balance > 0";
        }

        $sql .= " ORDER BY gcg.status DESC, gcg.date_added DESC";

        // Apply pagination if limit and start are provided
        if (isset($filter['limit']) && isset($filter['start'])) {
            $sql .= " LIMIT " . (int) $filter['start'] . ", " . (int) $filter['limit'];
        }

        $query = $this->db->query($sql);
        $language_id = $this->config->get('config_language_id');

        // Process card names based on language
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


}