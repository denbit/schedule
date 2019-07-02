<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

/**
 * Class Cities
 *
 * @package Schedule\Core\Models
 * @property States $current_state
 * @property Stations[] $stations
 */
class Cities extends Model
{
    public $id;
    public $latin_name;
    public $cyr_name;
    public $national_name;
    public $is_regional;
    public $local_district_id;
    public $country_id;

    public function initialize()
    {
        $this->hasMany('id',Stations::class,'city_id',['alias'=>'stations']);
        $this->hasOne('country_id',States::class,'id',['alias'=>'current_state']);
    }

    public function getSource()
    {
        return 'cities';
    }


    public static function getIdByAnyName($county_id,$name)
    {
        return self::find([
            'conditions'=>"(latin_name like ?0 or cyr_name like ?0 or national_name like ?0) and country_id=?1",
            'bind'=>[$name."%",$county_id]
        ]);

    }
}