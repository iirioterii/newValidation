<?php

namespace Rioter\Validation\Rules;

use Rioter\Validation\Interfaces\Ruleable;

class IsNumeric implements Ruleable
{

    public function validate($fieldName, $val, $validator)
    {
        return is_numeric($val);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должно быть числом';
    }

}