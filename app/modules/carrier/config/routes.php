<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */

$carrier = new \Phalcon\Mvc\Router\Group([
	'module'    => 'carrier' ,
	'namespace' => $namespaces['carrier']
]);
$carrier->setPrefix('/carrier');
$carrier->add('/:params', [
    'controller' => 'index',
    'action' => 'index',
    'params' => 3
]);
$carrier->add('/:action/:params', [
    'controller' => 'index',
    'action' => 2,
    'params' => 3
]);
$carrier->add('/:controller/:params', [
    'controller' => 1,
    'action' => 'index',
    'params' => 3
]);
$carrier->add('/:controller/:action/:params', [
    'controller' => 1,
    'action' => 2,
    'params' => 3
]);
$router->mount($carrier);
