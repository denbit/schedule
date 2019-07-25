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
    	$Route= new Route();

	$this->view->setVar('routes',$Route->getIndex());//$this->router->getMatchedRoute()->getCompiledPattern());

    }
    public function formAction(){
		$this->view->form = Route::getForm();
	}

	public function editAction()
	{
		$id = $this->dispatcher->getParam('id');
		if($id){
			$route = new Route();
			$route->getRoute($id);
			$this->view->pick('route/form');var_dump($route);
			$this->view->form = Route::getForm($route);
		}else{
			$this->dispatcher->forward(['action'=>'index']);
		}


	}

	public function saveAction()
	{
		$form_instance=Route::getForm();
		if( $form_instance->isValid($this->request->getPost())){
			$form_instance->getEntity()->save();
		}
		$this->dispatcher->forward([
			'controller'=>$this->dispatcher->getActiveController(),
			'action'=>'index'
		]);
	}
}

