<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Modules\Authority\Models\Route;


class RouteController extends ControllerBase
{

    public function indexAction()
    {

	$this->view->setVar('string',$this->router->getMatchedRoute()->getCompiledPattern());

    }
    public function formAction(){
		$this->view->form = Route::getForm();
	}

}

