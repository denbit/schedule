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
		$per_state = new Location();
		$per_state->addCity(Cities::getOneByAnyName('Київ'));
		$tree = $per_state->buildTree();
		var_dump($tree);
		die;
		$per_local_regin = [];

	}
}