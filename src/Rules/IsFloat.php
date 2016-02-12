<?php

namespace Rioter\Validation\Rules;


class IsFloat extends AbstractRule
{
    public $errorMessage = ' должен быть числом с плавающей точкой';

    public function validate($fieldName, $val, $validator)
    {
        return is_float($val);
    }

}