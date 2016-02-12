<?php

namespace Rioter\Validation\Rules;


interface RuleInterface
{
    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return mixed
     */
    public function validate($fieldName, $val, $validator);

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return mixed
     */
    public function getErrorMessage($fieldName, $val, $validator);
}