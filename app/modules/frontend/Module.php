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
                '.volt'  =>function ($view, $di)
				{
					$volt = new View\Engine\Volt($view,$di);
					$volt->getCompiler()->addFunction('dump','var_dump');
					$volt->setOptions([
						'compiledPath' => function($templatePath) use ($config) {
							$basePath = $config->application->appDir;
							if ($basePath && substr($basePath, 0, 2) == '..') {
								$basePath = dirname(__DIR__);
							}

							$basePath = realpath($basePath);
							$templatePath = trim(substr($templatePath, strlen($basePath)), '\\/');

							$filename = basename(str_replace(['\\', '/'], '_', $templatePath), '.volt') . '.php';

							$cacheDir = $config->application->cacheDir;
							if ($cacheDir && substr($cacheDir, 0, 2) == '..') {
								$cacheDir = __DIR__ . DIRECTORY_SEPARATOR . $cacheDir;
							}

							$cacheDir = realpath($cacheDir);

							if (!$cacheDir) {
								$cacheDir = sys_get_temp_dir();
							}

							if (!is_dir($cacheDir . DIRECTORY_SEPARATOR . 'volt' )) {
								@mkdir($cacheDir . DIRECTORY_SEPARATOR . 'volt' , 0755, true);
							}

							return $cacheDir . DIRECTORY_SEPARATOR . 'volt' . DIRECTORY_SEPARATOR . $filename;
						},
						'compileAlways' => $config->application->development==true ? true:false

					]);
					return $volt;
				},
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        });
    }
}
