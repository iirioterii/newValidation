<?php

namespace Rioter\Validation\Rules;


class Equals extends AbstractRule
{

    /**
     * @var
     */
    protected $equalValue;

    /**
     * NotEqual constructor.
     * @param $equalValue
     */
    public  function __construct($equalValue)
    {
        $this->equalValue = $equalValue;
        $this->errorMessage = " must be  equal {$this->equalValue}";

    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return ($val == $this->equalValue);
    }

}