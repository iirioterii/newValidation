<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class MaxNumber implements Ruleable
{

    protected $max = 0;

    public function __construct($max)
    {
        $this->max = (int) $max;
    }

    public function validate($fieldName, $val, $validator)
    {
        $val = (int) $val;
        return $val <= $this->max;
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . " должен быть меньше или равен {$this->max}";
    }

}