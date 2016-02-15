<?php

namespace Rioter\Validation\Rules;


class IsNumeric extends AbstractRule
{

    /**
     * @var string
     */
    public $errorMessage = ' must be numeric';

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return is_numeric($val);
    }

}