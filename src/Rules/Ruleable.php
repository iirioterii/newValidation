<?php

namespace Rioter\Validation\Rules;


interface Ruleable
{
    // Должен возвращать true в случае, если валидация пройдена, false в обратном
    public function validate($fieldName, $val, $validator);

    // Долен вовзращать строку
    public function getErrorMessage($fieldName, $val, $validator);
}