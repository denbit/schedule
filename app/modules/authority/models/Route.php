<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 6/27/2019
 * Time: 11:07 PM
 */

namespace Schedule\Modules\Authority\Models;


use Schedule\Core\BusRoute;
use Schedule\Core\Location;
use Schedule\Core\RouteConstructor;
use Schedule\Modules\Authority\Forms\RouteForm;

class Route
{
	public $id;
	/**
	 * @var int
	 */
	private $start_st;
	/**
	 * @var int
	 */
	private $end_st;
	/**
	 * @var int
	 */
	private $made_by;
	/**
	 * @var array
	 */
	private $path;
	/**
	 * @var string
	 */
	private $regularity='1';

	public function set_transit()
	{
		//$transit_data=[
//			['from'=>1,'to'=>4,'arrival'=>'00:00:00','departure'=>'00:20:00'],
//			['from'=>4,'to'=>2,'arrival'=>'01:00:00','departure'=>'01:05:00'],
//			['from'=>2,'to'=>3,'arrival'=>'03:00:00','departure'=>'00:00:00']
//		];
	}

	public static function getForm()
	{
		$instance = new self();
		 return new RouteForm($instance);
	}

	public function save()
	{

		$cost_data=[];
		$transit_data=[
			['from'=>1,'to'=>4,'arrival'=>'00:00:00','departure'=>'00:20:00'],
			['from'=>4,'to'=>2,'arrival'=>'01:00:00','departure'=>'01:05:00'],
			['from'=>2,'to'=>3,'arrival'=>'03:00:00','departure'=>'00:00:00']
		];
		$core_route= new BusRoute();
		$core_route->setStartSt(Location::getLocationByCityId((int)substr($this->start_st,4)));
		$core_route->setEndSt(Location::getLocationByCityId((int)substr($this->end_st,4)));
		$core_route->setRegularity($this->regularity);
		$core_route->setPath([]);
		return $core_route->save();


	}

	public function getIndex($count=5)
	{
		$routes = BusRoute::getLast($count);
		$output=[];
		$name_mask = "$1  -  $2";
		$city_mask = '$1 , <br> $2';

		foreach ($routes as $route)
		{
			$temp = [];
			$st_city =$route->getStartSt()->getCity();
			$end_city = $route->getEndSt()->getCity();
			$start_name=$st_city->latin_name;
			$end_name = $end_city->latin_name;
			$temp['name'] = str_replace(['$1','$2'],[$start_name,$end_name],$name_mask);
			$temp['url'] = $route->id;
			$temp['transit_stations']=$route->getPathSchema();


			$temp['start'] = str_replace(['$1','$2'],[$st_city->national_name,$st_city->current_state->national_name],$city_mask);
			$temp['end'] = str_replace(['$1','$2'],[$end_city->national_name,$end_city->current_state->national_name],$city_mask);

			$output[] = $temp;
		}

return $output;
	}

	private function buildPathSchema($pathSchema)
	{

	}


}