<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");

defined('BASE_URL') || define('BASE_URL', '/');
defined('BASE_PATH') || define('BASE_PATH', __DIR__ . '/');
defined('CONFIG') || define('CONFIG', "config/");

require 'vendor/autoload.php';

\Core\Bootstrap::init();
