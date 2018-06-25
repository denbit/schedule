<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:24
 */

namespace Schedule\Core;


use Schedule\Core\Models\Cities;
use Schedule\Core\Models\LocalRegions;
use Schedule\Core\Models\States;
use Schedule\Core\Models\Stations;

class Location
{
    /**
     * @var States
     */
    private $state;
    /**
     * @var Cities
     */
    private $city;
    /**
     * @var LocalRegions
     */
    private $local_reg;
    /**
     * @var Stations
     */
    private $station;

    /**
     * @return array
     */
    public function getState()
    {
        $info = [];
        foreach ($this->state as $k => $item) {
            $info[$k] = $item;
        }
        return $info;
    }

    /**
     * @return array
     */
    public function getCity()
    {
        $info = [];
        foreach ($this->city as $k => $item) {
            $info[$k] = $item;
        }
        return $info;
    }

    /**
     * @return array
     */
    public function getLocalReg()
    {
        $info = [];
        foreach ($this->local_reg as $k => $item) {
            $info[$k] = $item;
        }
        return $info;
    }

    /**
     * @return array
     */
    public function getStation()
    {
        $info = [];
        foreach ($this->station as $k => $item) {
            $info[$k] = $item;
        }
        return $info;


    }

    public static function findAllLocation($wildcard)//accross stitions and cities
    {
        //search accross all fields
    }

    /**
     * @param $state
     * @param $local_region
     * @param $city
     * @param $station
     * @return bool|Location
     */
    public static function getLocation($state, $local_region, $city, $station)
    {
        $state_ids = States::getIdByAnyName($state);
        if (count($state_ids) == 0 || count($state_ids) > 1) {
            return false;
        } else {
            $loc = new self();
            $loc->state = $state_ids[0];
            if (empty($local_region)) {
                $loc->local_reg = null;
                $cities_ids = Cities::getIdByAnyName($state_ids[0]->id, $city);
                if (count($cities_ids) == 0 || count($cities_ids) > 1) {
                    return false;
                } else {
                    $loc->city = $cities_ids[0];
                    $station_ids = Stations::getStationByAnyName($loc->city->id, $station);

                    if (count($station_ids) == 0 || count($station_ids) > 1) {
                        return false;
                    } else {
                        $loc->station = $station_ids[0];
                        return $loc;
                    }


                }
            }
        }

    }

    public function __toString()
    {
        $info='';
       if(!is_null($this->state)){
           $info.= "<b>State info:</b><br>";
           foreach ($this->state as $k => $item) {
               $info .= $k . ' ' . $item . "<br>";
           }
       }
        if(!is_null($this->city)){
            $info .= "<b>City Info:</b><br>";
            foreach ($this->city as $k => $item) {
                $info .= $k . ' ' . $item . "<br>";
            }
        }
        if(!is_null($this->local_reg)){
        $info .= "<b>Local Region Info:</b><br>";
        foreach ($this->local_reg as $k => $item) {
            $info .= $k . ' ' . $item . "<br>";
        }
       }
        if(!is_null($this->station)){
        $info .= "<b>Station Info:</b><br>";
        foreach ($this->station as $k => $item) {
            $info .= $k . ' ' . $item . "<br>";
        }
       }
        return $info;
    }

    public function createLocation()
    {
        //create or modify all location path
    }

    public function selectState($state)
    {

    }

    public function selectCity($city)
    {

    }

    public function addCity($data)
    {

    }
    public function addStation($data)
    {

    }
    public function addLocalRegion($data)
    {

    }


    public static function getLocalRegionByCity($wildcard)
    {

    }

    public static function getLocalRegionByStation($wildcard)
    {

    }
    public static function getLocationByStation(Stations $station)
    {
        $loc=new self();
        $loc->station=$station;
        $loc->city=Cities::findFirst($station->getCityId());
        $loc->local_reg=$loc->city->is_regional?null:LocalRegions::findFirst($loc->city->local_district_id);
        $loc->state=States::findFirst($loc->city->country_id);
        return $loc;

    }


}