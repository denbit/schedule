<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 6/27/2019
 * Time: 11:07 PM
 */

namespace Schedule\Modules\Authority\Forms;


use Phalcon\Forms\Form;
use Schedule\Modules\Authority\Models\Route;

class RouteForm extends Form
{
	public function initialize(Route $input_route, $options)
	{
		$this->setEntity($input_route);


	}

}