<?php

namespace Rioter\Validation\Rules;


class MaxNumber extends AbstractRule
{

    protected $max = 0;

    public function __construct($max)
    {
        $this->max = (int) $max;
        $this->errorMessage =" должен быть меньше или равен {$this->max}";
    }

    public function validate($fieldName, $val, $validator)
    {
        $val = (int) $val;
        return $val <= $this->max;
    }

}