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


	}
	public function getData():object {
		/**
		 * @var Config $local
		 */
		$local= $this->di->getConfig();
		return $local->get('auth');
	}

	public function getHash():string
	{
		return md5((json_encode($this->getData())));
	}

	public function check()
	{
		/*login and password without md5 */
		$credentials = $this->getData();
		return ($this->login == $credentials['login']) &&($this->password == $credentials['password']);
	}

    public function renderLoginForm():Form{
    	$form=new Form(new self());

    	$loginField = new Text('login',['class'=>'form-control']);
	    $loginField->setFilters(
    		[
    			'string',
			    'trim'
		    ]
	    );
    	$passwordField = new Password('password',['class'=>'form-control']);
//    	$passwordField->addValidator(new Validation\Validator\PresenceOf(
//    		[
//				'message'=>":field is required"
//	        ]
//	    ));alter version
    	$form->add($loginField)->add($passwordField);
    	$validate=new Validation();
    	$validate->add([
    			'login',
	//			'password'
			], new Validation\Validator\Alnum([
			             "message" => [
                 			"login" => ":field must contain only alphanumeric characters",
 //                 			"password"=> ":field must contain only alphanumeric characters",
             				 ]
				]
		));
    	$validate->add(
    		[
    			'login',
			    'password'
			    ],
		    new Validation\Validator\PresenceOf([
			    'message'=>":field is required"
		    ])
	    );
    	$form->setValidation($validate);
    	return $form;
	}


}