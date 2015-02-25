<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");

error_reporting(E_ALL);
ini_set('display_errors', 1);

defined('BASE_URL') || define('BASE_URL', '/');
defined('CONFIG') || define('CONFIG', "config/");

require 'vendor/autoload.php';

\Core\Router::run();

