<?php

namespace Rioter\Validation\Rules;


class IsNumeric extends AbstractRule
{

    public $errorMessage = ' должен быть целым числом';

    public function validate($fieldName, $val, $validator)
    {
        return is_numeric($val);
    }

}