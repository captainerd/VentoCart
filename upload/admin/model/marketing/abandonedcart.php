<?php
namespace Ventocart\Admin\Model\Marketing;
/**
 * Class Affiliate
 *
 * @package Ventocart\Admin\Model\Marketing
 */
class AbandonedCart extends \Ventocart\System\Engine\Model
{

    public function addOneNotice($customer_id, $session_id)
    {
        // Determine the identifier (either customer_id or session_id)
        $identifier = ($customer_id > 0) ? $customer_id : $session_id;

        // Get the current date for date_lastnotice
        $current_date = date('Y-m-d H:i:s');

        // Update the total_notices and date_lastnotice for the corresponding identifier
        $this->db->query("
            UPDATE `" . DB_PREFIX . "cart_abandoned` 
            SET 
                total_notices = total_notices + 1, 
                date_lastnotice = '" . $this->db->escape($current_date) . "' 
            WHERE 
                (customer_id = '" . (int) $identifier . "' OR session_id = '" . $this->db->escape($identifier) . "')
        ");
    }
    public function addOneClick($customer_id, $session_id)
    {
        // Determine the identifier (either customer_id or session_id)
        $identifier = ($customer_id > 0) ? $customer_id : $session_id;

        // Get the current date for date_last_click
        $current_date = date('Y-m-d H:i:s');

        // Update the date_last_click for the corresponding identifier
        $this->db->query("
            UPDATE `" . DB_PREFIX . "cart_abandoned` 
            SET 
                date_last_click = '" . $this->db->escape($current_date) . "' 
            WHERE 
                (customer_id = '" . (int) $identifier . "' OR session_id = '" . $this->db->escape($identifier) . "')
        ");
    }


    public function insertAbandonedCarts(): void
    {
        // Load the setting model to get the threshold value for abandoned carts
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');
        $threshold = isset($settings['abandonedcart_abandoned_threshold']) ? (int) $settings['abandonedcart_abandoned_threshold'] : 30;
        $deleteafter = isset($settings['abandonedcart_cart_memory']) ? (int) $settings['abandonedcart_cart_memory'] : 3;
        // Query to select abandoned carts, excluding those already present in cart_abandoned table
        $query = $this->db->query("
            SELECT 
                CASE 
                    WHEN c.customer_id != 0 THEN c.customer_id 
                    ELSE c.session_id 
                END AS identifier,
                c.session_id,
                c.customer_id
            FROM `" . DB_PREFIX . "cart` c
            LEFT JOIN `" . DB_PREFIX . "customer` cu ON c.customer_id = cu.customer_id
            LEFT JOIN `" . DB_PREFIX . "cart_abandoned` ca ON (c.customer_id = ca.customer_id OR c.session_id = ca.session_id)
            WHERE (c.customer_id != 0 OR (c.customer_id = 0 AND c.session_id != ''))
            AND c.date_added <= DATE_SUB(NOW(), INTERVAL $threshold DAY)
            AND ca.abandoned_id IS NULL
            GROUP BY 
                CASE 
                    WHEN c.customer_id != 0 THEN c.customer_id 
                    ELSE c.session_id 
                END;
        ");

        if ($query->num_rows > 0) {
            foreach ($query->rows as $row) {
                $session_id = $this->db->escape($row['session_id']);
                $customer_id = (int) $row['customer_id'];

                // Insert new record into the cart_abandoned table
                $this->db->query("
                INSERT INTO `" . DB_PREFIX . "cart_abandoned` (
                    `customer_id`,
                    `session_id`,
                    `total_notices`,
                    `date_last_click`,
                    `date_lastnotice`,
                    `click_count`
                ) VALUES (
                    " . ($customer_id > 0 ? (int) $customer_id : 0) . ",
                    " . (!empty($session_id) ? "'" . $this->db->escape($session_id) . "'" : 'NULL') . ",
                    0,
                    NULL,
                    NULL,
                    0
                )
            ");
            }
        }


        $query = $this->db->query("
    DELETE FROM `" . DB_PREFIX . "cart_abandoned`
    WHERE `date_lastnotice` < DATE_SUB(NOW(), INTERVAL " . (int) $deleteafter . " MONTH)
");


    }

    public function emailFromNewsletter($session_id)
    {
        // Sanitize the input to prevent SQL injection
        $session_id = $this->db->escape($session_id);

        // Query to get the email for the given session_id
        $query = $this->db->query("SELECT email FROM `" . DB_PREFIX . "newsletter` WHERE session_id = '" . $session_id . "' LIMIT 1");

        // Check if any result is returned
        if ($query->num_rows) {
            return $query->row['email'];
        } else {
            return null;  // Return null if no email is found
        }
    }


    public function getAbandonedCount(): int
    {

        // Load the setting model to get the threshold value for abandoned carts
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');
        $threshold = isset($settings['abandonedcart_abandoned_threshold']) ? (int) $settings['abandonedcart_abandoned_threshold'] : 30; // Default to 30 days if not set

        // Query to get total abandoned carts with customer language information
        $query = $this->db->query("
        SELECT COUNT(*) AS total
        FROM `" . DB_PREFIX . "cart_abandoned` ca
        LEFT JOIN `" . DB_PREFIX . "cart` c ON (
            ca.session_id = c.session_id 
            OR (ca.customer_id > 0 AND ca.customer_id = c.customer_id)
        )
        LEFT JOIN `" . DB_PREFIX . "customer` cu ON (
            ca.customer_id > 0 AND ca.customer_id = cu.customer_id
        )
        WHERE (c.customer_id != 0 OR (c.customer_id = 0 AND c.session_id != ''))
        AND c.date_added <= DATE_SUB(NOW(), INTERVAL $threshold DAY)
    ");

        return (int) $query->row['total'];
    }



    // Function to handle sending notices (to be implemented)
    public function getAbandoned($filter = []): array
    {
        // First insert newly abandoned carts
        $this->insertAbandonedCarts();

        // Load the setting model to get the threshold value for abandoned carts
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');
        $threshold = isset($settings['abandonedcart_abandoned_threshold']) ? (int) $settings['abandonedcart_abandoned_threshold'] : 30; // Default to 30 days if not set

        // Extract limit and page from the filter
        $limit = isset($filter['limit']) ? (int) $filter['limit'] : null; // Default is null (no limit)
        $page = isset($filter['page']) ? (int) $filter['page'] : 1; // Default is page 1
        $start = ($page - 1) * $limit; // Calculate offset based on the current page

        // Query to get abandoned carts with customer language information
        $sql = "
            SELECT 
                ca.*,
                c.date_added AS cart_date_added,
                cu.language_id,
                cu.store_id,
                cu.firstname,
                cu.email
            FROM `" . DB_PREFIX . "cart_abandoned` ca
            LEFT JOIN `" . DB_PREFIX . "cart` c ON (
                ca.session_id = c.session_id 
                OR (ca.customer_id > 0 AND ca.customer_id = c.customer_id)
            )
            LEFT JOIN `" . DB_PREFIX . "customer` cu ON (
                ca.customer_id > 0 AND ca.customer_id = cu.customer_id
            )
            WHERE (c.customer_id != 0 OR (c.customer_id = 0 AND c.session_id != ''))
            AND c.date_added <= DATE_SUB(NOW(), INTERVAL $threshold DAY)
            GROUP BY 
                CASE 
                    WHEN ca.customer_id > 0 THEN ca.customer_id
                    ELSE ca.session_id
                END
        ";

        // Add LIMIT and OFFSET if limit is set
        if ($limit) {
            $sql .= " LIMIT $start, $limit";
        }

        // Execute query
        $query = $this->db->query($sql);

        return $query->rows;
    }



    public function getTotalCarts(): int
    {
        // Load the setting model to get the threshold value
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');

        // Get the abandoned threshold setting
        $threshold = isset($settings['abandonedcart_abandoned_threshold']) ? (int) $settings['abandonedcart_abandoned_threshold'] : 0;

        if ($threshold <= 0) {
            return 0; // Return 0 if the threshold is not set or is invalid
        }

        // Calculate the date threshold for comparison (e.g., 30 days ago)
        $date_threshold = date('Y-m-d H:i:s', strtotime("-$threshold days"));



        // Query to get total carts
        $query = $this->db->query("
   SELECT COUNT(DISTINCT CASE 
                        WHEN c.customer_id != 0 THEN c.customer_id 
                        ELSE c.session_id 
                    END) AS total
FROM `" . DB_PREFIX . "cart` c
LEFT JOIN `" . DB_PREFIX . "customer` cu ON c.customer_id = cu.customer_id
LEFT JOIN `" . DB_PREFIX . "newsletter` n ON c.session_id = n.session_id
WHERE (c.customer_id != 0 OR (c.customer_id = 0 AND c.session_id != ''))
 AND c.admin = 0 AND c.date_added <= '" . $this->db->escape($date_threshold) . "'
AND (cu.newsletter = 1 OR n.session_id IS NOT NULL);
        ");
        if (!isset($query->row['total'])) {
            $query->row['total'] = 0;
        }
        return (int) $query->row['total'];
    }


    public function getTotalGuests(): int
    {
        // Load the setting model to get the threshold value
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');

        // Get the abandoned threshold setting
        $threshold = isset($settings['abandonedcart_abandoned_threshold']) ? (int) $settings['abandonedcart_abandoned_threshold'] : 0;

        if ($threshold <= 0) {
            return 0; // Return 0 if the threshold is not set or is invalid
        }

        // Calculate the date threshold for comparison (e.g., 30 days ago)
        $date_threshold = date('Y-m-d H:i:s', strtotime("-$threshold days"));

        // Query to get total guest carts
        $query = $this->db->query("
        SELECT COUNT(DISTINCT c.session_id) AS total
        FROM `" . DB_PREFIX . "cart` c
        LEFT JOIN `" . DB_PREFIX . "newsletter` n ON c.session_id = n.session_id
        WHERE c.customer_id = 0
        AND c.date_added <= '" . $this->db->escape($date_threshold) . "'
         AND c.admin = 0  AND n.session_id IS NOT NULL
          GROUP BY c.session_id
    ");
        if (!isset($query->row['total'])) {
            $query->row['total'] = 0;
        }
        return (int) $query->row['total'];
    }

    public function getTotalCustomers(): int
    {
        // Load the setting model to get the threshold value
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');

        // Get the abandoned threshold setting
        $threshold = isset($settings['abandonedcart_abandoned_threshold']) ? (int) $settings['abandonedcart_abandoned_threshold'] : 0;

        if ($threshold <= 0) {
            return 0; // Return 0 if the threshold is not set or is invalid
        }

        // Calculate the date threshold for comparison (e.g., 30 days ago)
        $date_threshold = date('Y-m-d H:i:s', strtotime("-$threshold days"));

        // Query to get total customer carts
        $query = $this->db->query("
            SELECT COUNT(DISTINCT c.customer_id) AS total
            FROM `" . DB_PREFIX . "cart` c
            LEFT JOIN `" . DB_PREFIX . "customer` cu ON c.customer_id = cu.customer_id
            WHERE c.customer_id != 0
            AND c.date_added <= '" . $this->db->escape($date_threshold) . "'
            AND cu.newsletter = 1  AND c.admin = 0 
          
        ");

        if (!isset($query->row['total'])) {
            $query->row['total'] = 0;
        }
        return (int) $query->row['total'];
    }


    public function getTotalGeneral(): int
    {
        // Query to get total unique carts (based on session_id or customer_id)
        $query = $this->db->query(" 
            SELECT COUNT(DISTINCT 
                CASE 
                    WHEN c.customer_id != 0 THEN c.customer_id 
                    ELSE c.session_id 
                END
            ) AS total
            FROM `" . DB_PREFIX . "cart` c
            WHERE (c.customer_id != 0 OR (c.customer_id = 0 AND c.session_id != '')) AND admin = 0 GROUP BY cart_id
        ");

        // Return the total or 0 if no result is found
        if (!isset($query->row['total'])) {
            $query->row['total'] = 0;
        }

        return (int) $query->row['total'];
    }

    public function getCartProducts($cart)
    {
        // Prepare customer_id and session_id conditions
        $customer_id = isset($cart['customer_id']) ? (int) $cart['customer_id'] : 0;
        $session_id = isset($cart['session_id']) ? $this->db->escape($cart['session_id']) : '';

        // Prepare the SQL query
        $sql = "
            SELECT 
                c.product_id, 
                pd.name AS product_name, 
                pi.image AS product_image
            FROM `" . DB_PREFIX . "cart` c
            LEFT JOIN `" . DB_PREFIX . "product_description` pd ON c.product_id = pd.product_id AND pd.language_id = " . (int) $this->config->get('config_language_id') . "
            LEFT JOIN `" . DB_PREFIX . "product_image` pi ON c.product_id = pi.product_id AND pi.sort_order = 1
            WHERE (
                ((c.customer_id != 0 AND c.customer_id = " . $customer_id . ") 
                OR 
                (c.session_id = '" . $session_id . "' AND c.customer_id = 0))  AND  admin = 0 
            )
            LIMIT 5
        ";

        // Execute the query
        $query = $this->db->query($sql);

        // Return the results
        return $query->rows;
    }

    public function getTotalGeneralWithDetails(int $start = 0, int $limit = 10): array
    {

        // Query to get unique IDs and customer details if applicable
        $query = $this->db->query("
            SELECT 
                CASE 
                    WHEN c.customer_id > 0 THEN c.customer_id 
                    ELSE c.session_id 
                END AS unique_id,
                CASE 
                    WHEN c.customer_id > 0 THEN CONCAT(customer.firstname, ' ', customer.lastname)
                    ELSE NULL
                END AS customer_name
            FROM `" . DB_PREFIX . "cart` c
            LEFT JOIN `" . DB_PREFIX . "customer` customer ON c.customer_id = customer.customer_id 
            WHERE  (c.customer_id > 0 OR (c.customer_id = 0 AND c.session_id != ''))  
            GROUP BY session_id 
            LIMIT " . (int) $start . ", " . (int) $limit . "
        ");


        // Prepare the data to return
        $result = [];
        foreach ($query->rows as $row) {
            // Determine the column to filter by (customer_id or session_id)

            $filterValue = $row['unique_id'];

            // Query to get cart details with product names
            $cartQuery = $this->db->query("
                SELECT 
                    c.*,
                    pd.name AS product_name
                FROM `" . DB_PREFIX . "cart` c
                LEFT JOIN `" . DB_PREFIX . "product_description` pd 
                    ON c.product_id = pd.product_id
                WHERE c.session_id = '$filterValue' AND  admin = 0 GROUP BY cart_id
            ");

            // Append the data to the result
            $result[] = [
                'unique_id' => $row['unique_id'],
                'customer_name' => $row['customer_name'],
                'cart' => $cartQuery->rows // Add cart details with product names
            ];
        }

        return $result;
    }




    public function getTotalGeneralAbandoned(): int
    {
        // Load the setting model to get the threshold value
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('abandonedcart');

        // Get the abandoned threshold setting
        $threshold = isset($settings['abandonedcart_abandoned_threshold']) ? (int) $settings['abandonedcart_abandoned_threshold'] : 0;

        if ($threshold <= 0) {
            return 0; // Return 0 if the threshold is not set or is invalid
        }

        // Calculate the date threshold for comparison
        $date_threshold = date('Y-m-d H:i:s', strtotime("-$threshold days"));

        // Query to get total unique carts (based on session_id or customer_id)
        $query = $this->db->query("
            SELECT COUNT(DISTINCT CASE 
                                    WHEN c.customer_id != 0 THEN c.customer_id 
                                    ELSE c.session_id 
                                END) AS total
            FROM `" . DB_PREFIX . "cart` c
            WHERE c.date_added <= '" . $this->db->escape($date_threshold) . "'
            AND (c.customer_id != 0 OR c.session_id != '')  AND c.admin='0'
        ");

        // Ensure the total is returned as an integer
        return isset($query->row['total']) ? (int) $query->row['total'] : 0;
    }


    public function getCartsPerDayLast30Days(): array
    {


        // Calculate the date 30 days ago from today
        $date_threshold = date('Y-m-d', strtotime('-30 days'));

        // Query to get the total carts per day for the last 30 days
        $query = $this->db->query("
        SELECT 
            DATE(c.date_added) AS date,
            COUNT(DISTINCT 
                CASE 
                    WHEN c.customer_id != 0 THEN c.customer_id 
                    ELSE c.session_id 
                END
            ) AS total
        FROM `" . DB_PREFIX . "cart` c
        WHERE c.date_added >= '" . $this->db->escape($date_threshold) . "'  AND c.admin='0'
        GROUP BY DATE(c.date_added)
        ORDER BY DATE(c.date_added)
    ");

        // Prepare the data for Chart.js
        $result = [];
        foreach ($query->rows as $row) {
            $result[$row['date']] = [
                'date' => $row['date'],
                'total' => (int) $row['total']
            ];
        }

        return $this->dateZeroFiller($result);
    }

    public function test(): void
    {
        die("yes");
    }
    public function getClicksReturns30Days(): array
    {
        // Calculate the date 30 days ago from today
        $date_threshold = date('Y-m-d', strtotime('-30 days'));

        // Query to get the total abandoned carts per day and click counts for the last 30 days
        $query = $this->db->query("
        SELECT 
            DATE(ca.date_last_click) AS date,
            COUNT(DISTINCT 
                CASE 
                    WHEN ca.customer_id != 0 THEN ca.customer_id 
                    ELSE ca.session_id 
                END
            ) AS total,
            SUM(ca.click_count) AS click_count
        FROM `" . DB_PREFIX . "cart_abandoned` ca
        WHERE ca.date_last_click >= '" . $this->db->escape($date_threshold) . "'
        GROUP BY DATE(ca.date_last_click)
        ORDER BY DATE(ca.date_last_click)
    ");

        // Prepare the data for Chart.js
        $result = [];
        foreach ($query->rows as $row) {
            $result[$row['date']] = [
                'date' => $row['date'],
                'total' => (int) $row['total'],
                'click_count' => (int) $row['click_count']
            ];
        }

        return $this->dateZeroFiller($result);
    }


    public function getAbandonedNewsLetterCartsPerDayLast30Days(): array
    {
        // Calculate the date 30 days ago from today
        $date_threshold = date('Y-m-d', strtotime('-30 days'));

        // Query to get the total carts per day for the last 30 days
        $query = $this->db->query("
            SELECT 
                DATE(c.date_added) AS date,
                COUNT(DISTINCT CASE 
                    WHEN c.customer_id != 0 THEN c.customer_id 
                    ELSE c.session_id 
                END) AS total
            FROM `" . DB_PREFIX . "cart` c
            LEFT JOIN `" . DB_PREFIX . "customer` cu ON c.customer_id = cu.customer_id
            LEFT JOIN `" . DB_PREFIX . "newsletter` n ON c.session_id = n.session_id
            WHERE (c.customer_id != 0 OR (c.customer_id = 0 AND c.session_id != ''))
            AND c.date_added >= '" . $this->db->escape($date_threshold) . "'
            AND (cu.newsletter = 1 OR n.session_id IS NOT NULL)  AND c.admin='0'
            GROUP BY DATE(c.date_added)
            ORDER BY DATE(c.date_added)
        ");

        // Prepare the data for Chart.js
        $result = [];
        foreach ($query->rows as $row) {
            $result[$row['date']] = [
                'date' => $row['date'],
                'total' => (int) $row['total']
            ];
        }

        return $this->dateZeroFiller($result);
    }


    public function getCartsPerDayLast30DaysMoreThan1Products(): array
    {
        // Calculate the date 30 days ago from today
        $date_threshold = date('Y-m-d', strtotime('-30 days'));

        // Query to get the total carts per day for the last 30 days where each cart has more than 1 product (card_id)
        $query = $this->db->query("
            SELECT 
                DATE(c.date_added) AS date,
                COUNT(DISTINCT c.session_id) AS total
            FROM `" . DB_PREFIX . "cart` c
            WHERE c.date_added >= '" . $this->db->escape($date_threshold) . "'  AND admin='0'
            GROUP BY DATE(c.date_added), c.session_id
            HAVING COUNT(c.cart_id) > 1
            ORDER BY DATE(c.date_added) DESC
        ");

        // Prepare the data for Chart.js
        $result = [];
        foreach ($query->rows as $row) {
            $result[$row['date']] = [
                'date' => $row['date'],
                'total' => (int) $row['total']
            ];
        }

        return $this->dateZeroFiller($result);
    }



    private function dateZeroFiller($result)
    {
        $date_threshold = date('Y-m-d', strtotime('-30 days'));
        while (strtotime($date_threshold) <= strtotime(date('Y-m-d'))) {
            if (!isset($result[$date_threshold])) {
                $result[$date_threshold] = [
                    'date' => $date_threshold,
                    'total' => 0 // Fixed the semicolon issue
                ];
            }
            $date_threshold = date('Y-m-d', strtotime($date_threshold . ' +1 day'));
        }
        ksort($result);
        // Return the updated result

        return $result;
    }
}