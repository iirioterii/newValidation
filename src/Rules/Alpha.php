<?php

namespace Rioter\Validation\Rules;


class Alpha extends AbstractRule
{
    public $errorMessage = '  должно состоять только из букв';

    public function validate($fieldName, $val, $validator)
    {
        return ctype_alpha($val);
    }


}