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
		$string = '';
		$closere = function ($item, $key, $closere) use (&$string) {
			$string .= "<li data=$key> <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" href=\"#{$item['name']}_collapse\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapse\">{$item['name']}</button><ul class=\"collapse\" id=\"{$item['name']}_collapse\">";
			if (is_array($item) && is_array($item['children'])) {
				array_walk($item['children'], $closere, $closere);
			}
			$string .= "</ul></li>";
		};

		array_walk($overview['per_state'], $closere, $closere);
		$this->view->setVar('overview', (object)$overview);
		$this->view->setVar('string', $string);
    }

}

