<?php
namespace Schedule\Modules\Frontend;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Http\Response\Cookies;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Text;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Schedule\Modules\Frontend\Controllers' => __DIR__ . '/controllers/',
            'Schedule\Modules\Frontend\Models' => __DIR__ . '/models/',

        ]);

        $this->registerOutsideNamespaces($loader);
        $loader->register();
    }

    private function registerOutsideNamespaces(Loader &$loader)
    {
        $loader->registerNamespaces([
            'Fabiang\Xmpp' => APP_PATH . '/corelibs/outsidelibs/xmpp/'
        ], true);

    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {

        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(__DIR__ . '/views/');

            $view->registerEngines([
                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        });
		$di->set('module_list', function (){
			$config = $this->getConfig();
			$fronted = $config->get('frontend')->controllersDir;
			$controllers = [];

			foreach (glob($fronted . '*Controller.php') as $controller) {
				$cntrlName =Text::lower(basename($controller, 'Controller.php'));
				$className = 'Schedule\Modules\Frontend\Controllers\\' . basename($controller, '.php');
				$controllers[$cntrlName] = []; ;
				$methods = (new \ReflectionClass($className))->getMethods(\ReflectionMethod::IS_PUBLIC);
				foreach ($methods as $method) {
					if (\Phalcon\Text::endsWith($method->name, 'Action')) {
						$controllers[$cntrlName][] = basename($method->name, 'Action');
					}
				}
			}
			return $controllers;
		});

		$di->set(
			'cookies',
			function () {
				$cookies = new Cookies();

				$cookies->useEncryption(false);

				return $cookies;
			}
		);

    }
}
