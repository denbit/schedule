<?php


namespace Schedule\Modules\Frontend\Controllers;


use Schedule\Modules\Authority\Models\PageManager;

class SearchController extends ControllerBase
{

	public function indexAction()
	{
		if ($this->request->getHeader('X-Passed') == 'PageManager') {
			$this->view->disable();
			echo json_encode($this->module_list);
		} else {
			$this->response->redirect('/');
		}

	}
}