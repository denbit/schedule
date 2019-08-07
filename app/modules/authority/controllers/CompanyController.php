<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Modules\Authority\Models\CompanyManger;


class CompanyController extends ControllerBase
{
	use NotFound;
    public function indexAction()
    {
    	$manager= new CompanyManger();
		$this->view->companies=$manager->getList();

    }

}

