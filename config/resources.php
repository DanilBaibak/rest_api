<?php
/**
 * Resources. Each consists of:
 * 'resource' - url on which the data you'll be requested
 * 'method' - method of the request
 * 'controller' - name of the controller
 * 'action' - name of the action
 */
return array(
    array(
        'resource'   => 'groups',
        'method'     => 'GET',
        'controller' => 'AuxiliaryDataController',
        'action'     => 'getGroups'
    ),
    array(
        'resource'   => 'shippers',
        'method'     => 'GET',
        'controller' => 'AuxiliaryDataController',
        'action'     => 'getShippers'
    ),
    array(
        'resource'   => 'products',
        'method'     => 'GET',
        'controller' => 'ProductController',
        'action'     => 'getProducts'
    ),
    array(
        'resource'   => 'product/:id',
        'method'     => 'GET',
        'controller' => 'ProductController',
        'action'     => 'getProduct'
    ),
    array(
        'resource'   => 'products',
        'method'     => 'POST',
        'controller' => 'ProductController',
        'action'     => 'createProduct'
    ),
    array(
        'resource'   => 'product/:id',
        'method'     => 'PUT',
        'controller' => 'ProductController',
        'action'     => 'updateProduct'
    ),
    array(
        'resource'   => 'product/:id',
        'method'     => 'DELETE',
        'controller' => 'ProductController',
        'action'     => 'removeProduct'
    ),
    array(
        'resource'   => 'product/check_unique_value',
        'method'     => 'GET',
        'controller' => 'ProductController',
        'action'     => 'checkUniqueProduct'
    ),
);