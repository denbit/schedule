<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 16.10.2018
 * Time: 14:53
 */

namespace Schedule\Modules\Authority\Controllers;


use Schedule\Core\PageParser;
use Schedule\Modules\Authority\Models\PageSystem;

class PageController extends ControllerBase
{

    public function indexAction()
    {
        $page_sys=new PageSystem();
        $uni_pages=$page_sys->getAllPages();
        $this->view->pages=$uni_pages;
    }
    public function createAction()
    {   $pp=new PageParser();
        $page_sys=new PageSystem();
        $form=$page_sys->getForm($pp);

        if($form->isValid($_POST,$pp)){
        var_dump($pp);
        $pp->savePage();
        }
    }

    public function formAction()
    { $pp=new PageParser();
        $page_sys=new PageSystem();
        if($this->request->getQuery('edit')){
          if(($params=$this->dispatcher->getParams())!==false&&(!empty($params[0]))){
              $uri='';
              $lang='';
              $module=$params[0];
              $form=$page_sys->getForm($pp->getPage('uk','',$module));
              }
        }else{
            $form=$page_sys->getForm($pp);
        }

        $this->view->form=$form;

    }
}