<?php

namespace Rioter\Validation;


use ReflectionClass;

class Validator
{

    protected static $instance;


    public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }

    public static function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

}