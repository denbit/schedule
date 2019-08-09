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
 * Class LocalRegions
 * @package Schedule\Core\Models
 * @property Cities[] $towns
 */
class LocalRegions extends Model implements LocationNodeInterface
{
public $id;
public $latin_name;
public $national_name;
public $cyr_name;
public $belongs_to_region;
	/**
	 * @param array $fields Fields of model $fieldName => Phalcon\Db\Column Dype
	 * @return array of editable column
	 */
	public function getFields(array $fields)
	{
		unset($fields['belongs_to_region']);
		return $fields;
	}

	/**
	 * @param int $id Id of parent model - specifies the relatin in autofilling
	 * @return null
	 */
	public function setParentId(int $id)
	{
		$this->belongs_to_region = $id;
	}


	public function initialize()
	{
		$this->hasMany('id',Cities::class,'local_district_id',['alias'=>'towns']);
	}
    public function getSource()
    {
        return 'local_regions';
    }
}