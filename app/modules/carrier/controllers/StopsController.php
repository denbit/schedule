<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 25.11.2018
 * Time: 12:06
 */

namespace Schedule\Modules\Carrier\Controllers;



class StopsController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->section=$this->router->getControllerName();
    }
}