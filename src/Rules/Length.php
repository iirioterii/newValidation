<?php

namespace Rioter\Validation\Rules;


class Length extends AbstractRule
{

    /**
     * @var int
     */
    protected $length = 0;

    /**
     * Length constructor.
     * @param $length
     */
    public  function __construct($length)
    {
        $this->length = (int) $length;
        $this->errorMessage = ' must be ' . $this->length . ' characters in length';
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return strlen($val) === $this->length;
    }

}