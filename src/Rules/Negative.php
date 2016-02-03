<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class Negative implements Ruleable
{

    public function validate($fieldName, $val, $validator)
    {
        return ($val < 0);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . " должно быть больше 0";
    }

}