<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */
$namespace = preg_replace('/Module$/', 'Controllers', $module["className"]);
$router->add('/:params', [
    'namespace' => $namespace,
    'module' => 'frontend',
    'controller' => 'index',
    'action' => 'index',
    'params' => 1
]);
$router->add('/:controller/:params', [
    'namespace' => $namespace,
    'module' => 'frontend',
    'controller' => 1,
    'action' => 'index',
    'params' => 2
]);
$router->add('/:action/:params', [
	'namespace' => $namespace,
	'module' => 'frontend',
	'controller' =>'index',
	'action' => 1,
	'params' => 2
]);
$router->add('/:controller/:action/:params', [
    'namespace' => $namespace,
    'module' => 'frontend',
    'controller' => 1,
    'action' => 2,
    'params' => 3
]);
