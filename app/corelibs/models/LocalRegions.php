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
class LocalRegions extends Model
{

	public function initialize()
	{
		$this->hasMany('id',Cities::class,'local_district_id',['alias'=>'towns']);
	}
    public function getSource()
    {
        return 'local_regions';
    }
}