<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class States extends Model
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
    public static function getStatesByAnyName($name)
    {
        return self::find([
            'conditions'=>"latin_name like ?0 or cyr_name like ?0 or national_name like ?0",
            'bind'=>[$name."%"]
            ]);

    }

}