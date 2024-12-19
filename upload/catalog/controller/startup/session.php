<?php
namespace Ventocart\Catalog\Controller\Startup;
/**
 * Class Session
 *
 * @package Ventocart\Catalog\Controller\Startup
 */
class Session extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 * @throws \Exception
	 */
	public function index(): void
	{
		$session = new \Ventocart\System\Library\Session($this->config->get('session_engine'), $this->registry);
		$this->registry->set('session', $session);


		$api_output = isset($this->request->get['apitoken']) ? true : false;
		// The API Client system use a combination of public/private API keys (simple hashing) and a nonce
		// without nonce nothing is served.
		// $this->customer->isApiClient(); the client is an API
		// $this->customer->isApiSigned(); the client has a signed sessionid with public_key
		if ($api_output) {
			$this->response->addHeader('Access-Control-Expose-Headers: apitoken, nonce');
			$this->response->addHeader('Content-Type: application/json');
			$oldNonce = "";
			$apiClientSigned = false;
			if (isset($this->request->get['apitoken'])) {
				$sessiontoken = base64_decode($this->request->get['apitoken'], false);
				$sessiontoken = json_decode($sessiontoken, true);
				if (isset($sessiontoken['nonce'])) {
					$oldNonce = $sessiontoken['nonce'];
				} else {
					$sessiontoken['nonce'] = null;
					$oldNonce = null;
				}
				if (isset($sessiontoken['sessionId']) && isset($sessiontoken['consumer'])) {
					$signingKey = hash('sha256', API_PRIVATE_KEY . $sessiontoken['sessionId']);
					$signingKey = hash('sha256', API_PUBLIC_KEY . $signingKey);

					if ($this->verifySignature($sessiontoken['sessionId'], $sessiontoken['consumer'], $signingKey)) {
						$apiClientSigned = true;

					}
					$session_id = $sessiontoken['sessionId'];
				} else {
					$session_id = '';
					$this->response->addHeader('NewSession: 1');
				}
			} else {
				$this->response->addHeader('NewSession: 1');
				$session_id = '';
			}

			$session_id = $session->start($session_id);
			$session->data['apiSigned'] = $apiClientSigned;
			// Validate the last nonce before setting a new one
			if ($sessiontoken['nonce'] != $oldNonce) {
				$this->response->addHeader('FailedNonce: 1');
				exit;

			}


			$session->data['nonce'] = bin2hex(random_bytes(16));
			$this->response->addHeader('nonce: ' . $session->data['nonce']);
			// Key for signing from the client
			$signingKey = hash('sha256', API_PRIVATE_KEY . $session_id);

			$session_expiry_time = time() + (int) $this->config->get('config_session_expire');

			$session_json_response = ['signKey' => $signingKey, 'sessionId' => $session_id, 'expires' => $session_expiry_time];
			$sessionData = urlencode(base64_encode(json_encode($session_json_response)));
			$this->response->addHeader('Apitoken: ' . $sessionData);



		} else {

			// Update the session lifetime
			if ($this->config->get('config_session_expire')) {
				$this->config->set('session_expire', $this->config->get('config_session_expire'));
			}

			// Update the session SameSite
			$this->config->set('session_samesite', $this->config->get('config_session_samesite'));

			if (isset($this->request->cookie[$this->config->get('session_name')])) {
				$session_id = $this->request->cookie[$this->config->get('session_name')];
			} else {
				$session_id = '';
			}

			$session->start($session_id);
			$session_expiry_time = time() + (int) $this->config->get('config_session_expire');
			$option = [
				'expires' => $session_expiry_time,
				'path' => $this->config->get('session_path'),
				'secure' => $this->request->server['HTTPS'],
				'httponly' => false,
				'SameSite' => $this->config->get('session_samesite')
			];

			setcookie($this->config->get('session_name'), $session->getId(), $option);
		}

	}

	private function verifySignature($token, $clientSignature, $secretKey)
	{
		$calculatedSignature = hash('sha256', $token . $secretKey);
		return hash_equals($calculatedSignature, $clientSignature);
	}
}
