<?php

namespace Rioter\Validation\Rules;


abstract class AbstractRule implements RuleInterface
{

    public $errorMessage = ' не валидно';

    abstract public function validate($fieldName, $val, $validator);

    final public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' = ' . $val . ',' . $this->errorMessage;
    }


}