<?php
/**
 * Current class make initialization of whole application
 * and make all settings
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 * Date: 7/12/14
 * Time: 9:33 PM
 */
namespace Core;

class Bootstrap
{
    /**
     * Initialise application
     *
     * Created by Danil Baibak danil.baibak@gmail.com
     */
    public static function init()
    {
        $pathToConfig = BASE_PATH . "config/config.php";

        //get config
        if (file_exists($pathToConfig)) {
            $config = include_once $pathToConfig;
        } else {
            throw new \Exception("File with configurations '" . $pathToConfig ."' wasn't set up");
        }

        //show/hide errors and warnings
        if ($config['displayErrors']) {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        } else {
            error_reporting(0);
        }

        $router = new Router();
        $router->run();
    }
}
