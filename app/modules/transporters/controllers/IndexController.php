<?php

namespace Schedule\Modules\Transporters\Controllers;

use Schedule\Core\CompanyInstance;

use Schedule\Modules\Transporters\Forms\PersonalDataForm;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $config = $this->di->getConfig();
        var_dump($config);
        $c_inst = CompanyInstance::findCompanyById(0);
        $persnonaldata = new PersonalDataForm($c_inst);
        $this->view->form = $persnonaldata;



    }

}

