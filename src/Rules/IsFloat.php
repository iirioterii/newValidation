<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class IsFloat implements Ruleable
{

    public function validate($fieldName, $val, $validator)
    {
        return is_float($val);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должен быть числом с плавающей точкой';
    }

}