<?php

namespace Rioter\Validation\Rules;


use Rioter\Validation\Interfaces\Ruleable;

class Matches implements Ruleable
{

    protected $compare;

    public function __construct($compare)
    {
        $this->compare = $compare;
    }

    public function validate($fieldName, $val, $validator)
    {
        $val2 = $validator->getData($this->compare);
        return $val === $val2;
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должен совпадать с ' . $validator->getAlias($this->compare);
    }

}