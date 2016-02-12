<?php

namespace Rioter\Validation\Rules;


class IsBool extends AbstractRule
{
    public $errorMessage = '  должно быть булевым значением';

    public function validate($fieldName, $val, $validator)
    {
        return is_bool($val);
    }

}