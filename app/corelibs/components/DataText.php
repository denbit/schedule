<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 7/25/2019
 * Time: 7:33 PM
 */

namespace Schedule\Core\Components;


use Phalcon\Forms\Element\Text;

class DataText extends Text
{
	/**
	 * Returns an array of prepared attributes for Phalcon\Tag helpers
	 * according to the element parameters
	 *
	 * @param array $attributes
	 * @param bool  $useChecked
	 *
	 * @return array
	 */
	public function prepareAttributes(array $attributes = null, $useChecked = false)
	{
		 parent::prepareAttributes($attributes, $useChecked);
		 $attr=parent::prepareAttributes($attributes, $useChecked);
		 $attr['data-value']=$attr['value'][0];
		 $attr['value']=$attr['value'][1];
		 return $attr;
	}


}