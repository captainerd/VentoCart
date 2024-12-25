<?php
// Version

ini_set('short_open_tag', 'On');
define('VERSION', '5.1.0.0');

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Install
if (is_dir('./install')) {
	header('Location: install/index.php');
	exit();
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// Framework
require_once(DIR_SYSTEM . 'framework.php');
