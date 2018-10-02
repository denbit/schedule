<?php

namespace Schedule\Modules\Frontend\Controllers;

use Schedule\Core\Location;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\Company;
use Schedule\Core\Models\States;
use Schedule\Core\BusRoute;


class IndexController extends ControllerBase
{

    public function indexAction()
    {

        $all_possible=Location::findAllLocation('Ukraine','Vinny',$r);
        var_dump(count($r));

     //$r= (new BusRoute('1234'));//->findById(3);

//        $r=new BusRoute();
//        $r->setRegularity('1,2,3,4,6,7');
//        $r->setMadeBy(Company::findFirst(1));
//        $r->setStartSt($start);
//        $r->setEndSt($end);
//        $all_possible=Location::findAllLocation('UA','');
   // print_r($r->toArray());

//       $l= Location::getLocation('UA','',"Днеп",'Днеп');
//       echo  $l;
     //  var_dump($r());


//
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

