<?php

/* Backend API  

Documentation: 

https://ventocart.com/en-gb/documentation/backendapi?route=cms/blog.info


*/

class VentocartAPI
{
    private $username;
    private $key;

    private $URL;

    private $apitoken;

    // Constructor that accepts username and key, makes the login request
    public function __construct($URL, $username, $key)
    {
        $this->URL = $URL;
        $this->username = $username;
        $this->key = $key;
        $this->apitoken = $this->login();
    }

    // Method to log in and retrieve the API token
    private function login()
    {
        $url = $this->URL . '/?route=api/account/login';
        $data = [
            'username' => $this->username,
            'key' => $this->key
        ];

        $response = $this->makeRequest($url, 'POST', $data);

        echo print_r($response);
        if (isset($response['success']) && $response['success'] == 'text_success') {
            return $response['apitoken'];
        } else {
            throw new Exception("Login failed");
        }

    }

    // Method to make API requests with the token
    private function makeRequest($url, $method, $data = [])
    {
        $ch = curl_init();

        // Set the request headers
        $headers = ['Content-Type: application/x-www-form-urlencoded'];

        // Append the apitoken as a GET parameter if the method is GET
        if ($method == 'GET') {
            $url .= (strpos($url, '?') === false ? '?' : '&') . 'apitoken=' . $this->apitoken;
        } else {
            // If the method is POST, add the apitoken to the post data
            $data['apitoken'] = $this->apitoken;
        }

        // cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        $response = curl_exec($ch);
        curl_close($ch);
        print_r($response);

        return json_decode($response, true);
    }


    // Help method
    public function help()
    {

        $url = $this->URL . '?route=api/sale/orders.shortDocumentaton';

        return $this->makeRequest($url, 'GET');

    }

    // Orders method
    public function orders()
    {
        $url = $this->URL . '?route=api/sale/orders';
        return $this->makeRequest($url, 'GET');
    }

    // Order Info method to get detailed information for a specific order
    public function orderInfo($order_id)
    {
        $url = $this->URL . '?route=api/sale/orders.info';
        $data = [
            'order_id' => $order_id
        ];
        return $this->makeRequest($url, 'POST', $data);
    }
}

// Example usage:
try {
    // Initialize with your username and key
    $ventocartAPI = new VentocartAPI('http://ventocart.lan/cp-natsos/', 'Default', 'xAajzSqmAuMoRD6isBuwAIOUVwd7j3RS8cyEfnGPWMvx88WYzTZNSvPzIEjDP4WPRfgAV8uKOzCUV7kskSpFYM3to26YB1Ckyv4uTcLDfjUoSJvhF3CZx4ENSXGR32BUNdRQ0O33zbaV0qSwb06ilWmS3L5OpTRqKZawAqVImLeD3QnvqqpintThvXITNTOMhzKqnoD5WALuiCOyX322YKD8QVjlCKFi1DTgTwzxmCqlDrQkO4hrpiZkY3v5YBgl');

    // Call the help method
    $helpResponse = $ventocartAPI->help();

    print_r($helpResponse);

    $helpResponse = $ventocartAPI->orders();

    print_r($helpResponse);

    //$helpResponse = $ventocartAPI->orderInfo('12');

    //print_r($helpResponse);


} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>