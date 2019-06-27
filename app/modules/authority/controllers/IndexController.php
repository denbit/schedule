<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;


class IndexController extends ControllerBase
{
	use NotFound;
    public function indexAction()
    {


	$this->view->setVar('string',$this->router->getMatchedRoute()->getCompiledPattern());

    }

}

