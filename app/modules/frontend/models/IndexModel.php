<?php
namespace Schedule\Modules\Frontend\Models;
use Phalcon\Mvc\Model;
class IndexModel extends Model implements IModel
{
    public function getDataForHTTP($input)
    {
        // TODO: Implement getDataForHTTP() method.
    }

    public function getDataForAjax($input)
    {
        // TODO: Implement getDataForAjax() method.
    }

    public function getDataForHttpLoad()
    {
        return "works";

}
}