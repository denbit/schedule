<?php
namespace Schedule\Modules\Authority\Controllers;


use Phalcon\Mvc\Controller;
use Schedule\Core\Components\NotFound;
use Schedule\Core\IMainAction;
use Schedule\Modules\Authority\Models\Login;

abstract class ControllerBase extends Controller implements IMainAction
{
	use NotFound;

	public function onConstruct()
	{
		global $debugbarRenderer;
		if ($this->config->get('application')->development==true && $debugbarRenderer){

			$this->view->debugbarHEAD=$debugbarRenderer->renderHEAD();
			$this->view->debugbar=$debugbarRenderer->render();
		}
		 if (!$this->logon()){
			 return false;
		 }
		 return true;
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
			$this->view->pick('login');
			$this->view->loginform = $form;

		}
		return true;
	}

}
