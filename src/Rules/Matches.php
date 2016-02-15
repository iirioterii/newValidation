<?php

namespace Rioter\Validation\Rules;


class Matches extends AbstractRule
{

    /**
     * @var
     */
    protected $compare;

    /**
     * Matches constructor.
     * @param $compare
     */
    public function __construct($compare)
    {
        $this->compare = $compare;
        $this->errorMessage = ' must be match ' . $this->compare;
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        $val2 = $validator->getData($this->compare);
        return $val === $val2;
    }

}