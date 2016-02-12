<?php

namespace Rioter\Validation\Rules;


class MaxLength extends AbstractRule
{

    protected $length = 0;

    public function __construct($length)
    {
        $this->length = (int) $length;
        $this->errorMessage = ' должен быть не более ' . $this->length . ' символов';
    }

    public function validate($fieldName, $val, $validator)
    {
        return strlen($val) <= $this->length;
    }

}