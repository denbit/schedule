<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Session\Adapter\Files as SessionAdapter;

use Phalcon\Flash\Direct as Flash;
use Schedule\Modules\Frontend\Controllers\IndexController;

/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router(false);
   // $router->setDefaultModule("Schedule\Modules\Frontend");
//	$checkRoute= new \Phalcon\Events\Manager();
//	$checkRoute->attach('router:afterCheckRoutes',function (Phalcon\Events\Event $event, $router, Exception $exception){
//
//		$router->getDI();
//	});
//    $router->setDefaultController('index');
//
    $router->setDefaultAction('index');
    //$router->setEventsManager($checkRoute);
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
 * Set the default namespace for dispatcher
 */
$di->setShared('dispatcher', function() {
	$eventsManager = new \Phalcon\Events\Manager();
	$dispatcher = new \Phalcon\Mvc\Dispatcher();
	// Attach a listener
	$eventsManager->attach(
		"dispatch:beforeException", function (Phalcon\Events\Event $event, $dispatcher, Exception $exception) {
		// Alternative way, controller or action doesn't exist

		if( $exception->getCode() == Dispatcher::EXCEPTION_ACTION_NOT_FOUND || $exception->getCode() == Dispatcher::EXCEPTION_HANDLER_NOT_FOUND){

				$dispatcher->forward(					[
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
    $flash = new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
    //$flash->setImplicitFlush(true);
    return $flash;
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


