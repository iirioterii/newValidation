<?php

namespace Rioter\Validation\Rules;


class MinNumber extends AbstractRule
{
    /**
     * @var int
     */
    protected $min = 0;

    /**
     * MinNumber constructor.
     * @param $min
     */
    public function __construct($min)
    {
        $this->min = (int) $min;
        $this->errorMessage = " must be more than or equal {$this->min}";
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        $val = (int) $val;
        return $val >= $this->min;
    }

}