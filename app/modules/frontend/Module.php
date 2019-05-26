<?php
namespace Schedule\Modules\Frontend;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;

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
    }
}
