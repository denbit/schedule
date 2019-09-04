<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Kernel;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\Company;
use Schedule\Core\Models\Routes;
use Schedule\Core\Models\States;
use Schedule\Core\Models\TranslationsCommon;


class ServiceController extends ControllerBase
{
	use NotFound;

	public function indexAction()
	{

	}
	public function cacheAction(){
		$di =$this->di;
		$cache_services =['models','core','volt'];
		set_time_limit(0);
		ob_implicit_flush(1);
		header('Content-Encoding: none'); // Disable gzip compression
		foreach ($cache_services as $service){
			$cacheServiceFolder = $di->getCacheFolder($service);
			$cache_service = $this->getCacheArray($cacheServiceFolder);
			array_map('unlink',$cache_service->items);
			echo " $service cache was flushed. {$cache_service->count} records were deleted";
			flush();
			ob_end_flush();
			sleep(1);
		}



	}
	public function getCacheArray($dir){
		$array = glob($dir."/*");
		return Kernel::toObject([
			'items'=>$array,
			'count' => count($array)
			]);
	}

}

