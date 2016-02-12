<?php

namespace Rioter\Validation\Rules;


class Negative extends AbstractRule
{

    public $errorMessage = " должно быть отрицательным числом";

    public function validate($fieldName, $val, $validator)
    {
        return ($val < 0);
    }

}