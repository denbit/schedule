<?php
function replace($subject,$what,$to){
	return str_replace($what, $to, $subject);
}
function OneOf(...$options){
    foreach ($options as $option){
        if ( ! is_null($option))
            return $option;
    }
    return false;
}