<?php
namespace Schedule\Modules\Transporters;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Config\Adapter\Ini;
use Phalcon\Config;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        /**
         * Try to load local configuration
         */
        if (file_exists(__DIR__ . '/config/config.ini')) {

            $config = $di['config'];

            $override = new Ini(__DIR__ . '/config/config.ini');

            if ($config instanceof Config) {
                $config->merge($override);
            } else {
                $config = $override;
            }
        }
        $config = $di->getConfig();
        $module_dir=$config->get('application')->modulesDir;

        $loader = new Loader();

        $loader->registerNamespaces([
            'Schedule\Modules\Transporters\Controllers' => BASE_PATH.$module_dir .  $config->get('transporters')->controllersDir,
            'Schedule\Modules\Transporters\Models'      => BASE_PATH.$module_dir .  $config->get('transporters')->modelsDir,
            'Schedule\Modules\Transporters\Forms'      =>  BASE_PATH.$module_dir .  $config->get('transporters')->formDir
        ]);

        $loader->register();
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
        $di['view'] = function () {
            $config = $this->getConfig();

            $view = new View();
            $view->setViewsDir(BASE_PATH.$config->get('application')->modulesDir.$config->get('transporters')->viewsDir);
            $view->setLayoutsDir(BASE_PATH.$config->get('application')->modulesDir.$config->get('transporters')->viewsDir."layouts/");
            
            $view->registerEngines([
                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        };

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () {
            $config = $this->getConfig();

            $dbConfig = $config->database->toArray();

            $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $dbConfig['adapter'];
            unset($config['adapter']);

            return new $dbAdapter($dbConfig);
        };
    }
}
