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

	public static function getCompanyForm( $instance = null):Form{

	$form = new Form($instance);
	$form->add(new Hidden('id'));
	$name = new Text('name');
	$cyr_name = new Text('cyr_name');
	$latin_name = new Text('latin_name');
	$form->add($name)->add($latin_name)->add($cyr_name);
	$address = new Text('address');
	$latin_address = new Text('latin_address');
	$cyr_address = new Text('cyr_address');
	$form->add($address)->add($latin_address)->add($cyr_address);
	$form->add(new Text('judicial_form'));
	$user = new DataText('user');
	$user->setLabel('Користувач');
	$form->add($user);
	return $form;
}
}