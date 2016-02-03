<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class MinNumber implements Ruleable
{

    protected $min = 0;

    public function __construct($min)
    {
        $this->min = (int) $min;
    }

    public function validate($fieldName, $val, $validator)
    {
        $val = (int) $val;
        return $val >= $this->min;
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . " должен быть больше или равен {$this->min}";
    }

}