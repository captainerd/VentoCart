<?php
// APPLICATION

define('APPLICATION', 'Catalog');

// HTTP
define('HTTP_SERVER', 'http://127.0.0.1/');

// DIR
define('DIR_VENTOCART', '/var/www/html/');
define('DIR_APPLICATION', DIR_VENTOCART . 'catalog/');

define('DIR_IMAGE', DIR_VENTOCART . 'image/');
define('DIR_SYSTEM', DIR_VENTOCART . 'system/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('THEME_NAME', 'default');
define('DIR_TEMPLATE', DIR_VENTOCART . 'themes/' . THEME_NAME . "/");
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_SSL_KEY', '');
define('DB_SSL_CERT', '');
define('DB_SSL_CA', '');
define('DB_DATABASE', 'testa');
define('DB_PORT', '3306');
define('DB_PREFIX', 've_');

// For Redis if used:

define('CACHE_HOSTNAME', '127.0.0.1');
define('CACHE_PORT', '6379');
define('CACHE_PREFIX', DB_PREFIX);

//  Server Secret, used to generate guest order tracking codes, randomly generated at install

define('SERVER_SECRET', 'this_will_be_generated');