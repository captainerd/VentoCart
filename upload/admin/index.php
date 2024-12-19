<?php
// Version
define('VERSION', '5.0.0.1');
// Configuration
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (is_file('config.php')) {
	require_once('config.php');
}

// Installs
if (!defined('DIR_APPLICATION')) {
	header('Location: ../install/index.php');
	exit();
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// Framework
require_once(DIR_SYSTEM . 'framework.php');
