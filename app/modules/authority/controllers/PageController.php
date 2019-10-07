<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 16.10.2018
 * Time: 14:53
 */

namespace Schedule\Modules\Authority\Controllers;


use Phalcon\Mvc\Model\Transaction\Exception;
use Schedule\Core\Models\PagesTypes;
use Schedule\Core\PageParser;
use Schedule\Modules\Authority\Models\PageManager;

class PageController extends ControllerBase implements ICreatable,IEditable
{
	public function initialize()
	{
		$this->view->page_types = json_encode(array_column(PagesTypes::find()->toArray(),'id','type_name'));
	}
	public function saveAction()
	{
		$pp=new PageParser();
		$page_sys=new PageManager();
		$form=$page_sys->getForm();

		if($form->isValid($_POST,$pp)){
			try{
				$pp->savePage();
			}
			catch (Exception $save_ex){
				$this->flashSession->error($save_ex->getMessage());
			}

			$this->flashSession->success("The page module ".$pp->module_name." was successfully saved ");
		}
	}

	public function editAction()
	{
		$page_manager=new PageManager();
		if(($params = $this->dispatcher->getParams())!==false && !empty($params[0])){
			$uri='';
			if (($lang_id = $this->request->getQuery('lang')) === false) {
				$this->response->redirect($this->router->getRewriteUri());
				exit();
			}
			$lang = PageParser::getLanguageById($lang_id);
			$module = $params[0];
			$this->view->form = $page_manager->getForm(PageParser::getPage($lang, '', $module),true);
			$this->view->setVar('title','Editing of existing page');
			$this->view->pick('page/form');

		}
	}


	public function indexAction()
    {
        $page_manger = new PageManager();
        $this->view->pages = $page_manger->getListOfPages();;
    }

	/**
	 * @deprecated
	 */
    public function createAction()
    {
    	$this->saveAction();

    }
//        $this->dispatcher->forward([
//              "module"     => "Authority",
//              "controller" => "page",
//              "action"     => "index",
//        ]);
    public function formAction()
    {
        $page_sys=new PageManager();
        if($this->request->getQuery('edit')){
        	$this->editAction();
        	return;
        }else{
            $form = $page_sys->getForm();
            $this->view->setVar('title','Creation of new page');
			$this->view->form=$form;
        }
    }

	public function cloneAction()
	{
		$page_to_clone = $this->dispatcher->getParam('id');
		if (!$page_to_clone)
		{
			$this->response->redirect($this->router->getRewriteUri());
		}
		$page_manager = new PageManager();
		$this->view->form = $page_manager->clonePageFromExisting($page_to_clone);
		$this->view->setVar('title','Склонована сторінка');
		$this->view->pick('page/form');
    }
}