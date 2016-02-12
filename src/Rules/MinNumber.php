<?php

namespace Rioter\Validation\Rules;


class MinNumber extends AbstractRule
{

    protected $min = 0;

    public function __construct($min)
    {
        $this->min = (int) $min;
        $this->errorMessage = " должен быть больше или равен {$this->min}";
    }

    public function validate($fieldName, $val, $validator)
    {
        $val = (int) $val;
        return $val >= $this->min;
    }

}