<?php

namespace Schedule\Modules\Carrier\Controllers;

use Schedule\Core\CompanyInstance;

use Schedule\Modules\Carrier\Forms\CompanyForm;
use Schedule\Modules\Carrier\Forms\PersonalDataForm;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $config = $this->di->getConfig();

        $c_inst = CompanyInstance::findCompanyById(1);
        $persnonaldata = new PersonalDataForm($c_inst);
        $this->view->form = $persnonaldata;
        $this->view->section=$this->router->getActionName();
        $this->view->var_dump = print_r($config, true);
    }

    public function companyAction()
    {
        $config = $this->di->getConfig();

        $c_inst = CompanyInstance::findCompanyById(1);
        $companyInfo = new CompanyForm($c_inst);
        $this->view->form = $companyInfo;
        $this->view->var_dump = print_r($config, true);
        $this->view->section=$this->router->getActionName();

    }

}

