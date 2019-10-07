<?php

use DebugBar\StandardDebugBar;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;
use Snowair\Debugbar\ServiceProvider;

error_reporting(E_ALL);
ini_set('display_errors','on');

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {

    /**
     * The FactoryDefault Dependency Injector automatically registers the services that
     * provide a full stack framework. These default services can be overidden with custom ones.
     */
    $di = new FactoryDefault();

    /**
     * Include general services
     */
    require APP_PATH . '/config/services.php';

    /**
     * Include web environment specific services
     */
    require APP_PATH . '/config/services_web.php';

    /**
     * Get config service for use in inline setup below
	 * @var $config \Phalcon\Config
     */
    $config = $di->getConfig();
    if ( $config->application->development)
		header('Note: CACHING IS DISABLED ON LOCALHOST');
    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';
	if(file_exists(BASE_PATH.'/vendor/autoload.php')) {
		include BASE_PATH.'/vendor/autoload.php';
	}
    /**
     * Handle the request
     */
    $application = new Application($di);
	$di['app'] = $application;
	/**
     * Register application modules
     */
    $application->registerModules([
		'carrier' => ['className' => '\Schedule\Modules\Carrier\Module'],
        'authority' => ['className' => '\Schedule\Modules\Authority\Module'],
		'frontend' => ['className' => '\Schedule\Modules\Frontend\Module']

    ]);

    /**
     * Include routes
     */
	/**
	 * @var $router \Phalcon\Mvc\Router
	 */
	$router = $di->getRouter();

    require APP_PATH . '/config/routes.php';

	$debugbar = new StandardDebugBar();
//	$debugbarRenderer = $debugbar->getJavascriptRenderer();
//	(new Snowair\Debugbar\ServiceProvider())->start();
//	$profiler = new \Fabfuel\Prophiler\Profiler();
//	$toolbar = new \Fabfuel\Prophiler\Toolbar($profiler);
//	$toolbar->addDataCollector(new \Fabfuel\Prophiler\DataCollector\Request());
//	$di->setShared('profiler', $profiler);
	//echo $toolbar->render();
    echo str_replace(["\n","\r","\t"], '', $application->handle()->getContent());

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
finally{
	if ($config->get('application')->showRoute){
		var_dump($router->getMatchedRoute());
		echo 'Module: ', $router->getModuleName(), '<br>';
		echo 'Controller: ', $router->getControllerName(), '<br>';
		echo 'Action: ', $router->getActionName(), '<br>';
	}

}
