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
    //        var_dump($this);
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
        // var_dump($this->errors);
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
        // Если в массиве с правилами пусто, возвращаем пустой массив
        if(empty($this->rules)) return [];
        $errors = [];
        //var_dump($this->rules);
        // Если правила есть, перебераем массив в цикле
        foreach($this->rules as $fieldName => $rules) {
//            var_dump($rules);
            list($result, $error) = $this->exeFieldNameRules($fieldName, $rules);
//            echo '$result = ';
//            var_dump($result);
//            echo '$error = ';
//            var_dump($error);
            if($result === false) $errors[$fieldName] = $error;
//            var_dump($errors);
        }
        return $errors;
    }

    // Правила для поля
    public function exeFieldNameRules($fieldName, array $rules)
    {
//        var_dump($rules);
        $val = isset($this->data[$fieldName]) ? $this->data[$fieldName] : null;
//        var_dump($val);
        foreach($rules as $rule) {
           // var_dump($rule);
            $err[] = $this->exeRule($fieldName, $val, $rule);
            var_dump($err);
            //$allErrors[] = $error;

            // вот тут ВСЕ ошибки нужно закидывать в массив
            // менять это условие, т к когда хотябы одна ошибка появляется, за ней выводятся такие же ошибки

            //if($result === false) $err=array(false, $error);
           // var_dump($err);
            //$errors[] = $this->exeRule($fieldName, $val, $rule);
            //var_dump($allErrors);
            //var_dump($errors);
        }
        return [true, null];
    }

    // Выполняем одно правило для поля
    public function exeRule($fieldName, $val, $rule)
    {
        //var_dump($fieldName);
        //var_dump($val);
        $result = $rule->validate($fieldName, $val, $this);
       // var_dump($result);
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