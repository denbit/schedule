<?php


namespace Schedule\Modules\Frontend\Controllers;


use Schedule\Modules\Authority\Models\PageManager;

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
}