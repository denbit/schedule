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
 * Class Stations
 * @property StationsTranslations $translation
 * @package Schedule\Core\Models
 */
class Stations extends Model implements LocationNodeInterface
{
    private $id;
    private $city_id;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

	/**
	 * @param array $fields Fields of model $fieldName => Phalcon\Db\Column Dype
	 * @return array of editable column
	 */
	public function getFields(array $fields)
	{
		// TODO: Implement getFields() method.
	}

	/**
	 * @param int $id Id of parent model - specifies the relatin in autofilling
	 * @return null
	 */
	public function setParentId(int $id)
	{
		// TODO: Implement setParentId() method.
	}

	public function copyFromCity(Cities $city)
	{
		$this->city_id= $city->id;
		$this->cyr_name=$city->cyr_name;
		$this->latin_name=$city->latin_name;
		$this->national_name=$city->national_name;
		$this->desc_for_own = " Content cpoied from ".$city->latin_name;
		$this->tel='0';
		$this->save();
			return $this;
}


    /**
     * @return int
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

	public function getDetails($lang_id)
	{
		$this->getTranslation(["lang_id=".$lang_id])->toArray();
    }

	public function initialize()
	{
		$this->hasMany('id',StationsTranslations::class,'station_id',['alias'=>'translation']);
    }
    public function getSource()
    {
        return 'stations';
    }
}