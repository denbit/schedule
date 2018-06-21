<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Schedule\Core\Models' => APP_PATH . '/corelibs/models/',
    'Schedule\Core'        => APP_PATH . '/corelibs/libs/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Schedule\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Schedule\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
