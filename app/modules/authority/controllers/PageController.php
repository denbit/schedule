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
	public function saveAction()
	{
		// TODO: Implement saveAction() method.
	}

	public function editAction()
	{
		// TODO: Implement editAction() method.
	}


	public function indexAction()
    {
        $page_manger=new PageManager();
        $uni_pages=$page_manger->getListOfPages();
        $this->view->pages=$uni_pages;
    }
    public function createAction()
    {   $pp=new PageParser();
        $page_sys=new PageManager();
        $form=$page_sys->getForm($pp);

        if($form->isValid($_POST,$pp)){
        	try{
				$pp->savePage();
			}
			catch (Exception $save_ex){
        		$this->flashSession->error($save_ex->getMessage());
			}

            $this->flashSession->success("The page module ".$pp->module_name." was successfully saved ");
        }




//        $this->dispatcher->forward([
//              "module"     => "Authority",
//              "controller" => "page",
//              "action"     => "index",
//        ]);
    }

    public function formAction()
    {
        $pp = new PageParser();
        $page_sys=new PageManager();
        if($this->request->getQuery('edit')){
          if(($params=$this->dispatcher->getParams())!==false && (!empty($params[0]))){
              $uri='';
              if ((($lang_id = $this->request->getQuery('lang')) !== false)) {
                  $lang = PageParser::getLanguageById($lang_id);
              } else {
                  $this->response->redirect($this->router->getRewriteUri());
                  exit();
              }

              $module=$params[0];
              $form = $page_sys->getForm($pp->getPage($lang, '', $module),true);
              $this->view->setVar('title','Editing of existing page');
              }
        }else{
            $form=$page_sys->getForm($pp);
            $this->view->setVar('title','Creation of new page');
        }

        $this->view->form=$form;
        $this->view->page_types = json_encode(array_column(PagesTypes::find()->toArray(),'id','type_name'));//die;

    }

	public function cloneAction()
	{
		
    }
}