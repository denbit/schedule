<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 16.10.2018
 * Time: 14:56
 */

namespace Schedule\Modules\Authority\Models;


use Phalcon\Config;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation;
use Schedule\Core\Kernel;
use Schedule\Core\Models\UniversalPage;


class Login extends Kernel
{
	private $login;
	private $password;
	private function on__construct()
	{
		$this->getSource();

	}

	public function getSource(){
		/**
		 * @var Config $local
		 */
    	$local= $this->di->config;
    	$credentials = $local->get('auth');/*login and password without md5 */
		$this->login = $credentials['login'];
		$this->password = $credentials['password'];
        
    }

	public function check()
	{

    }

    public function renderLoginForm():Form{
    	$form=new Form();
    	$loginField = new Text('login',['class'=>'form-control']);
    	$passwordField = new Password('password',['class'=>'form-control']);
    	$form->add($loginField)->add($passwordField);
    	$validate=new Validation();
    	$validate->add([
    			'login',
				'password'
			], new Validation\Validator\Alnum([
			             "message" => [
                 			"login" => ":field must contain only alphanumeric characters",
                  			"password"=> ":field must contain only alphanumeric characters",
             				 ]
				]
		));
    	$form->setValidation($validate);
    	return $form;
	}


}