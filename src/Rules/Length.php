<?php


namespace Rioter\Validation\Rules;


class Length implements Ruleable
{
    protected $length = 0;

    public  function __construct($length)
    {
        $this->length = (int) $length;

    }

    public function validate($fieldName, $val, $validator)
    {
        return strlen($val) === $this->length;
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должен быть ' . $this->length . ' символов в длину';
    }
}