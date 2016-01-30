<?php

namespace Rioter\Validation\Rules;


class Alpha implements Ruleable
{
    // Возвращаем true если валидация прошла
    public function validate($fieldName, $val, $validator)
    {
        return ctype_alpha($val);
    }

    // Возвращаем строку ошибки
    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' должно быть с заглвной буквы';
    }
}