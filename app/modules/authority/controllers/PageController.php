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

    }
    public function createAction()
    {
 var_dump($_POST);

    }

    public function formAction()
    {
        $page_sys=new PageSystem();
        $form=$page_sys->getForm();
        $this->view->form=$form;
        echo "wtf";
      //  var_dump($this->view);die;
     //   $this->view->render('page','form',$form);
    }
}