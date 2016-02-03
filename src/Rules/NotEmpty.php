<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class NotEmpty implements Ruleable
{

    public function validate($fieldName, $val, $validator)
    {
        if(is_string($val)) {
            trim($val);
        }
        return (!empty($val));
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . " должно быть не пустое";
    }

}