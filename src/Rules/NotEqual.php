<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class NotEqual implements Ruleable
{

    protected $equalValue;

    public  function __construct($equalValue)
    {
        $this->equalValue = $equalValue;

    }

    public function validate($fieldName, $val, $validator)
    {
        return ($val !== $this->equalValue);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . " не должно быть равно {$this->equalValue}";
    }

}