<?php

namespace Rioter\Validation\Rules;


class Alpha extends AbstractRule
{

    /**
     * @var string
     */
    public $errorMessage = '  must contain only letters (a-z)';

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return ctype_alpha($val);
    }

}