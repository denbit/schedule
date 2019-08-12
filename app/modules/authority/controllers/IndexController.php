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
		$statistics = [
			'routes' => Routes::count(),
			'states' => States::count(),
			'cities' => Cities::count(['is_regional=1']),
			'towns' => Cities::count(['is_regional=0']),
			'companies' => Company::count(),
			'strings' => TranslationsCommon::count(
				[
					'distinct' => 'key',
				]
			),

		];
		$this->view->statistics = $statistics;


	}

}

