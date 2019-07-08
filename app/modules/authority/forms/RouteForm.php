<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 6/27/2019
 * Time: 11:07 PM
 */

namespace Schedule\Modules\Authority\Forms;


use Phalcon\Forms\Element\Check;
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

		 $start_st =new Text('start_st',['class'=>'city from']);
		 $start_st->setLabel("Початкова станція");
		 $end_st = new Text('end_st',['class'=>'city to']);
		 $end_st->setLabel("Кінцева станція");
		 $made_by = new Select('made_by',Company::find(),[
		 	'using' => [
		 		'id',
			    'name'
		    ],
		    'emptyText' => "Будь-ласка оберіть компанію, що здійснює перевезення",
		    'useEmpty'=>true,
		    'emptyValue'=>''
		 ]);
		 $this->add($start_st)->add($end_st)->add($made_by);
		$this->addRegularity();

	}

	private function addRegularity()
	{
		$regularity = new Check('demo',['autocomplete'=>'off']);
		$regularity->setUserOption('regularity','true');
		$timestamp = strtotime('next Monday');
		for($i = 1; $i<=7;$i++){
			$thie_element= clone $regularity;
			$thie_element->setLabel(strftime('%A',$timestamp));
			$thie_element->setName("regularity[$i]");
			$this->add($thie_element);
			$timestamp=strtotime('+1 day',$timestamp);
		}
	}

}