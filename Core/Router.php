<?php
/**
 * Routing.
 * Current router is designed to simple urls. The urls should contains only one item.
 * Like 'https://test.com/product', 'https://test.com/groups' etc.
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */
namespace Core;

class Router
{
    public static function run()
    {
        //get resources
        $resources = include CONFIG . 'resources.php';
        //check resources
        if (empty($resources)) {
            throw new \Exception('File with resources is empty');
        }

        if (isset($_SERVER['REQUEST_URI'])) {
            //prepare request url
            $requestUrl = str_replace('/', '', $_SERVER['REQUEST_URI']);
            if (strpos($requestUrl, "?") !== false) {
                $requestUrl = str_replace(substr($requestUrl, strpos($requestUrl, "?")), "", $requestUrl);
            }

            $hasResource = false;
            //check requested resource in the existing resource list
            foreach($resources as $resource) {
                if ($resource['resource'] == $requestUrl) {
                    $hasResource = true;
                    break;
                }
            }

            /**
             * if there is such resource in the resources list, load it
             */
            if ($hasResource) {
                $controller = "App\\Controllers\\" . $resource['controller'];
                $action = $resource['action'];

                //load requested resource
                $page = new $controller();
                $page->$action();
            } else {
                //or load "page not found"
                $controller = new \App\Controllers\ErrorController();
                $controller->pageNotFound();
            }
        }
    }
}




