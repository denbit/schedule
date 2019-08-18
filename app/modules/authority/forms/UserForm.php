<?php

namespace Schedule\Modules\Authority\Forms;

use Phalcon\Forms\Element\Hidden;

use Phalcon\Forms\Element\Text;

use Phalcon\Forms\Form;

use Schedule\Core\Models\Users;


class UserForm extends Form
{
	public function initialize(Users $user, $options)
	{
		$this->setEntity($user);

		$this->add(new Hidden('id'));
		$name = new Text('name');
		$cyr_name = new Text('l_name');
		$latin_name = new Text('password');
		$this->add($name)->add($latin_name)->add($cyr_name);
		$address = new Text('login');
		$latin_address = new Text('email');
		$this->add($address)->add($latin_address);
		$this->add(new Text('judicial_form'));

	}
}