<?php

namespace Rioter\Validation\Rules;


class IsInteger extends AbstractRule
{

    public $errorMessage = ' должен быть целым числом';

    public function validate($fieldName, $val, $validator)
    {
        return is_integer($val);
    }

}