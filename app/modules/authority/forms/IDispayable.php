<?php


namespace Schedule\Modules\Authority\Forms;
use Phalcon\Mvc\Model;
use Phalcon\Forms\Form;
interface IDispayable
{
public static function getForm($instance =null, $options = []);

}