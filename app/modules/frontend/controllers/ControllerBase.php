<?php
namespace Schedule\Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Schedule\Core\IMainAction;
use Schedule\Core\LanguageParser;

abstract class ControllerBase extends Controller implements IMainAction
{
	abstract public function indexAction();
	public function onConstruct()
	{	 $lang_q=$this->request->getQuery('lang');
		if($lang_q)
		{
			LanguageParser::SystemLanguage($lang_q);
			$this->response->redirect($this->router->getRewriteUri());
		}

	 }
	protected function isAjax():bool
	{
		if( !$this->request->isAjax()){
			 $this->response
				->setStatusCode(403,"Nice try")
				->setContent("Something went wrong!")
				->send();

			return (false  & exit(0));
		}
		return true;
	}

}
