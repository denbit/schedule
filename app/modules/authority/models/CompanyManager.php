<?php


namespace Schedule\Modules\Authority\Models;


use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Schedule\Core\Components\DataText;
use Schedule\Core\Kernel;
use Schedule\Core\Models\Company;

class CompanyManager extends Kernel
{

	public function getList($index=5)
	{
		$companies=Company::find([
			'limit'=>$index
		]);
		return $companies;
	}

	public static function getCompanyForm(Company $instance = null,$options = null):Form{

	$form = new Form($instance);
	$id =new Hidden('id');
	$id ->setLabel(" ");
	$name = new Text('name');
	$name->setLabel("Національна назва");
	$cyr_name = new Text('cyr_name');
	$cyr_name->setLabel('');
	$latin_name = new Text('latin_name');
	$latin_name->setLabel('');

	$address = new Text('address');
	$address->setLabel('Національна назва');
	$latin_address = new Text('latin_address');
	$latin_address ->setLabel('Назва латиницею');
	$cyr_address = new Text('cyr_address');
	$cyr_address ->setLabel('Назва кирилицею');
	$judicial_form = new Text('judicial_form');
	$judicial_form->setLabel('Юридична форма');
	$user = new Text('user_id');
	$user->setLabel('Користувач');
	$form->add($user)->add($name)
		->add($latin_name)->add($cyr_name)
		->add($address)->add($latin_address)
		->add($cyr_address)->add($judicial_form);
	return $form;
}
}