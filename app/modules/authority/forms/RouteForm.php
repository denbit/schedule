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
		 $start_st->setLabel("Початкова станція")->setUserOption('common','true');
		 $end_st = new Text('end_st',['class'=>'city to']);
		 $end_st->setLabel("Кінцева станція")->setUserOption('common','true');
		 $made_by = new Select('made_by',Company::find(),[
		 	'using' => [
		 		'id',
			    'name'
		    ],
		    'emptyText' => "Будь-ласка оберіть компанію",
		    'useEmpty'=>true,
		    'emptyValue'=>''
		 ]);
		 $made_by->setUserOption('common','true')->setLabel("Компанію, що здійснює перевезення");
		 $this->add($start_st)->add($end_st)->add($made_by);
		$this->addRegularity();
		$this->addTransit($options['stations']??0);

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

	private function addTransit($stations)
	{
		$start_st =new Text('start_st',['class'=>'city from']);
		$start_st->setLabel("Початкова станція");
		$end_st = new Text('end_st',['class'=>'city to']);
		$end_st->setLabel("Кінцева станція");
		$start_st->setUserOption('transit','true');
		$end_st->setUserOption('transit','true');
		for ($i=0; ;$i++){
			$start_st_ent= clone $start_st;
			$start_st_ent->setName(
				$start_st_ent->getName().$i
			);
			$end_st_ent= clone $end_st;
			$end_st_ent->setName(
				$end_st_ent->getName().$i
			);
			$this->add($start_st_ent)->add($end_st_ent);
			if($i>$stations || $stations==0)break;
		}





	}

	/**
	 * Binds data to the entity
	 *
	 * @param  array  $data
	 * @param  object  $entity
	 * @param  array  $whitelist
	 *
	 * @return Form
	 */
	public function bind(array $data , $entity , $whitelist = null)
	{
		parent::bind($data , $entity ,
			$whitelist);
		$transit_data=array_filter($data,['this','filter'],ARRAY_FILTER_USE_BOTH);
		return $this;
	}

	private function filter($key, $value )
	{
		var_dump($key,$value);
	}
}