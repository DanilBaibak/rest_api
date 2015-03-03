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
                if ($hasResource['status']) {
                    break;
                }
            }

            /**
             * if there is such resource in the resources list, load it
             */
            if ($hasResource['status']) {
                $this->launch($resource, $requestUrl, $hasResource['parameter']);
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
    private function launch($resource, $requestUrl, $parameter)
    {
        $controller = "App\\Controllers\\" . $resource['controller'];
        $action = $resource['action'];

        //load requested resource
        $page = new $controller();
        //call action with parameter or without
        if ($parameter) {
            $page->$action($parameter);
        } else {
            $page->$action();
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
        $response = array();
        $response['status'] = false;
        $response['parameter'] = false;
        $resourceComponents = explode('/', $resource['resource']);

        //the common comparison
        if (
            $resource['method'] == $_SERVER['REQUEST_METHOD'] &&
            count($resourceComponents) == count($requestComponents)
        ) {
            $response['status'] = true;
            //the detailed comparison
            foreach ($resourceComponents as $key => $resourceValue) {
                //check parameters in the url

                if (strpos($resourceValue, ':') !== false) {
                    preg_match('/([0-9]+)$/', $requestComponents[$key], $urlParameter);
                    if (empty($urlParameter)) {
                        $response['status'] = false;
                        break;
                    } else {
                        $response['parameter'] = $urlParameter[0];
                        continue;
                    }
                }

                if ($resourceValue != $requestComponents[$key]) {
                    $response['status'] = false;
                    break;
                }
            }
        }
        return $response;
    }
}




