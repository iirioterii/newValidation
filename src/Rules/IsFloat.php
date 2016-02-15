<?php

namespace Rioter\Validation\Rules;


class IsFloat extends AbstractRule
{

    /**
     * @var string
     */
    public $errorMessage = ' must be a float number';

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return is_float($val);
    }

}