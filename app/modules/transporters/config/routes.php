<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */
$namespace = preg_replace('/Module$/', 'Controllers', $module["className"]);
$router->add('/carrier/:params', [
    'namespace' => $namespace,
    'module' => 'transporters',
    'controller' => 'index',
    'action' => 'index',
    'params' => 3
]);
$router->add('/carrier/:action/:params', [
    'namespace' => $namespace,
    'module' => 'transporters',
    'controller' => 'index',
    'action' => 2,
    'params' => 3
]);
$router->add('/carrier/:controller/:params', [
    'namespace' => $namespace,
    'module' => 'transporters',
    'controller' => 1,
    'action' => 'index',
    'params' => 3
]);
$router->add('/carrier/:controller/:action/:params', [
    'namespace' => $namespace,
    'module' => 'transporters',
    'controller' => 1,
    'action' => 2,
    'params' => 3
]);
