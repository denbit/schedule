<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 6/27/2019
 * Time: 11:07 PM
 */

namespace Schedule\Modules\Authority\Forms;


use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Schedule\Core\CompanyInstance;
use Schedule\Core\Models\Company;
use Schedule\Modules\Authority\Models\Route;

class RouteForm extends Form
{
	public function initialize(Route $input_route, $options)
	{
		$this->setEntity($input_route);

		 $id = new Hidden('id');

		 $start_st =new Text('start_st');
		 $end_st = new Text('end_st');
		 $made_by = new Select('made_by',Company::find(),[
		 	'using' => [
		 		'id',
			    'latin_name'
		    ],
		    'emptyText' => "Please select company",
		    'useEmpty'=>true,
		    'emptyValue'=>''
		 ]);
		 $this->add($start_st)->add($end_st)->add($made_by);

	}

}