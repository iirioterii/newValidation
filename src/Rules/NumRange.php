<?php

namespace Rioter\Validation\Rules;


class NumRange extends AbstractRule
{

    protected $min = 0;

    protected $max = 0;

    public function __construct($min, $max)
    {
        $this->min = (int) $min;
        $this->max = (int) $max;
        $this->errorMessage = " должен быть от {$this->min} до {$this->max}";
    }

    public function validate($fieldName, $val, $validator)
    {
        $val = (int) $val;
        return ($val >= $this->min and $val <= $this->max);
    }

}