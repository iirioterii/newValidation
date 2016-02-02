<?php

namespace Rioter\Validation\Interfaces;


interface Ruleable
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