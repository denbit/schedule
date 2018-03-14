<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Schedule\Models' => APP_PATH . '/common/models/',
    'Schedule'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Schedule\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Schedule\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
