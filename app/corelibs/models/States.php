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
 * Class States
 * @package Schedule\Core\Models
 * @property Cities $cities
 * @method getCities()
 */
class States extends Model implements LocationNodeInterface
{
    public $id;
    public $latin_name;
    public $cyr_name;
    public $national_name;

    /**
     * @return mixed
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

	public function initialize()
	{
		$this->hasMany('id',Cities::class,'country_id',['alias'=>'cities']);
    }

    public function getSource()
    {
        return 'states';
    }

    /**
     * @param  $name
     * @return null|States
     */
    public static function getOneByAnyName(string $name)
    {

        if(self::count([
            'conditions'=>"latin_name like ?0 or cyr_name like ?0 or national_name like ?0",
            'bind'=>[$name."%"]
            ])==1)
            return self::findFirst([
                'conditions'=>"latin_name like ?0 or cyr_name like ?0 or national_name like ?0",
                'bind'=>[$name."%"]
        ]);
        else
            return null;

    }

	/**
	 * @param $name
	 *
	 * @return States[]
	 */
    public static function getStatesByAnyName($name)
    {
        return self::find([
            'conditions'=>"latin_name like ?0 or cyr_name like ?0 or national_name like ?0",
            'bind'=>[$name."%"]
            ]);

    }

}