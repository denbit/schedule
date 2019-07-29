<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Modules\Authority\Models\RouteManager;


class RouteController extends ControllerBase
{

    public function indexAction()
    {
    	$Route= new RouteManager();

	$this->view->setVar('routes',$Route->getIndex());//$this->router->getMatchedRoute()->getCompiledPattern());

    }
    public function formAction(){
		$this->view->form = RouteManager::getForm();
	}

	public function editAction()
	{
		$id = $this->dispatcher->getParam('id');
		if($id){
			$route = new RouteManager();
			$route->getRoute($id,false);
			$this->view->pick('route/form');
			$this->view->form = RouteManager::getForm($route);
		}else{
			$this->dispatcher->forward(['action'=>'index']);
		}


	}

	public function saveAction()
	{
		$form_instance=RouteManager::getForm();
		if( $form_instance->isValid($this->request->getPost())){
			$form_instance->getEntity()->save();
		}
		$this->dispatcher->forward([
			'controller'=>$this->dispatcher->getActiveController(),
			'action'=>'index'
		]);
	}
}

