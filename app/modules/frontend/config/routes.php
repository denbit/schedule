<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 19.11.2018
 * Time: 15:26
 */

$frontend = new \Phalcon\Mvc\Router\Group(
	[
		'module' => 'frontend',
		'namespace' => $namespaces['frontend'],
	]
);

$frontend->add(
	'/',
	[

		'controller' => 'index',
		'action' => 'index',

	]
);
$frontend->add(
	'/:controller/',
	[
		'controller' => 1,
		'action' => 'index',

	]
);
$frontend->add(
	'/:action',
	[

		'controller' => 'index',
		'action' => 1,

	]
);
$frontend->add(
	'/:controller/:action(/?)',
	[
		'controller' => 1,
		'action' => 2,

	]
);
$dinamic_router = \Schedule\Core\Models\UniversalPage::find(
	[
		' has_permanent_uri =0',
		'columns' => 'url,module_name',
		'group' => 'module_name',
	]
);
try {
	/**
	 * @var \Schedule\Core\Models\UniversalPage $dynamic_route
	 */
	foreach ($dinamic_router as $dynamic_route) {
		$frontend->addGet($dynamic_route->readAttribute('url'), $dynamic_route->readAttribute('module_name'));
	}
} catch (Exception $exception) {
	echo $exception->getMessage();
}
$router->mount($frontend);

