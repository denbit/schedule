<?php


namespace Schedule\Modules\Frontend\Controllers;




class SearchController extends ControllerBase
{

	public function indexAction()
	{
		print_r($this->dynamic_routes);
		print_r($this->dispatcher->getParams());die;
		echo 'nice';

	}
}