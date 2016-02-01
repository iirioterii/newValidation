<?php

namespace Rioter\Validation\Rules;

use Rioter\Validation\Interfaces\Ruleable;

class IsBool implements Ruleable
{

    public function validate($fieldName, $val, $validator)
    {
        return is_bool($val);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должно быть булевым значением';
    }

}