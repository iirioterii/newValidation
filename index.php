<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';

$_REQUEST = ['id'=>'12312', 'name' => '23'];

$v = new Validator();
$v
    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id')
    ->addRule('id', new Rules\Number())
    ->addRule('id', new Rules\Min(5))
    ->addRule('id', new Rules\Length(11))

;

var_dump($v->isValid($_REQUEST));
print_r($v->getErrors());



