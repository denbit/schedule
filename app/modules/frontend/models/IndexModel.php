<?php
namespace Schedule\Modules\Frontend\Models;
use Phalcon\Mvc\Model;
use Schedule\Core\PageParser;

class IndexModel extends Model implements IModel
{
    public function getDataForHTTP($input)
    {
       $pageParser=new PageParser();
       return $pageParser->getPage($input['lang'],$input['url']);

    }

    public function getDataForAjax($input)
    {
        // TODO: Implement getDataForAjax() method.
    }

}