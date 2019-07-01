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

	public function saveAction()
	{
		$form_instance=Route::getForm();
		if( $form_instance->isValid($this->request->getPost())){
			$form_instance->getEntity()->save();
		}

	}
}

