<?php

namespace Rioter\Validation\Rules;


class Length extends AbstractRule
{

    protected $length = 0;

    public  function __construct($length)
    {
        $this->length = (int) $length;
        $this->errorMessage = ' должен быть ' . $this->length . ' символов в длину';
    }

    public function validate($fieldName, $val, $validator)
    {
        return strlen($val) === $this->length;
    }

}