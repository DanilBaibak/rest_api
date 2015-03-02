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
    /**
     * Split url, find current resource and call it
     *
     * Created by Danil Baibak danil.baibak@gmail.com
     */
    public function run()
    {
        //don't handle request with method 'OPTIONS'
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            return;
        }

        $hasResource = false;
        $pathToResources = CONFIG . 'resources.php';

        //check file with resources
        if (file_exists($pathToResources)) {
            //get resources
            $resources = include $pathToResources;
        } else {
            throw new \Exception('File with resources is empty');
        }

        if (isset($_SERVER['REQUEST_URI'])) {
            if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
                $requestUrl = substr($_SERVER['REQUEST_URI'], 1, strpos($_SERVER['REQUEST_URI'], '?') - 1);
            } else {
                $requestUrl = substr($_SERVER['REQUEST_URI'], 1);
            }
            //prepare request url
            $requestComponents = explode('/', $requestUrl);

            //try find current resource from the list
            foreach ($resources as $resource) {
                $hasResource = $this->checkResource($resource, $requestComponents);
                if ($hasResource) {
                    break;
                }
            }
            /**
             * if there is such resource in the resources list, load it
             */
            if ($hasResource) {
                $this->launch($resource, $requestUrl);
            } else {
                //or load "page not found"
                $controller = new \App\Controllers\ErrorController();
                $controller->pageNotFound();
            }
        }
    }

    /**
     * Launch current resource
     *
     * @param array $resource Data about the resource, which call
     * @param string $requestUrl current url
     *
     * Created by Danil Baibak danil.baibak@gmail.com
     */
    private function launch($resource, $requestUrl)
    {
        $controller = "App\\Controllers\\" . $resource['controller'];
        $action = $resource['action'];

        //load requested resource
        $page = new $controller();
        //get 'id' of the entity from the url
        preg_match('/([0-9]+)$/', $requestUrl, $urlParameter);
        //call action with parameter or without
        if (empty($urlParameter)) {
            $page->$action();
        } else {
            $page->$action($urlParameter[0]);
        }
    }

    /**
     * Check if the call equal to one of the resource
     *
     * @param array $resource data about one of the resource
     * @param array $requestComponents the url that was exploded
     * @return bool
     *
     * Created by Danil Baibak danil.baibak@gmail.com
     */
    private function checkResource($resource, $requestComponents)
    {
        $hasResource = false;
        $resourceComponents = explode('/', $resource['resource']);

        //the common comparison
        if (
            $resource['method'] == $_SERVER['REQUEST_METHOD'] &&
            count($resourceComponents) == count($requestComponents)
        ) {
            $hasResource = true;
            //the detailed comparison
            foreach ($resourceComponents as $key => $resourceValue) {
                if (strpos($resourceValue, ':') !== false) {
                    continue;
                }

                if ($resourceValue != $requestComponents[$key]) {
                    $hasResource = false;
                    break;
                }
            }
        }
        return $hasResource;
    }
}




