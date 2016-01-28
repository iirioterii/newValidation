<?php

namespace Rioter\Validation\Rules;


class Number implements Ruleable
{
    // Метод валидации
    public function validate($fieldName, $val, $validator)
    {
        return is_numeric($val);
    }

    // Вывод ошибки
    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должно быть числом';
    }

}