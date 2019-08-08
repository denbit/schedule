<?php


namespace Schedule\Modules\Authority\Models;


use Schedule\Core\Location;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\LocalRegions;
use Schedule\Core\Models\States;
use Schedule\Core\Models\Stations;

class LocationManager
{

	public function getOverview()
	{
		$list = [
			'countries' => States::count(),
			'cities' => Cities::count(),
			'local_regions' => LocalRegions::count(),
			'stations' =>Stations::count()
		];
		$list = array_change_key_case($list, CASE_UPPER);
		$per_state = new Location();
		$per_state->addState(States::getOneByAnyName('Ukraine'));
		$per_state_tree = $per_state->buildTree();
		$result_set = [
			'list' => $list,
			'per_state' => $per_state_tree,
		];

		return $result_set;
	}
}