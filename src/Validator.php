<?php

namespace Rioter\Validation;


class Validator
{

    // Алиасы
    protected $aliases = [];

    // Правила
    protected $rules = [];

    // Данные для валидрования
    protected $data;

    // Для проверяемого поля задаем алиас;
    public function setAlias($fieldName, $alias)
    {
        $this->aliases[$fieldName] = $alias;
        return $this;
    }

    // Получаем алиас по имени поля
    public function getAlias($fieldName)
    {
        return isset($this->aliases[$fieldName]) ? $this->aliases[$fieldName] : $fieldName;
    }

    // Добавить правило для поля
    public function addRule($fieldName, $rule)
    {
        if(!isset($this->rules[$fieldName]))
            $this->rules[$fieldName] = [];
            $this->rules[$fieldName][] = $rule;
            return $this;
    }

    // Получаем правила
    public function getRules()
    {
        return $this->rules;
    }

    // Валидация обьекта
    public function isValid(array $data)
    {
        $this->data = $data;
        $this->errors = $this->exeRules();
        return empty($this->errors);
    }

    // Получить данные
    public function getData($fieldName = null, $default = null)
    {
        if($fieldName === null) return $this->data;
        return array_key_exists($fieldName, $this->data) ? $this->data[$fieldName] : $default;
    }

    // Получить ошибки
    public function getErrors() {
        return $this->errors;
    }

    // Выполнение правил
    public function exeRules()
    {
        if(empty($this->rules)) return [];
        $errors = [];

        foreach($this->rules as $fieldName => $rules) {
            list($result, $error) = $this->exeFieldNameRules($fieldName, $rules);
            if($result === false) $errors[$fieldName] = $error;
        }
        return $errors;
    }

    // Правила для поля
    public function exeFieldNameRules($fieldName, array $rules)
    {
        $val = isset($this->data[$fieldName]) ? $this->data[$fieldName] : 0;

        foreach($rules as $rule) {
            list($result, $error) = $this->exeRule($fieldName, $val, $rule);
            if($result === false) return array(false, $error);
        }
        return [true, null];
    }

    // Выполняем одно правило для поля
    public function exeRule($fieldName, $val, $rule)
    {
        $result = $rule->validate($fieldName, $val, $this);
        if($result) {
            return [true, null];
        } else {
            return array(false, $rule->getErrorMessage($fieldName, $val, $this)
            );
        }
    }

//    public  function __toString()
//    {
//    }
}