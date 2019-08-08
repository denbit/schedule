<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Core\Models\States;


class LocationController extends ControllerBase
{
	use NotFound;
    public function indexAction()
    {
		$cities = Location::getRegionalCitiesByState(States::findFirst(['latin_name'=>'Ukraine']));
		var_dump($cities->toArray());die;
    }

}

