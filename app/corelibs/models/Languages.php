<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;
use Phalcon\Text;

class Languages extends CachableModel
{


    public function getSource()
    {
        return 'site_langs';
    }

    public function initialize()
    {
        $this->hasMany('lang_id',LanguageDescription::class,'in_lang_id',['alias'=>'allangs', 'reusable' => true]);
    }
}