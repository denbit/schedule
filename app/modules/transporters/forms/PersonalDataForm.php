<?php

namespace Schedule\Modules\Transporters\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;

use Phalcon\Forms\Element\Text;

use Phalcon\Forms\Form;

use Schedule\Core\CompanyInstance;


class PersonalDataForm extends Form
{
    public function initialize(CompanyInstance $company, $options)
    {

        $this->setEntity($company);
        $user_name = new Text('u_name', ["class" => 'form-control']);
        $user_name->addFilter('string');
        $user_name->setLabel("First Name:");
        $this->add($user_name);
        $id = (new Hidden('user_id'))->setLabel(' ');
        $id->setUserOption('no_style', 1);
        $this->add($id);
        $l_name = new Text('l_name', ["class" => 'form-control']);
        $l_name->setLabel("Last Name:");
        $this->add($l_name);
        $login = new Text('login', ["class" => 'form-control']);
        $login->setLabel("Login:");
        $this->add($login);

        $password = new Password('password', ["class" => 'form-control']);
        $password->setLabel("Password:");
        $password->setAttribute('value', '******');
        $this->add($password);
        $c_password = new Password('c_password', ["class" => 'form-control']);
        $c_password->setLabel("Confirm Password:");
        $c_password->setAttribute('value', '******');
        $this->add($c_password);


    }
}