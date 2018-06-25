<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 17:38
 */

namespace Schedule\Core;


use Schedule\Core\Models\Routes;

class Route
{

    private $start_st;
    private $end_st;
    private $made_by;
    private $path;
    private $price;

    public function __construct($data_for_constructor=[])
    {if(!empty($data_for_constructor)){
        $bd=new RouteConstructor();
        $bd->createRoute(1,3,'2,7','',[]);
        //set data
    }

    }

    public function findById( int $id)
    {

       $res=Routes::findFirst($id);
       $this->start_st=Location::getLocationByStation($res->startStation);
       $this->end_st=Location::getLocationByStation($res->endStation);
       $this->made_by=$res->madeBy;
       $this->path=RouteConstructor::buildRoute($res->getTransitPath());

       return $this;
    }

    public static function findByEndCity($city)
    {

    }

    public static function findByStartCity($city)
    {

    }

    public static function fullSearch($start_city,$end_city,$date='')
    {

    }


}