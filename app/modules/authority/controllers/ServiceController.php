<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\Company;
use Schedule\Core\Models\Routes;
use Schedule\Core\Models\States;
use Schedule\Core\Models\TranslationsCommon;


class IndexController extends ControllerBase
{
	use NotFound;

	public function indexAction()
	{

	}
	public function cacheAction(){
		$modelsFolder = $this->getCacheFolder('models');
		$coreFolder = $this->getCacheFolder('core');
		$voltFolder = $this->getCacheFolder('volt');
		array_map('unlink',glob($modelsFolder."/*"));

	}

}

