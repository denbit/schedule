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

$authority->add('(/)?', [
	'controller' => 'index',
	'action' => 'index'
]);
$authority->add('/:action', [
	'controller' => 'index',
	'action' => 1
]);
$authority->add('/:controller(/?)', [
	'controller' => 1,
	'action' => 'index'
]);
$authority->add('/:controller/:action(/?)', [
	'controller' => 1,
	'action' => 2,
	//'params' => 3
])->setName("action-auth");
$authority->addGet('/:controller/:action/([a-z\_]+|[0-9]{0,2})', [
	'controller' => 1,
	'action' => 2,
	'id' => 3
])->setName("action-save");
$authority->addPost('/:controller/:action/([a-z\_]+)', [
	'controller' => 1,
	'action' => 2,
	'id' => 3
])->setName("action-save");
$router->mount($authority);