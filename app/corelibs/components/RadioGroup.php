<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 7/25/2019
 * Time: 7:33 PM
 */

namespace Schedule\Core\Components;


use Phalcon\Forms\Element;
use Phalcon\Forms\Exception;
use Phalcon\Tag;

class RadioGroup extends Element
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
//	public function prepareAttributes(array $attributes = null, $useChecked = false)
//	{
//		 parent::prepareAttributes($attributes, $useChecked);
//		 $attr = parent::prepareAttributes($attributes, $useChecked);
//		 if(isset($attr['value']) && is_array($attr['value'])){
//			 $attr['data-value']=$attr['value']['id'];
//			 $attr['value']=$attr['value']['title'];
//		 }
//
//		 return $attr;
//	}

	public function __construct($name, array $defaultValues, $attributes = null)
	{
		if (count($defaultValues) !== 2){
			throw new Exception("RadioGroup must have default values",-1);
		}
		$this->setUserOption('values', $defaultValues);
		$this->setUserOption('div', $attributes['div']);
		$this->setUserOption('label', $attributes['label']);
		parent::__construct($name, $attributes['input']);
	}

	/**
	 * Renders the element widget
	 *
	 * @param array $attributes
	 * @return string
	 */
	public function render($attributes = null)
	{
		$attributes =  $this->getAttributes();


		$options = $this->getUserOption('values');
		$result = array_reduce(array_keys($options),function ($_rendered, $key) use ($attributes, $options){
			$radioOne = new Element\Radio($this->_name);
			$radioOne->setDefault($key);
			$div_attrs = $this->getUserOption('div')??[];
			$label_attrs = $this->getUserOption('label')??[];
			$_rendered .= Tag::tagHtml('div', $div_attrs,false,true) .
							$radioOne->render($attributes) .
							Tag::tagHtml('label', $label_attrs,false,true) .  $options[$key] . Tag::tagHtmlClose('label') .
						Tag::tagHtmlClose('div');
			return $_rendered;
		},'');

//		$radioTwo = new Element\Radio($this->_name);
//		$radioTwo->setDefault(0);
//		$result = $radioOne->render($attributes) . $radioTwo->render($attributes);
		return  $result;

	}
}