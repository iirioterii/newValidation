<?php

namespace Rioter\Validation\Rules;


class Positive extends AbstractRule
{

    public $errorMessage = " должно быть положительным числом";

    public function validate($fieldName, $val, $validator)
    {
        return ($val > 0);
    }

}