<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class Regexp implements Ruleable
{

    protected $regex;

    public function __construct($regex)
    {
        $this->regex = $regex;
    }

    public function validate($fieldName, $val, $validator)
    {
        return (bool) preg_match($this->regex, $val);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' несовпадает с паттерном';
    }

}