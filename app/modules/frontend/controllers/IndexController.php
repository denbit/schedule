<?php

namespace Schedule\Modules\Frontend\Controllers;

use Schedule\Core\Location;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\States;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        Location::getLocation('UA','',"Kha",'');
//        foreach (States::getIdByAnyName('Ан') as $a=>$b){
//            foreach ($b as $k=>$item) {
//             echo $k,' ',$item;
//            }
//
//            echo "<br>";
//        };
die;
//         $cities=Cities::find();
//         $data=print_r($cities->toArray(),true);
//         $this->view->data=$data;


    }

}

