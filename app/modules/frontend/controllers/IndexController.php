<?php

namespace Schedule\Modules\Frontend\Controllers;

use Schedule\Core\Cost;
use Schedule\Core\Location;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\Company;
use Schedule\Core\Models\States;
use Schedule\Core\BusRoute;
use Schedule\Core\PageParser;
use Schedule\Modules\Frontend\Models\IndexModel;


class IndexController extends ControllerBase implements IFrontEnd
{

    public function indexAction()
    {
        $locale = \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $lang=   \Locale::getPrimaryLanguage(  $locale );
$pp=new PageParser();
$pp->getPage('j',$lang);
// Locale could be something like 'en_GB' or 'en'
        echo $locale;
//        $loc= Location::getLocationByStationId(1);
//        $loc2= Location::getLocationByStationId(4);
//        $ro=(new BusRoute());
//    $ro->findById(15);
//    $model=new IndexModel();
//    echo $model->getDataForHttpLoad();
//        //var_dump((new Cost())->selectRoute($ro)->addCostForTrip($loc,$loc2,45,Cost::UAH));
//        (new Cost())->selectRoute($ro)->getAllCosts();
      //  $r= (new BusRoute('1234'));
//        $all_possible=Location::findAllLocation('Ukraine','Киев',$r);
//var_dump($all_possible->toArray());
//        foreach ($all_possible as $a=>$b){
//            foreach ($b as $k=>$item) {
//                echo $a,' ',print_r($item->toArray(),true);
//            }
//
//            echo "<br>";
//        };
////        foreach (Location::findAllVariants("У") as $a=>$b){
//            foreach ($b as $k=>$item) {
//             echo $a,' ',print_r($item->toArray(),true);
//            }
//
//            echo "<br>";
//        };
     ////->findById(3);

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

