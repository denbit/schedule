<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;


class RouteController extends ControllerBase
{

    public function indexAction()
    {

	$this->view->setVar('string',$this->router->getMatchedRoute()->getCompiledPattern());

    }
    public function formAction(){

	}

}

