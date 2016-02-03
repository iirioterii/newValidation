<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class IsInteger implements Ruleable
{

    public function validate($fieldName, $val, $validator)
    {
        return is_integer($val);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должен быть целым числом';
    }

}