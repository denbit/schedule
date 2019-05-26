<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 05.10.2018
 * Time: 12:55
 */

namespace Schedule\Modules\Frontend\Models;


interface IModel
{
    public function getDataForHTTP($input);
    public function getDataForAjax($input);


}