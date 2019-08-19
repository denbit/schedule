<?php

namespace Schedule\Modules\Authority\Forms;

use Phalcon\Forms\Element\Hidden;

use Phalcon\Forms\Element\Text;

use Phalcon\Forms\Form;

use Phalcon\Validation\Validator\Alnum;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Uniqueness;
use Schedule\Core\Models\Users;


class UserForm extends Form
{
	public function initialize(Users $user=null, $options)
	{
		$this->setEntity($user);

		$id=new Hidden('id');
		$id//->addValidator(new Numericality(['message'=>":field shoudl be numeric"]))
			->setLabel("");
		$name = new Text('name');
		$name->addValidator(new Regex([
			'pattern'=>'/^[\w\s]+$/',
			'message'
		]))->setLabel('Імя');
		$l_name = new Text('l_name');
		$l_name->setLabel('Призвище');
		$password = new Text('password');
		$password->addValidator(new PresenceOf(['message'=>"field is mandatory"]))->setLabel('Пароль');
		$password2= new Text('password2');
		$password2->addValidator( new PresenceOf(['message'=>"Re type password once more"]))->setLabel('Повторити пароль');
		$login = new Text('login');
		$login->addValidators([
			new PresenceOf(),new Regex(['pattern'=>'/^[A-Za-z0-9@_]+$/']),
			new Uniqueness(['model'=>new Users()
			])
		])->setLabel('Логін');;
		$email = new Text('email');
		$email->addValidators([
			new PresenceOf(),
			new Uniqueness(['model'=>new Users()]),
			new Email(["message" => "The e-mail is not valid" ])
		])->setLabel('Емейл');
		$this->add($login)->add($email)
			->add($id)->add($name)
			->add($l_name)->add($password)
			->add($password2);

	}
}