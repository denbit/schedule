<?php
namespace Schedule\Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Schedule\Core\IMainAction;
use Schedule\Core\LanguageParser;

abstract class ControllerBase extends Controller implements IMainAction
{
	protected $dynamic_routes = [];
	abstract public function indexAction();
	public function onConstruct()
	{	 $lang_q=$this->request->getQuery('lang');
		if($lang_q)
		{
			LanguageParser::SystemLanguage($lang_q);
			$this->response->redirect($this->router->getRewriteUri());
		}

		$this->dynamic_routes = \Schedule\Core\Models\UniversalPage::find(
			[
				'has_permanent_uri=?0 AND module_name LIKE ?1',
				'bind'=>[0,$this->dispatcher->getControllerName()."%"],
				'columns' => 'url, module_name',
				'group' => 'module_name'
			]
		)->toArray();
		global $debugbarRenderer;
		if ($this->config->get('application')->development==true && $debugbarRenderer) {

			$this->view->debugbarHEAD=$debugbarRenderer->renderHEAD();
			$this->view->debugbar=$debugbarRenderer->render();
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
