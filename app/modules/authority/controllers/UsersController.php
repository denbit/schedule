<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;

use Schedule\Core\Models\Company;
use Schedule\Core\Models\Users;
use Schedule\Modules\Authority\Models\UsersManager;


class UsersController extends ControllerBase
{
	use NotFound;

	public function indexAction()
	{
		$manager = new UsersManager();
//		var_dump( $manager->getList()->toArray());
//		die;

		$this->view->users = $manager->getList();

	}

	public function formAction()
	{
		$userForm = UsersManager::getUserForm();
	}
	public function editAction()
	{
		$id = $this->dispatcher->getParam('id');

		if (false !== ($user = Users::findFirst($id))) {
			$userForm = UsersManager::getUserForm($user);
			$action = $this->url->get(
				[
					'for' => "action-save",
					'controller' => $this->dispatcher->getControllerName(),
					'action' => 'save',
					'id'=>$id
				]
			);
			$userForm->setAction($action);
			$this->view->pick('company/form');
			$this->view->companyForm = $user;
		} else {
			$this->dispatcher->forward(
				[
					'controller' => $this->dispatcher->getControllerName(),
					'action' => 'index',
				]
			);
		}

	}

	public function saveAction()
	{
		$id = $this->dispatcher->getParam('id');
		if (false !== ($user = Users::findFirst($id))) {
			$userForm = UsersManager::getUserForm($user);
			if ($userForm->isValid($this->request->getPost())) {
				if ($userForm->save()) {
					$this->flashSession->success("The company  {$user->getLogin()} was saved succesfully");
				}
			}
		}else{
			$this->flashSession->error("System wasn't able to save company $id ");
		}

		$this->response->redirect($this->url->get([
				'for' => "action-auth",
				'controller' => $this->dispatcher->getControllerName(),
				'action' => 'index'
			]));
	}

}

