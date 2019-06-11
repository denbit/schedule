<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */

$frontend = new \Phalcon\Mvc\Router\Group([
	'module'    => 'frontend' ,
	'namespace' => $namespaces['frontend'] ,
]);

$frontend->add('/' , [

	'controller' => 'index' ,
	'action'     => 'index' ,

]);
$frontend->add('/:controller/' , [
	'controller' => 1 ,
	'action'     => 'index' ,

]);
$frontend->add('/:action' , [

	'controller' => 'index' ,
	'action'     => 1 ,

]);
$frontend->add('/:controller/:action(/?)' , [
	'controller' => 1 ,
	'action'     => 2,

]);
$router->mount($frontend);

