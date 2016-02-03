<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class Alpha implements Ruleable
{

    public function validate($fieldName, $val, $validator)
    {
        return ctype_alpha($val);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должно состоять только из букв';
    }

}