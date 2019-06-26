<?php
namespace Schedule\Modules\Authority\Controllers;

use Phalcon\Filter;
use Phalcon\Mvc\Controller;
use Schedule\Modules\Authority\Models\Login;

class ControllerBase extends Controller
{



	protected function logon()
	{
		$login_parser=new Login();
		if(!$this->session->has('auth_file')|| $login_parser->getHash() !== $this->session->get('auth_file')){
			$this->view->pick('login');
			$this->view->form = $login_parser->renderLoginForm();
		}
		return true;


	}

}
