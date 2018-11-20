<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 16.10.2018
 * Time: 14:56
 */

namespace Schedule\Modules\Authority\Models;


use Schedule\Core\Models\UniversalPage;
use Schedule\Modules\Authority\Forms\PageForm;

class PageSystem
{

    public function getForm($i)
    {
       return $new=new PageForm($i);
        
    }

    public function getAllPages()
    {
        $uni=UniversalPage::getAllPages();
        return $uni;
    }
}