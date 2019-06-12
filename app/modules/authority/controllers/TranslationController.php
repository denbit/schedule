<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Core\Translate;


class TranslationController extends ControllerBase
{

    public function indexAction()
    {
		$translations = Translate::getAllTransations();
		if(count($translations)>0){
			$this->view->transltions = $translations;
		}
    }


}

