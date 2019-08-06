<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;


class CompanyController extends ControllerBase
{
	use NotFound;
    public function indexAction()
    {
 var_dump($HTTP_SESSION_VARS);

	$this->view->setVar('string',$this->router->getMatchedRoute()->getCompiledPattern());

    }

}

