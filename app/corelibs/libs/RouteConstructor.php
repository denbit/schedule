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
        echo $route->getId();


}

    private function checkTransit($transit_data,$start,$end)
    {


}

    public function modifyRoute()
    {

}
}