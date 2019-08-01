<?php
namespace Schedule\Modules\Cli\Tasks;

use Schedule\Core\Models\Cities;
use Schedule\Core\Models\Stations;

class Create_stationsTask extends \Phalcon\Cli\Task
{
    public function mainAction()
    { $i=0;
	    $city_list = Cities::find();
	    $new_station = new Stations();
	    foreach ($city_list as $city) {
	    	if ($city->getStations()->count()==0){
	    		$new_station_entity = clone $new_station;
			    $entity=$new_station_entity->copyFromCity($city);
			    if($entity){
			    	$i++;
			    }
		    }

	    }
	    echo $i;



    }

}
