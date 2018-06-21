<?php

namespace Schedule\Modules\Frontend\Controllers;

use Schedule\Core\Location;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
       $l= Location::getLocation('UA','',"Днеп",'Днеп');
       echo  $l;
       var_dump($l->getCity());
//        foreach ($l as $a => $b) {
//            foreach ($b as $k => $item) {
//                echo $k, ' ', $item;
//            }
//            echo "<br>";}
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

