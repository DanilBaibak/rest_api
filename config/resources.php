<?php
/**
 * Resources. Each consists of:
 * 'resource' - url on which the data you'll be requested
 * 'controller' - name of the controller
 * 'action' - name of the action
 */
return array(
    array(
        'resource'   => 'group',
        'controller' => 'AuxiliaryDataController',
        'action'     => 'getGroups'
    ),
    array(
        'resource'   => 'shnippers',
        'controller' => 'AuxiliaryDataController',
        'action'     => 'getShippers'
    ),
    array(
        'resource'   => 'products',
        'controller' => 'ProductController',
        'action'     => 'products'
    ),
    array(
        'resource'   => 'check_unique_value',
        'controller' => 'ProductController',
        'action'     => 'checkUniqueProduct'
    ),
);