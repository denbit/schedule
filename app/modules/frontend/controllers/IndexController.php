<?php

namespace Schedule\Modules\Frontend\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Cost;
use Schedule\Core\LanguageParser;
use Schedule\Core\Location;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\Company;
use Schedule\Core\Models\States;
use Schedule\Core\BusRoute;
use Schedule\Core\PageParser;
use Schedule\Modules\Frontend\Models\IndexModel;
use Phalcon\Forms\Element\Select;

class IndexController extends ControllerBase
{
	use NotFound;
    public function indexAction()
	 {//die;
//	 	foreach ( $this->di->getServices() as $key=>$service){
//	 	echo  $key,"=>", get_class($service),"<br>";
//	 }die;

		$model = new IndexModel();
		$lang = LanguageParser::SystemLanguage();
		$url = $this->request->getURI();
		$url_sanitized=strtok($url,'?');//crete normall get sanitize

		$page = $model->getDataForHttp(
			[
				'url' => $url_sanitized,
				'lang' => $lang,
				'module'=>$this->router->getControllerName()."::".$this->router->getActionName()
			]
		);
		$this->view->data = 'System language is '.$lang;
		$this->view->page = $page;
	}


	public function  suggestAction(){
		$this->isAjax();
		$suggestion=$this->request->getQuery('suggest');
		if ( !empty($suggestion))
		{
			$model= new IndexModel();
			return json_encode($model->searchSuggestions($suggestion));
		}
		 return json_encode(['results'=>'Nothing is available']);



	}

       // $model->chatInit();
//        $select=new Select('new',$page);
//        $select->setName("dgg");
//
//        $this->view->select=$select;

// Locale could be something like 'en_GB' or 'en'

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

//         $cities=Cities::find();
//         $data=print_r($cities->toArray(),true);
//         $this->view->data=$data;




    public function chatAction()
    {
        if ($this->request->isAjax()) {

        }

    }


}

