<?php

namespace Schedule\Modules\Transporters\Controllers;

use Schedule\Core\CompanyInstance;

use Schedule\Modules\Transporters\Forms\CompanyForm;
use Schedule\Modules\Transporters\Forms\PersonalDataForm;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $config = $this->di->getConfig();

        $c_inst = CompanyInstance::findCompanyById(1);
        $persnonaldata = new PersonalDataForm($c_inst);
        $this->view->form = $persnonaldata;
        $this->view->section = str_replace('Action', '', __FUNCTION__);
        $this->view->var_dump = print_r($config, true);
    }

    public function companyAction()
    {
        $config = $this->di->getConfig();

        $c_inst = CompanyInstance::findCompanyById(1);
        $companyInfo = new CompanyForm($c_inst);
        $this->view->form = $companyInfo;
        $this->view->var_dump = print_r($config, true);
        $this->view->section = str_replace('Action', '', __FUNCTION__);

    }

}

