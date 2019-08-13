<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Cost;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Modules\Authority\Models\RouteManager;
use Schedule\Modules\Frontend\Models\IndexModel;


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
		if ($id){
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
		if ( $form_instance->isValid($this->request->getPost())){
			/**
			 * @var RouteManager $route_manager
			 */
			$route_manager = $form_instance->getEntity();

			if ($route_manager->save()){
				$this->flashSession->success("The route  $route_manager->id} was saved successfully");
			}else{
				$this->flashSession->error("The route  $route_manager->id} wasn't saved. Recheck data");
			}
		}
	$this->dispatcher->forward([
			'controller'=>$this->dispatcher->getControllerName(),
			'action'=>'index'
		]);
	}

	public function viewCostAction()
	{

	}
	public function  suggestAction(){
		//$this->isAjax();
		$suggestion=$this->request->getQuery('suggest');
		if (!empty($suggestion))
		{
			$model= new RouteManager();
			return json_encode($model->searchSuggestions($suggestion));
		}
		return json_encode(['results'=>'Nothing is available']);

	}

}

