<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 25.11.2018
 * Time: 12:06
 */

namespace Schedule\Modules\Transporters\Controllers;



class SellsController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->section=$this->router->getControllerName();
    }
}