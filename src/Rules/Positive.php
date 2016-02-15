<?php

namespace Rioter\Validation\Rules;


class Positive extends AbstractRule
{

    /**
     * @var string
     */
    public $errorMessage = " must be positive";

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool\
     */
    public function validate($fieldName, $val, $validator)
    {
        return ($val > 0);
    }

}