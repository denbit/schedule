<?php


namespace Schedule\Modules\Frontend\Controllers;


class ListController  extends ControllerBase
{

	public function  mainAction(){
		$this->view->disable();
		echo json_encode($this->module_list);
	}
}