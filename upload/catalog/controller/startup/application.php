<?php
namespace Ventocart\Catalog\Controller\Startup;
/**
 * Class Application
 *
 * @package Ventocart\Catalog\Controller\Startup
 */
class Application extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->setting();
		$this->session();
		$this->language();
		$this->seo_url();
		$this->customer();
		$this->authorize();
		$this->currency();
		$this->tax();
		$this->marketing();

		// Weight
		$this->registry->set('weight', new \Ventocart\System\Library\Cart\Weight($this->registry));

		// Length
		$this->registry->set('length', new \Ventocart\System\Library\Cart\Length($this->registry));

		// Cart
		$this->registry->set('cart', new \Ventocart\System\Library\Cart\Cart($this->registry));
		$this->maintenance();
	}


	public function customer(): void
	{
		$this->registry->set('customer', new \Ventocart\System\Library\Cart\Customer($this->registry));


		if (!empty($this->request->get['customer_token'])) {
			$this->session->data['customer_token'] = $this->request->get['customer_token'];
		} elseif (!empty($this->session->data['customer_token'])) {
			$this->request->get['customer_token'] = $this->session->data['customer_token'];
		}

		// Customer Group
		if (isset($this->session->data['customer']) && isset($this->session->data['customer']['customer_group_id'])) {
			$this->config->set('config_customer_group_id', $this->session->data['customer']['customer_group_id']);
		} elseif ($this->customer->isLogged()) {
			// Logged in customers
			$this->config->set('config_customer_group_id', $this->customer->getGroupId());
		}

		// Session changing tracking to update guest subscribers (synch old cart items, abandoned cart etc, features)
		if (!$this->customer->isLogged()) {

			if ($this->config->get('module_gdpr_status') && !isset($this->request->cookie['accept-tracking'])) {

				return;
			}

			if (isset($this->request->cookie['guest']) && $this->request->cookie['guest'] != $this->session->getId()) {

				$oldSession = $this->request->cookie['guest'];
				$cookie_name = 'guest';
				$cookie_value = $this->session->getId();
				$expiration_time = 2147483647;

				// update session ids

				$this->load->model('guest/order');

				$this->model_guest_order->updateSessions($cookie_value, $oldSession);

				// Set the cookie
				setcookie($cookie_name, $cookie_value, $expiration_time, "/", "", false, true);


			}
		}
	}


	public function authorize(): ?object
	{
		if (isset($this->request->get['route'])) {
			$route = (string) $this->request->get['route'];
		} else {
			$route = '';
		}

		if (isset($this->request->cookie['authorize'])) {
			$token = (string) $this->request->cookie['authorize'];
		} else {
			$token = '';
		}

		// Remove any method call for checking ignore pages.
		$pos = strrpos($route, '.');

		if ($pos !== false) {
			$route = substr($route, 0, $pos);
		}

		$ignore = [
			'account/login',
			'account/logout',
			'account/forgotten',
			'account/authorize'
		];

		if ($this->config->get('config_security') && !in_array($route, $ignore)) {
			$this->load->model('user/user');

			$token_info = $this->model_user_user->getAuthorizeByToken($this->user->getId(), $token);

			if (!$token_info || !$token_info['status'] && $token_info['attempts'] <= 2) {
				$this->load->controller('common/authorize');
			}

			if ($token_info && !$token_info['status'] && $token_info['attempts'] > 2) {
				$this->load->controller('common/authorize.unlock');
			}
		}

		return null;
	}

	public function currency(): void
	{
		$code = '';

		$this->load->model('localisation/currency');

		$currencies = $this->model_localisation_currency->getCurrencies();

		if (isset($this->session->data['currency'])) {
			$code = $this->session->data['currency'];
		}

		if (isset($this->request->cookie['currency']) && !array_key_exists($code, $currencies)) {
			$code = $this->request->cookie['currency'];
		}

		if (!array_key_exists($code, $currencies)) {
			$code = $this->config->get('config_currency');
		}

		if (!isset($this->session->data['currency']) || $this->session->data['currency'] != $code) {
			$this->session->data['currency'] = $code;
		}

		// Set a new currency cookie if the code does not match the current one
		if (!isset($this->request->cookie['currency']) || $this->request->cookie['currency'] != $code) {
			$option = [
				'expires' => time() + 60 * 60 * 24 * 30,
				'path' => '/',
				'SameSite' => 'Lax'
			];

			setcookie('currency', $code, $option);
		}

		$this->registry->set('currency', new \Ventocart\System\Library\Cart\Currency($this->registry));
	}

	public function maintenance(): ?object
	{
		if ($this->config->get('config_maintenance')) {
			// Route

			$this->request->get['route'] = 'common/maintenance';



		}

		return null;
	}



	/**
	 * @var array
	 */
	private static array $languages = [];

	/**
	 * @return void
	 */
	public function language(): void
	{

		if (isset($this->request->get['language'])) {
			$code = (string) $this->request->get['language'];
		} elseif (!empty($this->session->data['language'])) {
			$code = $this->session->data['language'];
		} else {
			$code = $this->config->get('config_language');

		}
		$this->session->data['language'] = $code;



		$this->load->model('localisation/language');

		self::$languages = $this->model_localisation_language->getLanguages();

		if (isset(self::$languages[$code])) {
			$language_info = self::$languages[$code];

			// If extension switch add language directory
			if ($language_info['extension']) {
				$this->language->addPath('extension/' . $language_info['extension'], DIR_EXTENSION . $language_info['extension'] . '/catalog/language/');
			}

			// Set the config language_id key
			$this->config->set('config_language_id', $language_info['language_id']);
			$this->config->set('config_language', $language_info['code']);

			$this->load->language('default');
		}
	}



	public function marketing(): void
	{
		$tracking = '';

		if (isset($this->request->get['tracking'])) {
			$tracking = (string) $this->request->get['tracking'];
		}

		if (isset($this->request->cookie['tracking'])) {
			$tracking = (string) $this->request->cookie['tracking'];
		}

		// Tracking Code
		if ($tracking) {
			$this->load->model('marketing/marketing');

			$marketing_info = $this->model_marketing_marketing->getMarketingByCode($tracking);

			if ($marketing_info) {
				$this->model_marketing_marketing->addReport($marketing_info['marketing_id'], $this->request->server['REMOTE_ADDR']);
			}

			if ($this->config->get('config_affiliate_status')) {
				$this->load->model('account/affiliate');

				$affiliate_info = $this->model_account_affiliate->getAffiliateByTracking($tracking);

				if ($affiliate_info && $affiliate_info['status']) {
					$this->model_account_affiliate->addReport($affiliate_info['customer_id'], $this->request->server['REMOTE_ADDR']);
				}

				if ($marketing_info || ($affiliate_info && $affiliate_info['status'])) {
					$this->session->data['tracking'] = $tracking;

					if (!isset($this->request->cookie['tracking'])) {
						$option = [
							'expires' => $this->config->get('config_affiliate_expire') ? time() + (int) $this->config->get('config_affiliate_expire') : 0,
							'path' => $this->config->get('session_path'),
							'SameSite' => $this->config->get('config_session_samesite')
						];

						setcookie('tracking', $tracking, $option);
					}
				}
			}
		}
	}

	public function APISession(): void
	{

		$session = new \Ventocart\System\Library\Session($this->config->get('session_engine'), $this->registry);
		$this->registry->set('session', $session);
		// Check if API token exists in request headers or query parameters
		$apitoken = isset($this->request->get['apitoken']) ? $this->request->get['apitoken'] : (isset($this->request->server['HTTP_APITOKEN']) ? $this->request->server['HTTP_APITOKEN'] : '');
		$session_id = '';
		// If a token exists, validate it
		if ($apitoken && $apitoken != "refresh") {
			$decodedToken = base64_decode(urldecode($apitoken));
			$sessionData = json_decode($decodedToken, true);

			// If session data exists and the session is not expired, start session with existing session ID
			if ($sessionData && isset($sessionData['sessionId']) && $sessionData['expires'] > time()) {
				$session_id = $session->start($sessionData['sessionId']);

			}
		}

		// If the token is invalid or doesn't exist, generate a new session and Apitoken
		$session->start($session_id);
		$sessionId = $session->getId();

		$expires = time() + (int) $this->config->get('config_session_expire');

		$sessionData = [
			'sessionId' => $sessionId,
			'expires' => $expires,
		];
		header("Access-Control-Expose-Headers: Apitoken");
		// Create new Apitoken and return it in the response header
		$apitoken = base64_encode(json_encode($sessionData));
		header("Apitoken: $apitoken");


	}
	public function session(): void
	{
		if (isset($this->request->get['apitoken'])) {
			$this->APISession();
			return;
		}
		$session = new \Ventocart\System\Library\Session($this->config->get('session_engine'), $this->registry);
		$this->registry->set('session', $session);


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



	public function setting(): void
	{
		$this->load->model('setting/store');


		$store_info = $this->model_setting_store->getStore();



		if (!$store_info) {
			// If catalog constant is defined
			if (defined('HTTP_CATALOG')) {
				$this->config->set('config_url', HTTP_CATALOG);
			} else {
				$this->config->set('config_url', HTTP_SERVER);
			}
		}

		// Settings
		$this->load->model('setting/setting');

		$results = $this->model_setting_setting->getSettings();

		foreach ($results as $result) {
			if (!$result['serialized']) {
				$this->config->set($result['key'], $result['value']);
			} else {
				$this->config->set($result['key'], json_decode($result['value'], true));
			}
		}

		// Url
		$this->registry->set('url', new \Ventocart\System\Library\Url($this->config->get('config_url')));

		// Set time zone
		if ($this->config->get('config_timezone')) {
			date_default_timezone_set($this->config->get('config_timezone'));

			// Sync PHP and DB time zones.
			$this->db->query("SET time_zone = '" . $this->db->escape(date('P')) . "'");
		}

		// Response output compression level
		if ($this->config->get('config_compression')) {
			$this->response->setCompression((int) $this->config->get('config_compression'));
		}
	}


	public function tax(): void
	{
		$this->registry->set('tax', new \Ventocart\System\Library\Cart\Tax($this->registry));

		if (isset($this->session->data['shipping_address'])) {
			$this->tax->setShippingAddress((int) $this->session->data['shipping_address']['country_id'], (int) $this->session->data['shipping_address']['zone_id']);
		} elseif ($this->config->get('config_tax_default') == 'shipping') {
			$this->tax->setShippingAddress((int) $this->config->get('config_country_id'), (int) $this->config->get('config_zone_id'));
		}

		if (isset($this->session->data['payment_address'])) {
			$this->tax->setPaymentAddress((int) $this->session->data['payment_address']['country_id'], (int) $this->session->data['payment_address']['zone_id']);
		} elseif ($this->config->get('config_tax_default') == 'payment') {
			$this->tax->setPaymentAddress((int) $this->config->get('config_country_id'), (int) $this->config->get('config_zone_id'));
		}

		$this->tax->setStoreAddress((int) $this->config->get('config_country_id'), (int) $this->config->get('config_zone_id'));
	}




	public function seo_url(): void
	{
		// Add rewrite to URL class
		if ($this->config->get('config_seo_url')) {
			$this->url->addRewrite($this);

			$this->load->model('design/seo_url');

			// Decode URL
			if (isset($this->request->get['_route_'])) {
				$parts = explode('/', $this->request->get['_route_']);

				// remove any empty arrays from trailing

				if (oc_strlen(end($parts)) == 0) {
					array_pop($parts);
				}

				foreach ($parts as $part) {
					$seo_url_info = $this->model_design_seo_url->getSeoUrlByKeyword($part);

					if ($seo_url_info) {
						$this->request->get[$seo_url_info['key']] = html_entity_decode($seo_url_info['value'], ENT_QUOTES, 'UTF-8');

					}

				}

			}

		}
	}

	/**
	 * @param string $link
	 *
	 * @return string
	 */
	public function rewrite(string $link): string
	{
		$url_info = parse_url(str_replace('&amp;', '&', $link));

		// Build the url
		$url = '';


		parse_str($url_info['query'], $query);

		// Start changing the URL query into a path
		$paths = [];

		// Parse the query into its separate parts
		$parts = explode('&', $url_info['query']);


		foreach ($parts as $part) {

			$pair = explode('=', $part);

			// Check if both key and value exist
			if (count($pair) === 2) {
				[$key, $value] = $pair;

				$result = $this->model_design_seo_url->getSeoUrlByKeyValue((string) $key, (string) $value);

				if ($result) {
					$paths[] = $result;

					unset($query[$key]);
				}
			}
		}



		$sort_order = [];

		foreach ($paths as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}

		array_multisort($sort_order, SORT_ASC, $paths);


		foreach ($paths as $result) {
			$url .= '/' . $result['keyword'];
		}

		// Rebuild the URL query
		if ($query) {
			$url .= '?' . str_replace(['%2F'], ['/'], http_build_query($query));
		}
		$url = str_replace('/index.php', '', $url);

		return rtrim(HTTP_SERVER, '/') . $url;
	}


}