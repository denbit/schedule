<?php
namespace Schedule\Modules\Authority\Controllers;

use Phalcon\Filter;
use Phalcon\Forms\Form;
use Phalcon\Mvc\Controller;
use Schedule\Modules\Authority\Models\Login;

class ControllerBase extends Controller
{

	public function onConstruct()
	{
		 if (!$this->logon()){
return false;
		 }
	}


	protected function logon()
	{
		$login_parser=new Login();
		if(!$this->session->has('auth_file')|| $login_parser->getHash() !== $this->session->get('auth_file')){
			$form = $login_parser->renderLoginForm();
			if($this->request->isPost()){
				$form->bind($_POST,$login_parser);
				if($form->isValid() && $login_parser->check())
				{
					$this->session->set('auth_file',$login_parser->getHash());
					return true;
				}
			}
			$this->view->form = $form;
			$this->view->pick('login');

		}
		return true;
	}

}
