<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Kernel;
use Schedule\Core\LanguageParser;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Core\Models\TranslationsCommon;
use Schedule\Core\Translate;


class TranslationController extends ControllerBase
{

    public function indexAction()
    {
		$translations = Translate::getAllTransations();
		if(count($translations)>0){
			$this->view->translations =(object) $translations;
		//	var_dump($translations);die;
		}
    }

	public function editAction()
	{
	 $instance = $this->dispatcher->getParam('id');
	 $list = Translate::getByKey($instance);
	 $this->view->langs = LanguageParser::ListLanguages();
	 $this->view->pair = $list->_langs;

    }

	public function saveAction()
	{

		$instance = $this->dispatcher->getParam('id');
		$post= $this->request->getPost();
		$new_post=[];
		 array_walk($post,function ($value,$key) use( &$new_post){
			$new_key= preg_replace("/^k_([a-z\_]{2,2}|[0-9]+)/","\$1",$key);
			$new_post[$new_key] = $value;

		} );
		 //start transactions
		 foreach ($new_post as $key=>$new_value){
		 	if(is_numeric($key)){
		 		$translation = TranslationsCommon::findFirst($key);
		 		$translation->setDescription($new_value);
		 		$translation->save();
		    } else{
		 		$lang_id=Kernel::getLanguageId($key);
		 		Translate::setTranslation($instance,$lang_id,$new_value);
		    }
		 }
		 //end transation
		$this->dispatcher->forward([
			'controller'=>$this->dispatcher->getActiveController(),
			'action'=>'index'
		]);

    }

	public function deleteAction()
	{
		$instance = $this->dispatcher->getParam('id');
		$list = TranslationsCommon::find([
			'key=?0',
			'bind' => [$instance]
		]);
		foreach ($list as $item ){
			$item->delete();
		};
    }

}

