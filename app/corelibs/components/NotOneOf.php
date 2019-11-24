<?php


namespace Schedule\Core\Components;


use Phalcon\Text;
use Phalcon\Validation;
use Phalcon\Validation\Validator;

class  NotOneOf extends Validator
{
    /**
     * @var Validation $validation
     */
    private  $validation;
    /**
     * Executes the validation
     *
     * @param \Phalcon\Validation $validation
     * @param string $attribute
     * @return bool
     */
    public function validate(\Phalcon\Validation $validation, $attribute)
    {
        $this->validation = $validation;
        $value = $validation->getValue($attribute);
        $optionOne = $this->getOption('one');
        $optionAll = $this->getOption('all');
        if (!is_null($optionOne)) {
            return $this->notOfOne($value, $optionOne);
        } elseif (!is_null($optionAll)) {
            return $this->notOfAll($value, $optionAll);
        } else
            return true;
    }

    private function notOfOne(string $value, string $option): bool
    {
        $splitted = explode(',', $option);
        foreach ($splitted as $item) {
         if ($this->validation->getValue($item) != $value)
             return true;
        }
        return false;
    }


    private function notOfAll(string $value, string $option): bool
    {
        $splitted = explode(',', $option);
        foreach ($splitted as $item) {
            if ($this->validation->getValue($item) == $value)
                return false;
        }
        return true;
    }

}