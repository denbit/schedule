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
use Schedule\Core\Models\Company;
use Schedule\Core\Models\Stations;
use Schedule\Core\Models\TransitRoutes;
use Schedule\Core\RouteConstructor;
use Phalcon\Forms\Form;
use Schedule\Modules\Authority\Forms\RouteForm;

class RouteManager
{
	public $id;
	/**
	 * @var int
	 */
	public $start_st;
	/**
	 * @var int
	 */
	public $end_st;
	/**
	 * @var bool load status
	 */
	private $_loaded = false;
	/**
	 * @var int
	 */
	private $made_by;
	/**
	 * @var array
	 */
	private $path;
	/**
	 * @var array
	 */
	private $regularity = [];

	public static function getForm(self $instance = null, $options = [])
	{
		if (is_null($instance)) {
			$instance = new self();
		}
		$options = ['stations' => $instance->path ? count($instance->path) : 0] + $options;

		return new RouteForm($instance, $options);
	}

	public function isLoaded(): bool
	{
		return $this->_loaded;
	}

	public function getPath()
	{
		$stek = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1];
		if (is_subclass_of($stek['class'], Form::class, true)) {
			return $this->path;
		}

		return [];
	}

	public function setPath($path)
	{
		$stek = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1];
		if (is_subclass_of($stek['class'], Form::class, true)) {
			$this->path = $path;

			return true;
		}

		return false;
	}

	public function getRegularity()
	{
		$stek = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1];
		if (is_subclass_of($stek['class'], Form::class, true)) {
			return $this->regularity;
		}

		return [];
	}

	public function setRegularity($regularity)
	{
		$stek = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1];
		if (is_subclass_of($stek['class'], Form::class, true)) {
			$this->regularity = $regularity;

			return true;
		}

		return false;
	}

	public function __set($name, $value)
	{
	}

	public function save()
	{
		$cost_data = [];
		$core_route = new BusRoute();
		$core_route->id = $this->id;
		$core_route->setStartSt(Location::getLocationByStationId((int)$this->start_st));
		$core_route->setEndSt(Location::getLocationByStationId((int)$this->end_st));
		$core_route->setRegularity(implode(',',$this->regularity));
		$core_route->setMadeBy(Company::findFirst($this->made_by));
		var_dump($this->path);
		$core_route->setPath($this->path);

		return $core_route->save();
	}

	public function getRoute($id, $use_location = true)
	{
		$route = (new BusRoute())->findById($id);
		$this->start_st = [
			'id' => $route->getStartSt()->getStation()->getId(),
			'title' => $route->getStartSt()->getStation()->national_name,
		];
		$this->end_st = [
			'id' => $route->getEndSt()->getStation()->getId(),
			'title' => $route->getEndSt()->getStation()->national_name,
		];
		$this->id = $route->id;
		$this->made_by = $route->getMadeBy()->getId();
		$this->regularity = array_fill_keys(explode(',', $route->getRegularity()), true);
		$this->path = $route->getPathSchema(true);
		$this->path = array_map(
			function ($path_item) use ($use_location) {
				return [
					'from' => [
						'id' => $path_item['from'],
						'title' => $use_location
							?
							Location::getLocationByStationId($path_item['from'])
							:
							Stations::findFirst($path_item['from'])->national_name,
					],
					'from_time' => $path_item['from_time'],
					'to' => [
						'id' => $path_item['to'],
						'title' => $use_location
							?
							Location::getLocationByStationId($path_item['to'])
							:
							Stations::findFirst($path_item['to'])->national_name,
					],
					'to_time' => $path_item['to_time'],
				];
			},
			$this->path
		);
		$this->_loaded = true;

		return $this;

	}

	public function getIndex($count = 5)
	{
		$routes = BusRoute::getLast($count);
		$output = [];
		$name_mask = "$1  -  $2";
		$city_mask = '$1, <br> <small>$2</small>';

		foreach ($routes as $route) {
			$temp = [];
			$st_city = $route->getStartSt()->getCity();
			$end_city = $route->getEndSt()->getCity();
			$start_name = $st_city->latin_name;
			$end_name = $end_city->latin_name;
			$temp['name'] = str_replace(['$1', '$2'], [$start_name, $end_name], $name_mask);
			$temp['url'] = $route->id;
			$temp['transit_stations'] = $this->buildPathSchema($route->getPathSchema());


			$temp['start'] = str_replace(
				['$1', '$2'],
				[$st_city->national_name, $st_city->current_state->national_name],
				$city_mask
			);
			$temp['end'] = str_replace(
				['$1', '$2'],
				[$end_city->national_name, $end_city->current_state->national_name],
				$city_mask
			);

			$output[] = $temp;
		}

		return $output;
	}

	private function buildPathSchema($pathSchema)
	{
		$schema = "";
		if (!empty($pathSchema)) {
			foreach ($pathSchema as $transitroute) {
				$from_station = Location::getLocationByStationId($transitroute['from']);
				$schema .= $from_station->getCity()->national_name.$from_station->getStation()->getId()." ";
			}

		}

		return $schema;
	}

	public function searchSuggestions($suggestion)
	{
		$results = Location::findAllVariants($suggestion);
		$result = [];
		foreach ($results['stations'] as $item) {
			$result[] = [
				'value' => $item->id,
				'label' => $item->national_name,
			];
		}
return $result;
	}


}