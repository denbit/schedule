<?php

namespace Schedule\Modules\Authority\Controllers;


use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Modules\Authority\Models\LocationManager;


class LocationController extends ControllerBase
{
	use NotFound;



	public function initialize()
	{

		$this->view->setVar('location_nodes',(object) Location::$location_nodes);

	}
    public function indexAction()
    {
		$locationManager = new LocationManager();
		$overview = $locationManager->getOverview();


		$this->view->setVar('overview', $overview);
		$this->view->setVar('list_tree', $overview->tree_list);
    }

	public function saveItemAction()
	{
		$category = $this->dispatcher->getParam('category');
		$parent_category = $this->dispatcher->getParam('parent_category');
		$parent_id = $this->dispatcher->getParam('parent_id');
		$post_data =$this->request->getPost();
		$locationManager = new LocationManager();
		$ItemInstance= $locationManager->getInstanceFromData($category,$post_data);
		$parentEntity = $locationManager->getParent($parent_category,$parent_id);
		$locationManager->addItem($ItemInstance,$parentEntity);
		$this->flash->success("$category was created");

    }
	public function addItemAction()
	{
		$this->view->disable();
		if (!$this->request->isAjax()){
			$category = $this->dispatcher->getParams('category');
			$parent_category = $this->dispatcher->getParam('parent_category');
			$parent_id = $this->dispatcher->getParam('parent_id');
			$locationManager = new LocationManager();
			$parentEntity = $locationManager->getParent($parent_category,$parent_id);
			$fields = $locationManager->getFields($category);

			$view = $locationManager->getPartialTemplate('add_node',[
				'parent_node'=>$parentEntity,
				'fields' =>array_keys($fields),
				'request'=>(object)[
					'category' =>$category,
					'parent_category'=>$parent_category,
					'parent_id'=>$parent_id
				]
			]);
			$this->flash->success('Getting data');
			return $view;

		}


	}

}

