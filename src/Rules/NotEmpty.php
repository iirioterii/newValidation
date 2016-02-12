<?php

namespace Rioter\Validation\Rules;


class NotEmpty extends AbstractRule
{

    public $errorMessage = " должно быть не пустое";

    public function validate($fieldName, $val, $validator)
    {
        if(is_string($val)) {
            trim($val);
        }
        return (!empty($val));
    }

}