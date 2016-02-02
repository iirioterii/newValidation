<?php

namespace Rioter\Validation;

class Validator
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $aliases = [];

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $errors = [];


    /**
     * @param $fieldName
     * @param $alias
     * @return $this
     */
    public function setAlias($fieldName, $alias)
    {
        $this->aliases[$fieldName] = $alias;
        return $this;
    }

    /**
     * @param $fieldName
     * @return mixed
     */
    public function getAlias($fieldName)
    {
        return isset($this->aliases[$fieldName]) ? $this->aliases[$fieldName] : $fieldName;
    }

    /**
     * @param $fieldName
     * @param $rule
     * @return $this
     */
    public function addRule($fieldName, $rule)
    {
        if(!isset($this->rules[$fieldName]))
            $this->rules[$fieldName] = [];
            $this->rules[$fieldName][] = $rule;
        return $this;
    }

    /**
     * @return array
     */
    public function getRules()

    {
        return $this->rules;
    }

    /**
     * @param $data
     * @return bool
     */
    public function isValid($data)
    {
        if(is_array($data)) {
            $this->data = $data;
            $this->errors = $this->exeRules();
        }
        return empty($this->errors);


    }

    /**
     * @param null $fieldName
     * @param null $default
     * @return null
     */
    public function getData($fieldName = null, $default = null)
    {
        if($fieldName === null) return $this->data;
        return array_key_exists($fieldName, $this->data) ? $this->data[$fieldName] : $default;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function exeRules()
    {
        if(empty($this->rules)) return [];

        $errors = [];
        foreach($this->rules as $fieldName => $rules) {
            if (!empty($this->exeFieldNameRules($fieldName, $rules))) {
                $errors[$fieldName] = $this->exeFieldNameRules($fieldName, $rules);
            }
        }
        return $errors;
    }

    /**
     * @param $fieldName
     * @param array $rules
     * @return array
     */
    public function exeFieldNameRules($fieldName, array $rules)
    {
        $errors = [];
        $val = isset($this->data[$fieldName]) ? $this->data[$fieldName] : null;

        foreach($rules as $rule) {
            list($result, $error) = $this->exeRule($fieldName, $val, $rule);
            if($result === false){
                $errors[]=$error;
            }

        }
        return $errors;
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $rule
     * @return array
     */
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

}

