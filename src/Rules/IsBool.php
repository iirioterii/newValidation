<?php

namespace Rioter\Validation\Rules;


class IsBool extends AbstractRule
{

    /**
     * @var string
     */
    public $errorMessage = '  must be boolean(true or false)';

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return is_bool($val);
    }

}