<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\LanguageParser;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
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

    }


}

