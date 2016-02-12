<?php

namespace Rioter\Validation\Rules;


class Matches extends AbstractRule
{

    protected $compare;

    public function __construct($compare)
    {
        $this->compare = $compare;
        $this->errorMessage = ' должен совпадать с ' . $this->compare;
    }

    public function validate($fieldName, $val, $validator)
    {
        $val2 = $validator->getData($this->compare);
        return $val === $val2;
    }

}