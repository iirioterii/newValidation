<?php

namespace Rioter\Validation\Rules;


class MinLength extends AbstractRule
{

    /**
     * @var int
     */
    protected $length = 0;

    /**
     * MinLength constructor.
     * @param $length
     */
    public function __construct($length)
    {
        $this->length = (int) $length;
        $this->errorMessage = ' must have a length greater than ' . $this->length;
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return strlen($val) >= $this->length;
    }

}