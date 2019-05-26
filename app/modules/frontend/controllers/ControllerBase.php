<?php
namespace Schedule\Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	protected function isAjax():bool
	{
		if(!$this->request->isAjax()){
			 $this->response
				->setStatusCode(403,"Nice try")
				->setContent("Something went wrong!")
				->send();

			return (false  & exit(0));
		}
		return true;
	}
}
