<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';

$_REQUEST = ['id'=>'1', 'name' => '23'];

$v = new Validator();
$v
    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id')
    //->addRule('name', new Rules\Number())
    ->addRule('name', new Rules\Min(5))

;

var_dump($v->isValid($_REQUEST));
print_r($v->getErrors());



