<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class Stations extends Model
{
    private $city_id;

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    public static function getStationByAnyName($city_id,$name)
    {
        return self::find([
            'conditions'=>"(latin_name like ?0 or cyr_name like ?0 or national_name like ?0) and city_id=?1",
            'bind'=>[$name."%",$city_id]
        ]);

    }

    public function getSource()
    {
        return 'stations';
    }
}