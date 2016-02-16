<?php

namespace Rioter\Validation;


use SebastianBergmann\GlobalState\RuntimeException;

class Validator
{

    /**
     * Data from form
     *
     * @var array
     */
    protected $data = [];

    /**
     * Aliases of data`s keys
     *
     * @var array
     */
    protected $aliases = [];

    /**
     * Rules
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Errors
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Functions for filtering
     *
     * @var array
     */
    protected $functions = [];


    /**
     * Set alias of data`s key
     *
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
     * Get alias, if alias is not isset, use fieldname as alias
     *
     * @param $fieldName
     * @return mixed
     */
    public function getAlias($fieldName)
    {
        return isset($this->aliases[$fieldName]) ? $this->aliases[$fieldName] : $fieldName;
    }

    /**
     * Add functions for filtering
     *
     * @param $fieldName
     * @param $function
     * @return $this
     */
    public function addFunc($fieldName, $function) {
        if (!is_callable($function)) {
            throw new \Exception('Function is not callable');
        };

        if(!isset($this->functions[$fieldName])) $this->functions[$fieldName] = [];
        $this->functions[$fieldName][] = $function;
        return $this;
    }

    /**
     *
     * Add rule for fieldName
     *
     * @param $fieldName
     * @param $rule
     * @return $this
     */
    public function addRule($fieldName, $rule)
    {
        if (!$rule instanceof Rules\AbstractRule) {
            throw new \Exception('Check rule instance');
        }

        if (!isset($this->rules[$fieldName]))
           $this->rules[$fieldName] = [];
            $this->rules[$fieldName][] = $rule;
        return $this;
    }

    /**
     * Get all rules
     *
     * @return array
     */
    public function getRules()

    {
        return $this->rules;
    }

    /**
     * Check data for validity
     *
     * @param $data
     * @return bool
     */
    public function isValid(array $data)
    {

        $this->data = $this->applyFunctions($data);
        $this->errors = $this->exeRules();
        return empty($this->errors);

    }

    /**
     * Apply all functions for filtering
     *
     * @param array $data
     * @return array
     */
    private function applyFunctions(array $data) {
        if (empty($this->functions)) return $data;
        foreach ($this->functions as $fieldName => $functions) {
            if(!isset($data[$fieldName])) continue;
            $value = $data[$fieldName];
            foreach ($functions as $function) {
                $value = call_user_func($function, $value);
            }
            $data[$fieldName] = $value;
        }
        return $data;
    }

    /**
     * Get all data
     *
     * @param null $fieldName
     * @param null $default
     * @return null
     */
    public function getData($fieldName = null, $default = null)
    {
        if ($fieldName === null) return $this->data;
        return array_key_exists($fieldName, $this->data) ? $this->data[$fieldName] : $default;
    }

    /**
     * Get all errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Get pretty view of errors
     */
    public function getErrorsList()
    {
        echo '<ul>';
        foreach ($this->errors as $fieldName => $errorsArray) {
            foreach($errorsArray as $error){
                echo '<li>' . $error  . ';</li>';
            }
        }
        echo '</ul>';
    }

    /**
     * Execute rules
     *
     * @return array
     */
    private function exeRules()
    {
        if(empty($this->rules)) return [];

        $errors = [];
        foreach ($this->rules as $fieldName => $rules) {
            if (!empty($this->exeFieldNameRules($fieldName, $rules))) {
                $errors[$fieldName] = $this->exeFieldNameRules($fieldName, $rules);
            }
        }
        return $errors;
    }

    /**
     * Execute rules for a given fieldName
     *
     * @param $fieldName
     * @param array $rules
     * @return array
     */
    private function exeFieldNameRules($fieldName, array $rules)
    {
        $errors = [];
        $val = $this->data[$fieldName];

        foreach ($rules as $rule) {
            list($result, $error) = $this->exeRule($fieldName, $val, $rule);
            if ($result === false){
                $errors[]=$error;
            }
        }
        return $errors;
    }

    /**
     * Execute a single rule against fieldName
     *
     * @param $fieldName
     * @param $val
     * @param $rule
     * @return array
     */
    private function exeRule($fieldName, $val, $rule)
    {
        $result = $rule->validate($fieldName, $val, $this);
        if ($result) {
            return [true, null];
        } else {
            return array(false, $rule->getErrorMessage($fieldName, $val, $this)
            );
        }
    }

}

