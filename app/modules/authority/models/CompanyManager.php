<?php


namespace Schedule\Modules\Authority\Models;


use Schedule\Core\Kernel;
use Schedule\Core\Models\Company;

class CompanyManager extends Kernel
{

	public function getList($index=5)
	{
		$companies=Company::find([
			'limit'=>$index
		]);
		return $companies;
	}
}