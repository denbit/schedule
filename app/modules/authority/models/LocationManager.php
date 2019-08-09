<?php


namespace Schedule\Modules\Authority\Models;


use Schedule\Core\Location;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\LocalRegions;
use Schedule\Core\Models\States;
use Schedule\Core\Models\Stations;

class LocationManager
{

	public function getOverview(): object
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
			'tree_list' => $this->build_list_tree($per_state_tree),
		];

		return (object)$result_set;
	}

	private function build_list_tree($tree)
	{
		$string = '';
		$closere = function ($item, $key, $closere) use (&$string) {
			$string .= $this->get_template($key, $item);
			if (is_array($item) && is_array($item['children'])) {
				array_walk($item['children'], $closere, $closere);
			}
			$string .= "</ul></li>";
		};

		array_walk($tree, $closere, $closere);

		return $string;

	}


	private function get_template($key, $item)
	{
		return <<< HTML
<li data-id=$key> 
	<button class="btn btn-link collapsed" data-toggle="collapse" href="#{$item['name']}_collapse" role="button" aria-expanded="false" aria-controls="collapse">
	{$item['name']}
	</button>
	<ul class="collapse" id="{$item['name']}_collapse">
HTML;
	}
}