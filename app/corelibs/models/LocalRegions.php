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


	public function initialize()
	{
		$this->hasMany('id',Cities::class,'local_district_id',['alias'=>'towns']);
	}
    public function getSource()
    {
        return 'local_regions';
    }
}