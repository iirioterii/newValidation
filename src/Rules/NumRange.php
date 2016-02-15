<?php

namespace Rioter\Validation\Rules;


class NumRange extends AbstractRule
{

    /**
     * @var int
     */
    protected $min = 0;

    /**
     * @var int
     */
    protected $max = 0;

    /**
     * NumRange constructor.
     * @param $min
     * @param $max
     */
    public function __construct($min, $max)
    {
        $this->min = (int) $min;
        $this->max = (int) $max;
        $this->errorMessage = " must have a length between {$this->min} and {$this->max}";
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
        return ($val >= $this->min and $val <= $this->max);
    }

}