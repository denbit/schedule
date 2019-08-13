<?php

namespace Schedule\Modules\Authority\Controllers;

use Schedule\Core\Components\NotFound;
use Schedule\Core\Location;
use Schedule\Core\BusRoute;
use Schedule\Core\Models\Company;
use Schedule\Modules\Authority\Models\CompanyManager;


class CompanyController extends ControllerBase
{
	use NotFound;

	public function indexAction()
	{
		$manager = new CompanyManager();
		$this->view->companies = $manager->getList();

	}

	public function editAction()
	{
		$id = $this->dispatcher->getParam('id');

		if (false !== ($company = Company::findFirst($id))) {
			$companyForm = CompanyManager::getCompanyForm($company);
			$action = $this->url->get(
				[
					'for' => "action-save",
					'controller' => $this->dispatcher->getControllerName(),
					'action' => 'save',
					'id'=>$id
				]
			);
			$companyForm->setAction($action);
			$this->view->pick('company/form');
			$this->view->companyForm = $companyForm;
		} else {
			$this->dispatcher->forward(
				[
					'controller' => $this->dispatcher->getControllerName(),
					'action' => 'index',
				]
			);
		}

	}

	public function saveAction()
	{
		$id = $this->dispatcher->getParam('id');
		if (false !== ($company = Company::findFirst($id))) {
			$companyForm = CompanyManager::getCompanyForm($company);
			if ($companyForm->isValid($this->request->getPost())) {
				if ($company->save()) {
					$this->flashSession->success("The company  {$company->getName()} was saved succesfully");
				}
			}
		}else{
			$this->flashSession->error("System wasn't able to save company $id ");
		}

		$this->response->redirect($this->url->get([
				'for' => "action-auth",
				'controller' => $this->dispatcher->getControllerName(),
				'action' => 'index'
			]));
	}

}

