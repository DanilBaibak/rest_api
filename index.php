<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");

ini_set('display_errors', 1);

defined('BASE_URL') || define('BASE_URL', '/');
defined('CONFIG') || define('CONFIG', "config/");

if (!function_exists('bootstrap_autoloader')) {
    function bootstrap_autoloader() {
        require('Core/Autoloader.php');
        CORE\Autoloader::setIncludePath("");
        Core\Autoloader::register();

        Core\Router::run();
    }
}

bootstrap_autoloader();
