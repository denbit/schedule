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
        $info = "State info:<br>";
        foreach ($this->state as $k => $item) {
            $info .= $k . ' ' . $item . "<br>";
        }
        $info .= "City Info:<br>";
        foreach ($this->city as $k => $item) {
            $info .= $k . ' ' . $item . "<br>";
        }
        $info .= "Local Region Info:<br>";
        foreach ($this->local_reg as $k => $item) {
            $info .= $k . ' ' . $item . "<br>";
        }
        $info .= "Station Info:<br>";
        foreach ($this->station as $k => $item) {
            $info .= $k . ' ' . $item . "<br>";
        }
        return $info;
    }

    public function createLocation()
    {
        //create or modify all location path
    }

    public function createStation()
    {

    }

    public function addCity()
    {

    }

    public function addState()
    {

    }

    public static function getLocalRegionByCity($wildcard)
    {

    }

    public static function getLocalRegionByStation($wildcard)
    {

    }


}