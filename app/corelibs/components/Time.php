<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 7/25/2019
 * Time: 7:33 PM
 */

namespace Schedule\Core\Components;


use Phalcon\Forms\Element;
use Phalcon\Tag;

class Time extends Element
{
	/**
	 * Renders the element widget
	 *
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function render($attributes = null):string
	{
		return Tag::timeField($this->prepareAttributes($attributes));
	}


}