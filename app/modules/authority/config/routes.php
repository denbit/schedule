<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */
$authority = new \Phalcon\Mvc\Router\Group(array(
	'module'    => 'authority' ,
	'namespace' => $namespaces['authority']
));
$authority->setPrefix('/authority');

$authority->add('/', [
	'controller' => 'index',
	'action' => 'index'
]);
$authority->add('/authority/:action', [
	'controller' => 'index',
	'action' => 1
]);
$authority->add('/authority/:controller(/?)', [
	'controller' => 1,
	'action' => 'index'
]);
$authority->add('/authority/:controller/:action/', [
	'controller' => 1,
	'action' => 2
]);
$router->mount($authority);