<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 03.10.2018
 * Time: 16:13
 */

namespace Schedule\Core;


use Schedule\Core\Models\PricingToRoute;

class Cost extends Kernel
{
    protected $route_costs=[];
    const USD='usd';
    const UAH='uah';
    const EUR='eur';

    /**
     * @var BusRoute
     */
    private $route;

    public function addCostForTrip(Location $from, Location $to,$cost,$currency)
    {
        if($this->checkIfTripPossible($from,$to)){
            $price=new PricingToRoute();
            $price->setPrice($cost);
            $price->setCurrency($currency);
            $price->setFromStationId($from->getStation()->getId());
            $price->setToStationId($to->getStation()->getId());
            $price->setToRoute($this->route->id);
            if($price->save()){
            }
            else
            {echo $price->getMessages();}

        }
    }

    private function checkIfTripPossible( Location $from,Location $to)
    {
       $from_id= $from->getStation()->getId();
        $to_id= $to->getStation()->getId();
        if(!$this->checkIfPriceExists($from_id,$to_id))
            return false;
        foreach ($this->route->getPath() as $k=>$r){
            if($r->getFromStation()==$from){
                $end=$this->route->getPath();
                $left=count($end)-($k+1);
                for($s=$k;$s<=$left;$s++){
                   // echo "station compare"; var_dump($to==$end[$s]->getToStation());echo "\n";
                    if($end[$s]->getToStation()==$to){
                       return true;
                    }
                }
                break;
            }
        }
        return false;

    }

    public function getAllCosts():array
    {
        $this->route_costs=PricingToRoute::find([
            "to_route=?0",
            'bind'=>[$this->route->id]
        ]);
        $this->orderCostsByPath();
        return $this->route_costs;

    }


    private function  recur_ksort(&$array) {

             foreach ($array as &$value) {
      if (is_array($value)){
          $this->recur_ksort($value);
      }
             }
         ksort($array);
    }

    public function addCostToList($cost)
    {

    }
    private function orderCostsByPath(){
        $schema=$this->route->getPathSchema();
        // var_dump($schema);
        $sc=[];

        foreach ($this->route_costs as $item) {
            for($s=0;$s<count($schema);$s++){
                $cmp=$item->toArray();
                if ($cmp['from_station_id']==$schema[$s][0]){
                    echo "found start{$cmp['from_station_id']}\n";
                    for($j=0;$j<count($schema);$j++){
                        if($cmp['to_station_id']==$schema[$j][1]){
                            //var_dump($cmp);
                            echo "it s place is {$j} on level $s\n";
                            $sc[$s][$j]=$item;
                        }
                    }
                }
            }
        } //var_dump($sc);
        $this->recur_ksort($sc );
        $this->route_costs=[];
        foreach ($sc as $k=>$v){
            foreach ($v as $kk=>$value){
                array_push($this->route_costs,$value);
                echo " level $k place $kk is :".print_r($value->toArray(),true);
            }
        }

    }
    private function checkIfPriceExists($from_id,$to_id)
    {

        if(PricingToRoute::findFirst(["from_station_id=?0 and to_station_id=?1 and to_route=?2",
            'bind'=>[$from_id,$to_id,$this->route->id]])===false){
            return true;
        }else
            return false;
    }
    public function selectRoute(BusRoute $route)
    {
        $this->route=$route;
        return $this;

    }


}