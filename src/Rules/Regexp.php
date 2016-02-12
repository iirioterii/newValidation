<?php

namespace Rioter\Validation\Rules;


class Regexp extends AbstractRule
{

    protected $regex;

    public function __construct($regex)
    {
        $this->regex = $regex;
        $this->errorMessage = " несовпадает с паттерном {$this->regex}";
    }

    public function validate($fieldName, $val, $validator)
    {
        return (bool) preg_match($this->regex, $val);
    }

}