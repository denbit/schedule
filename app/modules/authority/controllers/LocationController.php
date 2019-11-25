<?php

namespace Schedule\Modules\Authority\Controllers;


use Phalcon\Mvc\Model\Exception;
use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\Models\States;
use Schedule\Core\Models\Users;
use Schedule\Modules\Authority\Models\LocationManager;
use Schedule\Modules\Authority\Models\UsersManager;


class LocationController extends ControllerBase implements ICreatable,ISearchable,IEditable
{


	public function initialize()
	{

		$this->view->setVar('location_nodes', (object)Location::$location_nodes);

	}

	public function formAction()
	{
        $action = $this->url->get(
            [
                'for' => "action-save",
                'controller' => $this->dispatcher->getControllerName(),
                'action' => 'save',
                'id'=>''
            ]
        );
		$this->view->form = LocationManager::getForm()->setAction($action);
	}

	public function saveAction()
	{
        $id = $this->dispatcher->getParam('id');
        $location = null;
        if ( !empty($id) && false !== (States::findFirst($id))) {
            $location = LocationManager::getBaseCountry($id);
        }
        $locationForm = LocationManager::getForm($location, !empty($id));


        if ($locationForm->isValid($this->request->getPost()) && $location->save()) {

            $this->flashSession->success("The base country {$location->getCountryLatinName()} was saved succesfully");
            $this->response->redirect($this->url->get([
                'for' => "action-auth",
                'controller' => $this->dispatcher->getControllerName(),
                'action' => 'index'
            ]));

        } else {
            $messages = '';
            foreach ($location->getMessages() as $m) {
                $messages .= $m;
            }
            $this->dispatcher->forward(
                [
                    'controller' => $this->dispatcher->getControllerName(),
                    'action' => $id ? 'edit' : 'form',
                    'id' => $id ?? ''
                ]
            );
            $this->flashSession->error("System wasn't able to save country $id <br>$messages");

        }


    }

	public function editAction()
	{
        $id = $this->dispatcher->getParam('id');

        if ($id && false !== States::findFirst($id)) {
            $locationForm = LocationManager::getForm(LocationManager::getBaseCountry($id));
            $action = $this->url->get(
                [
                    'for' => "action-save",
                    'controller' => $this->dispatcher->getControllerName(),
                    'action' => 'save',
                    'id' => $id
                ]
            );
            $locationForm->setAction($action);
            $this->view->pick('users/form');
            $this->view->form = $locationForm;
        } else {
            $this->dispatcher->forward(
                [
                    'controller' => $this->dispatcher->getControllerName(),
                    'action' => 'index',
                ]
            );
        }
	}

	public function searchAction()
	{
		// TODO: Implement searchAction() method.
	}

	public function indexAction()
	{
		$locationManager = new LocationManager();
		if (count($this->dispatcher->getParams()) === 1){
			$this->session->set('base_country', $this->dispatcher->getParams()[0]);
		}
		$overview = $locationManager->getOverview();

		$this->view->setVar('state_names', States::find(['columns'=>'latin_name']));
		$this->view->setVar('overview', $overview);
		$this->view->setVar('list_tree', $overview->tree_list);
	}

	public function saveItemAction()
	{
		$category = $this->dispatcher->getParam('category');
		$parent_category = $this->dispatcher->getParam('parent_category');
		$parent_id = $this->dispatcher->getParam('parent_id');
		$post_data = $this->request->getPost();
	//	var_dump($post_data); return json_encode(["status"=>true]);
		$locationManager = new LocationManager();
		$parentEntity = $locationManager->getParent($parent_category, $parent_id);
		if ($category == 'city') {
			switch ($parent_category) {
				case 'state':
					$post_data['is_regional'] = 1;
					$post_data['country_id'] = $parentEntity->getId();
					break;
				case 'local_region':
					$post_data['is_regional'] = 0;
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
		if ($this->request->isAjax()) {
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
			$this->flash->success('Add ' . $category );

			return $view;
		}
	}

	public function editItemFormAction()
	{
		if ($this->request->isAjax()) {
		$category = $this->dispatcher->getParam('category');
		$node_id = $this->dispatcher->getParam('id');
		$locationManager = new LocationManager();
		$fields = $locationManager->getFields($category, $node_id);
		$view = $locationManager->getPartialTemplate(
			'editNode',
			[
				'fields' => $fields,
				'params' => (object)$this->dispatcher->getParams(),
			]
		);
		$this->flash->success('Editing ' . $category );
		return $view;
		}
	}

	public function editItemAction()
	{
		$category = $this->dispatcher->getParam('category');
		$node_id = $this->dispatcher->getParam('id');
		$post_data = $this->request->getPost();
		$locationManager = new LocationManager();
		$node = $locationManager->getInstanceFromData($category, $post_data, $node_id);
		if (!$node->update()) {
			$messages = $node->getMessages();
			throw new Exception(implode("\n", $messages));
		}
		$this->flash->success("$category {$node->latin_name} was updated ");
	}


	public function deleteItemAction()
	{
		$category = $this->dispatcher->getParam('category');
		$node_id = $this->dispatcher->getParam('id');
		$locationManager = new LocationManager();
		if ($locationManager->delete($category, $node_id)) {
			$this->flash->success("$category was deleted ");
		} else {
			$this->flash->error("Internal error!");
		}
	}

	private static function LocationException($message)
	{
		throw new Exception($message);
	}

}

