<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Location;
use Schedule\Core\BusRoute;


class IndexController extends ControllerBase
{

    public function indexAction()
    {

	$this->view->setVar('string',$this->router->getMatchedRoute()->getCompiledPattern());

    }

}

