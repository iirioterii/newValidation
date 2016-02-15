<?php

namespace Rioter\Validation\Rules;


class Regexp extends AbstractRule
{
    /**
     * @var
     */
    protected $regex;

    /**
     * Regexp constructor.
     * @param $regex
     */
    public function __construct($regex)
    {
        $this->regex = $regex;
        $this->errorMessage = " must validate against {$this->regex}";
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        return (bool) preg_match($this->regex, $val);
    }

}