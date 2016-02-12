<?php

namespace Rioter\Validation\Rules;


class NotEqual extends AbstractRule
{

    protected $equalValue;

    public  function __construct($equalValue)
    {
        $this->equalValue = $equalValue;
        $this->errorMessage = " не должно быть равно {$this->equalValue}";

    }

    public function validate($fieldName, $val, $validator)
    {
        return ($val !== $this->equalValue);
    }

}