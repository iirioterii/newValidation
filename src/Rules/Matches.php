<?php

namespace Rioter\Validation\Rules;

use Rioter\Validation\Interfaces\Ruleable;

class Matches implements Ruleable
{

    protected $compare_against;

    public function __construct($compare_against)
    {
        $this->compare_against = $compare_against;
    }

    public function validate($field, $val, $validator)
    {
        $val2 = $validator->getData($this->compare_against);
        return $val === $val2;
    }

    public function getErrorMessage($field, $val, $validator)
    {
        return $validator->getAlias($field) . ' должен совпадать с ' . $validator->getAlias($this->compare_against);
    }

}