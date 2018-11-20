<?php

$router = $di->getRouter();
foreach ($application->getModules() as $key => $module) {
    if(is_dir( BASE_PATH.$di->getConfig()->get('application')->modulesDir.$key)) {
        require_once  BASE_PATH.$di->getConfig()->get('application')->modulesDir.$key.'/config/routes.php';

    }
 /*   $router->add('/'.$key.'/:params', [
        'namespace' => $namespace,
        'module' => $key,
        'controller' => 'index',
        'action' => 'index',
        'params' => 1
    ])->setName($key);
    $router->add('/'.$key.'/:controller/:params', [
        'namespace' => $namespace,
        'module' => $key,
        'controller' => 1,
        'action' => 'index',
        'params' => 2
    ]);
    $router->add('/'.$key.'/:controller/:action/:params', [
        'namespace' => $namespace,
        'module' => $key,
        'controller' => 1,
        'action' => 2,
        'params' => 3
    ]);
*/

}
//var_dump($router);
