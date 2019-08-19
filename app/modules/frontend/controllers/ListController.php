<?php


namespace Schedule\Modules\Frontend\Controllers;




class ListController extends ControllerBase
{

	public function mainAction()
	{
		if ($this->request->getHeader('X-Passed') == 'PageManager') {
			$this->view->disable();
			echo json_encode($this->module_list);
		} else {
			$this->response->redirect('/');
		}


	}

	public function indexAction()
	{
		// TODO: Implement indexAction() method.
	}
}