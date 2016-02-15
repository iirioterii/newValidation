<?php

namespace Rioter\Validation\Rules;


class NotEmpty extends AbstractRule
{

    /**
     * @var string
     */
    public $errorMessage = " must be no empty";

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        if(is_string($val)) {
            trim($val);
        }
        return (!empty($val));
    }

}