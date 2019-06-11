<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */
$namespace = preg_replace('/Module$/', 'Controllers', $module["className"]);

$router->add('/', [
	'namespace' => $namespace,
	'module' => 'frontend',
	'controller' => 'index',
	'action' => 'index',

]);
$router->add('/:controller/', [
    'namespace' => $namespace,
    'module' => 'frontend',
    'controller' => 1,
    'action' => 'index',

]);
$router->add('/:action', [
	'namespace' => $namespace,
	'module' => 'frontend',
	'controller' =>'index',
	'action' => 1,

]);
$router->add('/:controller/:action(/?)', [
    'namespace' => $namespace,
    'module' => 'frontend',
    'controller' => 1,
    'action' => 2

]);

