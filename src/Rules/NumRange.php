<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class NumRange implements Ruleable
{

    protected $min = 0;

    protected $max = 0;

    public function __construct($min, $max)
    {
        $this->min = (int) $min;
        $this->max = (int) $max;
    }

    public function validate($fieldName, $val, $validator)
    {
        $val = (int) $val;
        return ($val >= $this->min and $val <= $this->max);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . " должен быть от {$this->min} до {$this->max}";
    }

}