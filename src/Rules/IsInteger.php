<?php

namespace Rioter\Validation\Rules;


class IsInteger extends AbstractRule
{

    /**
     * @var string
     */
    public $errorMessage = ' must be an integer number';

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return is_integer($val);
    }

}