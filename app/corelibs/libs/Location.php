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

    public static function findLocation($wildcard)
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
                    foreach ($cities_ids as $a => $b) {
                        foreach ($b as $k => $item) {
                            echo $k, ' ', $item;
                        }
                        echo "<br>";
                    }
                }
            }

        }

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

    public static function getLocalRegionByCity()
    {

    }

    public static function getLocalRegionByStation()
    {

    }


}