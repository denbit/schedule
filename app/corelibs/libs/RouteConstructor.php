<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 25.06.2018
 * Time: 9:36
 */

namespace Schedule\Core;


use Schedule\Core\Models\Routes;
use Schedule\Core\Models\Stations;
use Schedule\Core\Models\TransitRoutes;

class RouteConstructor extends Kernel
{

    public function createRoute(BusRoute $busroute)
    {
	     if($busroute->getStartSt()->getStation())
		     $start_id=$busroute->getStartSt()->getStation()->getId();
	     else
		     return false;
        if($busroute->getEndSt()->getStation())
	        $end_id=$busroute->getEndSt()->getStation()->getId();
        else
	        return false;
        if(Stations::count($start_id)!=1&&Stations::count($end_id)!=1)
            return false;

        $this->db->begin();
        $route=new Routes();
        $route->setStartStation($start_id);
        $route->setEndStation($end_id);
        $route->setRegularity($busroute->getRegularity());
        $route->setMadeBy($busroute->getMadeBy()->getId());
        if(!$route->save()){
            $this->db->rollback();
        return  false;
        }
	    if( ! empty($transit_result)){
        if( $route->getId()&&$this->checkTransit($busroute->getPath(),$start_id,$end_id)){
            $transit_result=$this->buildTransit($busroute->getPath(),$route->getId());
            if (!$transit_result){
                $this->db->rollback();
                return  false;
            }

	            $route->setTransitPath($transit_result);
        }
	    }

            if(!$route->update()){
                $this->db->rollback();
                return  false;
            }
            $this->db->commit();
               return $route->getId();








}

    private function checkTransit($transit_data,$start,$end)
    {
        $start_path=$transit_data[0];
        $end_path=end($transit_data);
        if(($start_path['from']==$start)&&($end_path['to']==$end))
            return true;
        else
            return false;

        // check if first is from_id ==startId and check if last toId is end id

}

    /**
     * @param $transit_data
     * @param $route_id
     * @return array
     */
    private function buildTransit($transit_data,$route_id)
    {
        if(count($transit_data)>0){
            $transit_ids=[];
            foreach ($transit_data as $place_path=> $transit_datum){
                $record=new TransitRoutes();
                $record->setFromIdStation($transit_datum['from']);//check from with does it exist
                $record->setToIdStation($transit_datum['to']);
                $record->setDeparture($transit_datum['departure']);
                $record->setArrival($transit_datum['arrival']);
                $record->setBelongsToRoute($route_id);
                if(!$record->save()){
                   echo $record->getMessages();
                }else{
                    $transit_ids[]=$record->getId();
                }

            }
            return implode(',',$transit_ids);
        }

}


	/**
	 * @param $transit_data
	 * @param $route_id
	 * @return array
	 */
	private function modifyTransit($transit_data, Routes $route)
	{

		if(!empty($transit_path=$route->getTransitPath())){
			$transit_ids=explode(',',$transit_path);
		if(count($transit_data)>0){
			$transit_ids_to_write=[];
			foreach ($transit_data as $place_path => $transit_datum){
				$record=TransitRoutes::findFirst($transit_ids[$place_path]);
				if ( $record===false){
				$record = new TransitRoutes();
				$record->setBelongsToRoute($route->getId());
				}
				$record->setFromIdStation($transit_datum['from']);//check from with does it exist
				$record->setToIdStation($transit_datum['to']);
				$record->setDeparture($transit_datum['departure']);
				$record->setArrival($transit_datum['arrival']);
				if(!$record->save()){
					echo $record->getMessages();
				}else{
					$transit_ids_to_write[]=$record->getId();
				}

			}
		}
			return implode(',',$transit_ids_to_write);
		}

	}
    public static function buildRoute($trans_data)
    {   $transit_stations=[];
	    if(!empty($trans_data)){
         $transit_ids=explode(',',$trans_data);
         foreach ($transit_ids as $transit_id){
             $station=TransitRoutes::findFirst($transit_id);
             $station->setFromIdStation(Location::getLocationByStationId($station->getFromIdStation()));
             $station->setToIdStation(Location::getLocationByStationId($station->getToIdStation()));
             $transit_stations[]=$station;
         }
	    }
	return $transit_stations;
}
	public function modifyRoute(BusRoute $busroute)
	{
		if($busroute->getStartSt()->getStation())
			$start_id=$busroute->getStartSt()->getStation()->getId();
		else
			return false;
		if($busroute->getEndSt()->getStation())
			$end_id=$busroute->getEndSt()->getStation()->getId();
		else
			return false;
		if(Stations::count($start_id)!=1&&Stations::count($end_id)!=1)
			return false;

		$this->db->begin();
		$route=Routes::findFirst($busroute->id);
		$route->setStartStation($start_id);
		$route->setEndStation($end_id);
		$route->setRegularity($busroute->getRegularity());
		$route->setMadeBy($busroute->getMadeBy()->getId());
		if(!$route->save()){
			$this->db->rollback();
			return  false;
		}
		if( ! empty($transit_result)){
			if( $route->getId()&&$this->checkTransit($busroute->getPath(),$start_id,$end_id)){
				$transit_result=$this->modifyTransit($busroute->getPath(),$route);
				if (!$transit_result){
					$this->db->rollback();
					return  false;
				}

				$route->setTransitPath($transit_result);
			}
		}

		if(!$route->update()){
			$this->db->rollback();
			return  false;
		}
		$this->db->commit();
		return $route->getId();








	}
}