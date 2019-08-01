<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 17:38
 */

namespace Schedule\Core;


use Schedule\Core\Models\Cities;
use Schedule\Core\Models\Company;
use Schedule\Core\Models\Routes;
use Schedule\Core\Models\TransitRoutes;

class BusRoute extends Kernel
{

    public $id;
    /**
     * @var Location
     */
    private $start_st;
    /**
     * @var Location
     */
    private $end_st;
    /**
     * @var Company
     */
    private $made_by;
    /**
     * @var TransitRoutes[]
     */
    private $path;
    /**
     * @var string
     */
    private $regularity;
    /**
     * @var Cost
     */
    private $price;

//$transit_data=[
//			['from'=>1,'to'=>4,'arrival'=>'00:00:00','departure'=>'00:20:00'],
//			['from'=>4,'to'=>2,'arrival'=>'01:00:00','departure'=>'01:05:00'],
//			['from'=>2,'to'=>3,'arrival'=>'03:00:00','departure'=>'00:00:00']
//		];
    public function on__construct($data_for_constructor=[])
    {
        if(!empty($data_for_constructor)){
        $bd=new RouteConstructor();

        $bd->createRoute(1,3,'2,7',$transit_data,[]);
        //set data
    }

    }

    /**
     * @param Location $start_st
     */
    public function setStartSt(Location $start_st): void
    {
        $this->start_st = $start_st;
    }

    /**
     * @param Location $end_st
     */
    public function setEndSt(Location $end_st): void
    {
        $this->end_st = $end_st;
    }

    /**
     * @param Company $made_by
     */
    public function setMadeBy(Company $made_by): void
    {
        $this->made_by = $made_by;
    }

    /**
     * @param array $path
     */
    public function setPath(array $path): void
    {
        $this->path = $path;
    }

    /**
     * @param Cost $price
     */
    public function setPrice(Cost $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $regularity
     */
    public function setRegularity(string $regularity): void
    {
        $this->regularity = $regularity;
    }

    public function save()
    {
        $bd=new RouteConstructor();

        $cost_data=[];
if ($this->id){
	$status =(bool)  $r_id = $bd->modifyRoute($this);
}else{
	$status =(bool) $r_id = $bd->createRoute($this);
}
     if($status){
	     $this->findById($r_id);
     }
       return $status;
    }
    /**
     * @return Location
     */
    public function getStartSt(): Location
    {
        return $this->start_st;
    }

    /**
     * @return Location
     */
    public function getEndSt(): Location
    {
        return $this->end_st;
    }

    /**
     * @return Company
     */
    public function getMadeBy(): Company
    {
        return $this->made_by;
    }

    /**
     * @return array
     */
    public function getPath(): array
    {
        return $this->path;
    }

    /**
     * @return float
     */
    public function getPrice(): array
    {
        return $this->price;
    }

	/**
	 * @return string
	 */
	public function getRegularity(): string
	{
		return $this->regularity;
	}

    public function findById( int $id)
    {

       $res=Routes::findFirst($id);
       $this->id=$id;
       $this->start_st=Location::getLocationByStation($res->startStation);
       $this->end_st=Location::getLocationByStation($res->endStation);
       $this->made_by=$res->madeBy;
       $this->regularity = $res->getRegularity();
       $this->setPath(RouteConstructor::buildRoute($res->getTransitPath()));
       $this->setPrice((new Cost())->selectRoute($this));
       return $this;
    }

	/**
	 * @param  int  $n
	 *
	 * @return self[]|bool
	 */
	public static function getLast(int $n)
	{
		$last_n = Routes::find([
			'columns' =>'id',
			'limit'=>$n,
			'order'=>'id desc'
		]);
		$busRoute = new self();
		if(count($last_n)>0){

			foreach ($last_n  as $route) {
				$route_inst = clone $busRoute;
				yield $route_inst->findById($route['id']);

			}

		}
		return false;

    }

    public function getPathSchema($use_start_end = false):array {
		if($use_start_end && empty($this->path)){
			return [
				['from'=>$this->start_st->getStation()->getId(),
					'to'=>$this->end_st->getStation()->getId()]
			];
		}
        $pathSchema=[];

        foreach ($this->path as $route){
	        $pathSchema[]=[
                'from'=>$route->getFromIdStation()->getStation()->getId(),
				'from_time'=>$route->getDeparture(),
                'to' =>$route->getToIdStation()->getStation()->getId(),
				'to_time'=>$route->getArrival()
            ];
        }
        return $pathSchema;
    }

    public function toArray()
    {
        return ['start'=>$this->start_st->toArray(),
            'end'=>$this->end_st->toArray(),
            'company.volt' => $this->made_by->toArray(),
            'path'=>array_map(function (TransitRoutes $route){
                return [
                    $route->getFromIdStation()->toArray(),
                    $route->getToIdStation()->toArray(),
                    $route->getDeparture(),
                    $route->getArrival()
                ];
            },$this->path)];

    }

    /**
     * @param $city int|Cities
     */
    public static function findByEndCity( $city)
    {
        //find city by id or check if it object City then find all stations of this city get their ids and check for END routes and transit TO routes

    }
    /**
     * @param $city int|Cities
     */
    public static function findByStartCity($city)
    {

    }

    public static function fullSearch($start_city,$end_city,$date='')
    {

    }


}
