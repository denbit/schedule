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

    public function getSource()
    {
        return 'states';
    }

    public static function getIdByAnyName($name)
    {
        return self::find([
            'conditions'=>"latin_name like ?0 or cyr_name like ?0 or national_name like ?0",
            'bind'=>[$name."%"]
            ]);

    }

}