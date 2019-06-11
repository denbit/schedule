<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */
 $namespace = preg_replace('/Module$/', 'Controllers', $module["className"]);


$router->add('/authority/:controller/:action/', [
	'namespace' => $namespace,
	'module' => 'authority',
	'controller' => 1,
	'action' => 2,
	//'params' => 3
]);
$router->add('/authority/:controller/', [
	'namespace' => $namespace,
	'module' => 'authority',
	'controller' => 1,
	'action' => 'index',

]);
$router->add('/authority/:action', [
	'namespace' => $namespace,
	'module' => 'authority',
	'controller' => 'index',
	'action' => 'index',

]);