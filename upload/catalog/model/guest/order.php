<?php
namespace Ventocart\Catalog\Model\Guest;
/**
 * Class Guest
 *
 * @package Ventocart\Catalog\Model\Guest
 */
class Order extends \Ventocart\System\Engine\Model
{


    /**
     * Generates an initialization vector (IV) for encryption.
     *
     * @return string The 16-byte initialization vector (IV) for AES-256-CBC encryption.
     * 
     */
    private function generateIv()
    {

        return substr(hash('sha256', (string) $this->getPrivateKey()), 0, 16); // 16-byte IV for AES-256-CBC
    }

    /**
     * Encrypts an order ID.
     *
     * @param string $order_id The order ID that needs to be encrypted.
     * @return string The encrypted order ID.
     */
    public function encryptOrderId($order_id)
    {
        $iv = $this->generateIv(); // Generate IV
        $encrypted = openssl_encrypt((string) $order_id, 'aes-256-cbc', $this->getPrivateKey(), 0, $iv); // Encrypt
        return base64_encode($encrypted); // Encode to make it URL-safe
    }

    /**
     * Decrypts an encrypted order ID.
     *
     * @param string $encrypted_data The encrypted order ID that needs to be decrypted.
     * @return string The decrypted order ID.
     * 
     */
    public function decryptOrderId($encrypted_data)
    {
        $iv = $this->generateIv(); // Generate IV
        $encrypted = base64_decode($encrypted_data); // Decode the base64 string
        $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $this->getPrivateKey(), 0, $iv); // Decrypt
        return $decrypted;
    }
    /**
     * Returns private key for both namespaces
     *.
     * @return string 
     * 
     */

    private function getPrivateKey()
    {
        $filePath = DIR_VENTOCART . 'config.php';
        $constantName = 'SERVER_SECRET';
        $content = file_get_contents($filePath);
        if (preg_match("/define\\('$constantName',\\s*'(.*?)'\\);/", $content, $matches)) {
            return $matches[1];
        }
        return null;
    }


}
