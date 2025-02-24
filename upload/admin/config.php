<?php
// APPLICATION
define('APPLICATION', 'Admin');

// HTTP
define('HTTP_SERVER', 'http://localhost/admin/');
define('HTTP_CATALOG', 'http://localhost/');

// DIR
define('DIR_VENTOCART', '/var/www/html/');
define('DIR_APPLICATION', DIR_VENTOCART . 'admin/');
define('DIR_IMAGE', DIR_VENTOCART . 'image/');
define('DIR_SYSTEM', DIR_VENTOCART . 'system/');
define('DIR_CATALOG', DIR_VENTOCART . 'catalog/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/default/');
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

// VENTOCART API
define('VENTOCART_SERVER', 'https://www.ventocart.com/');

// For redis if used
define('CACHE_HOSTNAME', '127.0.0.1');
define('CACHE_PORT', '6379');
define('CACHE_PREFIX', DB_PREFIX);
