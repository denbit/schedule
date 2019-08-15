<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class LanguageDescription extends CachableModel
{

    public function getSource()
    {
        return 'lang_desc';
    }
}