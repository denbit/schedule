<?php

use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Session\Adapter\Files as SessionAdapter;

use Phalcon\Flash\Direct as Flash;

/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router(false);
   // $router->setDefaultModule("Schedule\Modules\Frontend");
	$router->notFound(
		[
			'namespace' =>'Schedule\Modules\Frontend\Controllers',
			'module' => 'frontend',
			'controller' => 'index',
			'action'     => 'error404',
		]
	);
    return $router;
});

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});
/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flashSession', function () {
    return new Phalcon\Flash\Session([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
* Set the default namespace for dispatcher
*/
$di->setShared('dispatcher', function() {
		$eventsManager = new \Phalcon\Events\Manager();


		$dispatcher = new \Phalcon\Mvc\Dispatcher();
	// Attach a listener
	$eventsManager->attach(
		"dispatch:beforeException", function (Phalcon\Events\Event $event, $dispatcher, Exception $exception) {

		// Alternative way, controller or action doesn't exist
		switch ($exception->getCode()) {
			case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
				$dispatcher->forward(
					[
						'namespace' =>'Schedule\Modules\Frontend\Controllers',
						'module' => 'frontend',
						'controller' => 'index',
						'action'     => 'error404',
					]
				);

				return false;
		}
	}
	);

		//Bind the EventsManager to the dispatcher
		$dispatcher->setEventsManager($eventsManager);

		return $dispatcher;

});
