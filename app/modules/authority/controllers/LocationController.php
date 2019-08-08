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
    public function indexAction()
    {

		$locationManager = new LocationManager();
		$overview = $locationManager->getOverview();

		$this->view->setVar('overview', $overview);
		$this->view->setVar('list_tree', $overview->tree_list);
    }

}

