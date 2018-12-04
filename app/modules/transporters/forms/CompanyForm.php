<?php

namespace Schedule\Modules\Transporters\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;

use Schedule\Core\CompanyInstance;
use Schedule\Core\Models\Languages;
use Schedule\Core\Models\PagesTypes;
use Schedule\Core\PageParser;

class CompanyForm extends Form
{
    public function initialize(CompanyInstance $company, $options)
    {
        $this->setEntity($company);
        $name = new Text('name', ["class" => 'form-control']);
        $name->addFilter('string');
        $name->setLabel("Company Name:");
        $this->add($name);
        $id=(new Hidden('id'))->setLabel(' ');
        $id->setUserOption('no_style',1);
        $this->add($id);
        $address = new Text('address', ["class" => 'form-control']);
        $address->setLabel(" Company address");
        $this->add($address);
        $cyr_name = new Text('cyr_name', ["class" => 'form-control']);
        $cyr_name->setLabel("Company Name in Cyrillic alphabet");
        $this->add($cyr_name);
        $latin_name = new Text('latin_name', ["class" => 'form-control']);
        $latin_name->setLabel("Company Name in Latin alphabet");
        $this->add($latin_name);
        $latin_address = new Text('latin_address', ["class" => 'form-control']);
        $latin_address->setLabel(" Company address in Latin alphabet");
        $this->add($latin_address);
        $judicial_form = new Text('judicial_form', ["class" => 'form-control']);
        $judicial_form->setLabel("Judicial Form");
        $this->add($judicial_form);



}
}