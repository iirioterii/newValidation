<?php

namespace Rioter\Validation\Rules;


interface Ruleable
{
    public function validate($fieldName, $value, $validator);
    public function getErrorMessage($fieldName, $val, $validator);
}