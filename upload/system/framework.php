<?php

// Autoloader
$autoloader = new \Ventocart\System\Engine\Autoloader();
$autoloader->register('Ventocart\\' . APPLICATION, DIR_APPLICATION);
$autoloader->register('Ventocart\System', DIR_SYSTEM);

require_once(DIR_SYSTEM . 'vendor.php');

// Registry
$registry = new \Ventocart\System\Engine\Registry();
$registry->set('autoloader', $autoloader);

// Config
$config = new \Ventocart\System\Engine\Config();
$registry->set('config', $config);
$config->addPath(DIR_CONFIG);

// Load the default config
$config->load('default');
$config->load(strtolower(APPLICATION));

// Set the default application
$config->set('application', APPLICATION);

// Set the default time zone
date_default_timezone_set($config->get('date_timezone'));

// Logging
$log = new \Ventocart\System\Library\Log($config->get('error_filename'));
$registry->set('log', $log);

// Error Handler
set_error_handler(function (string $code, string $message, string $file, string $line) use ($log, $config) {
	switch ($code) {
		case E_NOTICE:
		case E_USER_NOTICE:
			$error = 'Notice';
			break;
		case E_WARNING:
		case E_USER_WARNING:
			$error = 'Warning';
			break;
		case E_ERROR:
		case E_USER_ERROR:
			$error = 'Fatal Error';
			break;
		default:
			$error = 'Unknown';
			break;
	}

	if ($config->get('error_log')) {
		$log->write('PHP ' . $error . ':  ' . $message . ' in ' . $file . ' on line ' . $line);
	}

	if ($config->get('error_display')) {
		echo '<b>' . $error . '</b>: ' . $message . ' in <b>' . $file . '</b> on line <b>' . $line . '</b>';
	} else {
		header('Location: ' . $config->get('error_page'));
		exit();
	}

	return true;
});

// Exception Handler
set_exception_handler(function (\Throwable $e) use ($log, $config): void {
	if ($config->get('error_log')) {
		$log->write($e->getMessage() . ': in ' . $e->getFile() . ' on line ' . $e->getLine());
	}

	if ($config->get('error_display')) {
		echo '<b>' . $e->getMessage() . '</b>: in <b>' . $e->getFile() . '</b> on line <b>' . $e->getLine() . '</b>';
	} else {
		header('Location: ' . $config->get('error_page'));
		exit();
	}
});

// Loader
$loader = new \Ventocart\System\Engine\Loader($registry);
$registry->set('load', $loader);

// Request
$request = new \Ventocart\System\Library\Request();
$registry->set('request', $request);

// Compatibility
if (isset($request->get['route'])) {
	$request->get['route'] = str_replace('|', '.', $request->get['route']);
	$request->get['route'] = str_replace('%7C', '|', (string) $request->get['route']);
}

// Response
$response = new \Ventocart\System\Library\Response();
$registry->set('response', $response);

foreach ($config->get('response_header') as $header) {
	$response->addHeader($header);
}

$response->addHeader('Access-Control-Allow-Origin: *');
$response->addHeader('Access-Control-Allow-Credentials: true');
$response->addHeader('Access-Control-Max-Age: 1000');
$response->addHeader('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding');
$response->addHeader('Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE');
$response->addHeader('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
$response->addHeader('Pragma: no-cache');
$response->setCompression($config->get('response_compression'));

// Database
if ($config->get('db_autostart')) {
	$db = new \Ventocart\System\Library\DB($config->get('db_engine'), $config->get('db_hostname'), $config->get('db_username'), $config->get('db_password'), $config->get('db_database'), $config->get('db_port'), $config->get('db_ssl_key'), $config->get('db_ssl_cert'), $config->get('db_ssl_ca'));
	$registry->set('db', $db);
}

// Session
if ($config->get('session_autostart')) {
	$session = new \Ventocart\System\Library\Session($config->get('session_engine'), $registry);
	$registry->set('session', $session);

	if (isset($request->cookie[$config->get('session_name')])) {
		$session_id = $request->cookie[$config->get('session_name')];
	} else {
		$session_id = '';
	}

	$session->start($session_id);

	// Require higher security for session cookies
	$option = [
		'expires' => 0,
		'path' => $config->get('session_path'),
		'domain' => $config->get('session_domain'),
		'secure' => $request->server['HTTPS'],
		'httponly' => false,
		'SameSite' => $config->get('session_samesite')
	];

	setcookie($config->get('session_name'), $session->getId(), $option);
}

// Cache
$registry->set('cache', new \Ventocart\System\Library\Cache($config->get('cache_engine'), $config->get('cache_expire')));

// Template
$template = new \Ventocart\System\Library\Template($config->get('template_engine'));
$registry->set('template', $template);

$template->addPath(DIR_TEMPLATE . "/plates/");


// Language
$language = new \Ventocart\System\Library\Language($config->get('language_code'));
$language->addPath(DIR_LANGUAGE);

$registry->set('language', $language);

// Url
$registry->set('url', new \Ventocart\System\Library\Url($config->get('site_url')));

// Document
$registry->set('document', new \Ventocart\System\Library\Document());

// Factory
$registry->set('factory', new \Ventocart\System\Engine\Factory($registry));

$event = new Ventocart\System\Engine\Event($registry);
$registry->set('event', $event);



$action = '';
$args = [];
$output = '';

// Pre Actions

foreach ($config->get('action_pre_action') as $pre_action) {

	$loader->load->controller($pre_action);
}


// Route
if (isset($request->get['route'])) {
	$route = (string) $request->get['route'];
} else {
	$route = (string) $config->get('action_default');
}


$loader->load->controller($route);


// Output
$response->output();


