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

class RouteConstructor
{
    public function createRoute($start_id,$end_id,$regularity,$transit_data,$cost_data,$made_by=1)
    {
        if(Stations::count($start_id)!=1&&Stations::count($end_id)!=1)
            return false;
        $route=new Routes();
        $route->setStartStation($start_id);
        $route->setEndStation($end_id);
        $route->setRegularity($regularity);
        $route->setMadeBy($made_by);
        try{$route->save();}
        catch (\Exception $exception){
            echo $exception->getMessage();
        }
        if( $route->getId()&&$this->checkTransit($transit_data,$start_id,$end_id)){
            $transit_result=$this->buildTransit($transit_data,$route->getId());
            if($this->writeCost($transit_result,$cost_data))
                return true;
        }


}

    private function checkTransit($transit_data,$start,$end)
    {


}

    /**
     * @param $transit_data
     * @param $route_id
     * @return array
     */
    private function buildTransit($transit_data,$route_id)
    {

}

    /**
     * @param $transit_data
     * @param $cost_data
     * @return bool
     */
    private function writeCost($transit_data,$cost_data)
    {

}

    public static function buildRoute($trans_data)
    {
        echo $trans_data;
}
    public function modifyRoute()
    {

}
}