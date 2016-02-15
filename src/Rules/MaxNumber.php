<?php

namespace Rioter\Validation\Rules;


class MaxNumber extends AbstractRule
{

    /**
     * @var int
     */
    protected $max = 0;

    /**
     * MaxNumber constructor.
     * @param $max
     */
    public function __construct($max)
    {
        $this->max = (int) $max;
        $this->errorMessage =" must be less than or equal {$this->max}";
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        if(strlen($val) === 0) return false;
        $val = (int) $val;
        return $val <= $this->max;
    }

}