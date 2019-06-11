<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Location;
use Schedule\Core\BusRoute;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
       // $config = $this->di->getConfig();var_dump($config);
        echo "test Authority". print_r($this->dispatcher->getParams());
echo $this->router->getMatchedRoute()->getCompiledPattern();
    }

}

