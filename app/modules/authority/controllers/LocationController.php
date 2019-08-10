<?php

namespace Schedule\Modules\Authority\Controllers;


use Phalcon\Exception;
use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Modules\Authority\Models\LocationManager;


class LocationController extends ControllerBase
{
	use NotFound;


	public function initialize()
	{

		$this->view->setVar('location_nodes', (object)Location::$location_nodes);

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
		$post_data = $this->request->getPost();
		$locationManager = new LocationManager();
		$parentEntity = $locationManager->getParent($parent_category, $parent_id);
		if ($category == 'city') {
			switch ($parent_category){
				case 'state':
					$post_data['is_regional'] = 1;
					$post_data['country_id'] = $parentEntity->getId();
					break;
				case 'local_region':
					$post_data['is_regional'] =  0;
					$post_data['country_id'] = $parentEntity->regional_center->getCountryId();
					break;
				default:
					self::LocationException('Wrong parent !');
			}

		}
		$ItemInstance = $locationManager->getInstanceFromData($category, $post_data);

		$locationManager->addItem($ItemInstance, $parentEntity);
		$this->flash->success("$category was created");

	}

	public function addItemAction()
	{
		$this->view->disable();
		if (!$this->request->isAjax()) {
			$category = $this->dispatcher->getParam('category');
			$parent_category = $this->dispatcher->getParam('parent_category');
			$parent_id = $this->dispatcher->getParam('parent_id');
			$locationManager = new LocationManager();
			$parentEntity = $locationManager->getParent($parent_category, $parent_id);
			$fields = $locationManager->getFields($category);

			$view = $locationManager->getPartialTemplate(
				'add_node',
				[
					'parent_node' => $parentEntity,
					'fields' => array_keys($fields),
					'params' => (object)$this->dispatcher->getParams(),
				]
			);
			$this->flash->success('Getting data');

			return $view;
		}
	}

	public function editItemAction()
	{
		$category = $this->dispatcher->getParam('category');
		$parent_category = $this->dispatcher->getParam('parent_category');
		$parent_id = $this->dispatcher->getParam('parent_id');
		$post_data = $this->request->getPost();
	}

	public function deleteItemAction()
	{
		$category = $this->dispatcher->getParam('category');
		$parent_category = $this->dispatcher->getParam('parent_category');
		$parent_id = $this->dispatcher->getParam('parent_id');
		$post_data = $this->request->getPost();
	}

	private static function LocationException($message)
	{
		 throw new Exception($message);
	}

}

