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
$authority->addGet('/([a-zA-Z0-9\_\-]+)/edit/([a-z\_]+)', [ //stub for :controller some how it doesn't work
	'controller' => 1,
	'action' => 'edit',
	'id' => 2
])->setName("action-edit");
$authority->addPost('/([a-zA-Z0-9\_\-]+)/save/([a-z\_]+)', [
	'controller' => 1,
	'action' => 'save',
	'id' =>2
])->setName("action-save");
$authority->addDelete('/:controller/delete/([a-z\_]+)', [
	'controller' => 1,
	'action' => 'delete',
	'id' =>2
])->setName("action-delete");
$router->mount($authority);