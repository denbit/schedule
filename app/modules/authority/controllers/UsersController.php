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
        $userForm = UsersManager::getForm();
        $action = $this->url->get(
            [
                'for' => "action-save",
                'controller' => $this->dispatcher->getControllerName(),
                'action' => 'save',
                'id' => ''
            ]
        );
        $userForm->setAction($action);
        $this->view->usersForm = $userForm;
    }

    public function editAction()
    {
        $id = $this->dispatcher->getParam('id');

        if ($id && false !== ($user = Users::findFirst($id))) {
            $userForm = UsersManager::getForm($user);
            $action = $this->url->get(
                [
                    'for' => "action-save",
                    'controller' => $this->dispatcher->getControllerName(),
                    'action' => 'save',
                    'id' => $id
                ]
            );
            $userForm->setAction($action);
            $this->view->pick('users/form');
            $this->view->usersForm = $userForm;
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
        if (!$id || false === ($user = Users::findFirst($id))) {
            $user = new Users();
        }
        $userForm = UsersManager::getForm($user, !empty($id));


        if ($userForm->isValid($this->request->getPost()) && $user->save()) {

            $this->flashSession->success("The user  {$user->getLogin()} was saved succesfully");
            $this->response->redirect($this->url->get([
                'for' => "action-auth",
                'controller' => $this->dispatcher->getControllerName(),
                'action' => 'index'
            ]));

        } else {
            $messages = '';
            foreach ($userForm->getMessages() as $m) {
                $messages .= $m;
            }
            $this->dispatcher->forward(
                [
                    'controller' => $this->dispatcher->getControllerName(),
                    'action' => $id ? 'edit' : 'form',
                    'id' => $id ?? ''
                ]
            );
            $this->flashSession->error("System wasn't able to save user $id <br>$messages");

        }


    }

    public function listAction()
    {
        $userChoose = UsersManager::getUserForSelect();
        $this->response->setJsonContent($userChoose)->send();
    }

}

