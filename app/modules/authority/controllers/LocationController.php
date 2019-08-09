<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Core\Models\States;
use Schedule\Modules\Authority\Models\LocationManager;


class LocationController extends ControllerBase
{
	use NotFound;

	private $location_nodes = [];

	public function initialize()
	{
		$this->location_nodes = [
			'states'=>'state',
			'cities'=>'city',
			'localRegions'=>'local_region',
			'stations'=>'station'
		];
		$this->view->setVar('location_nodes',(object) $this->location_nodes);

	}
    public function indexAction()
    {

		$locationManager = new LocationManager();
		$overview = $locationManager->getOverview();

		$this->view->setVar('overview', $overview);
		$this->view->setVar('list_tree', $overview->tree_list);
    }

	public function addItemAction()
	{
		die('loook');
    }

}

