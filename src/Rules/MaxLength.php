<?php

namespace Rioter\Validation\Rules;


class MaxLength extends AbstractRule
{

    /**
     * @var int
     */
    protected $length = 0;

    /**
     * MaxLength constructor.
     * @param $length
     */
    public function __construct($length)
    {
        $this->length = (int) $length;
        $this->errorMessage = ' must have a length lower than ' . $this->length;
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return strlen($val) <= $this->length;
    }

}