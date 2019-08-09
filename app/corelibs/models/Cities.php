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
 * * @property LocalRegions[] $local_regions
 * @property Stations[] $stations
 */
class Cities extends Model implements LocationNodeInterface
{
    public $id;
    public $latin_name;
    public $cyr_name;
    public $national_name;
    public $is_regional;
    public $local_district_id;
    public $belongs_to_region;

	/**
	 * @param array $fields Fields of model $fieldName => Phalcon\Db\Column Dype
	 * @return array of editable column
	 */
	public function getFields(array $fields)
	{
		unset( $fields['country_id'], $fields['belongs_to_region'], $fields['local_district_id']);
		return $fields;
	}

	/**
	 * @param int $id Id of parent model - specifies the relatin in autofilling
	 * @return null
	 */
	public function setParentId(int $id)
	{
		if ($this->is_regional)
			$this->country_id = $id;
		else
			$this->belongs_to_region;
	}

	public $country_id;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getLatinName()
	{
		return $this->latin_name;
	}

	/**
	 * @return mixed
	 */
	public function getCyrName()
	{
		return $this->cyr_name;
	}

	/**
	 * @return mixed
	 */
	public function getNationalName()
	{
		return $this->national_name;
	}

	/**
	 * @return mixed
	 */
	public function getIsRegional()
	{
		return $this->is_regional;
	}

	/**
	 * @return mixed
	 */
	public function getLocalDistrictId()
	{
		return $this->local_district_id;
	}

	/**
	 * @return mixed
	 */
	public function getCountryId()
	{
		return $this->country_id;
	}


    public function initialize()
    {
        $this->hasMany('id',Stations::class,'city_id',['alias'=>'stations']);
		$this->hasMany('id',LocalRegions::class,'belongs_to_region',['alias'=>'local_regions']);
        $this->belongsTo('country_id',States::class,'id',['alias'=>'current_state']);
    }

    public function getSource()
    {
        return 'cities';
    }


	public static function getOneByAnyName($county_id, $name)
    {
		return self::findFirst(
			[
            'conditions'=>"(latin_name like ?0 or cyr_name like ?0 or national_name like ?0) and country_id=?1",
            'bind'=>[$name."%",$county_id]
        ]);

    }
}