<?php

namespace Schedule\Modules\Authority\Forms;

use Phalcon\Forms\Element\Hidden;

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;

use Phalcon\Forms\Form;

use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Uniqueness;
use Schedule\Core\Components\NotOneOf;
use Schedule\Modules\Authority\Models\LocationManager;


class LocationForm extends Form
{
    public function initialize(LocationManager $base_location = null, $options)
    {
        $this->setEntity($base_location);

        $id = new Hidden('base_id');
        $id->setLabel(" ");
        if ($options->edit) {
            $id->addValidator(new Numericality(['message' => ":field  should be present and numeric"]));
        }
        $latin_name = new Text('country_latin_name');
        $latin_name->addValidator(new Regex([
            'pattern' => '/^[\w\s]*$/',
            'message' => 'trolol'
        ]))->setLabel('Імя');
        $cyr_name = new Text('country_cyr_name');
        $cyr_name->setLabel('Призвище');
        $national_name = new Text('country_national_name');
        $national_name->addValidators([
            new PresenceOf(['message' => ":field is mandatory"])
        ])->setLabel('');
        $national_name->addValidators([
            new PresenceOf(),
            new Regex([
                'pattern' => '/^[A-Za-z0-9@_]+$/'
            ]),
            new NotOneOf([
                'all' => 'country_latin_name,country_cyr_name'
            ])
        ])->setLabel('Логін');
        $this->add($latin_name)->add($cyr_name)
            ->add($id)->add($national_name);
    }
}