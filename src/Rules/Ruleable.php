<?php

namespace Rioter\Validation\Rules;


interface Ruleable
{
    public function validate($fieldName, $val, $validator);
    public function getErrorMessage($fieldName, $val, $validator);
}