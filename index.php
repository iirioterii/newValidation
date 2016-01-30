<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';

$_REQUEST = ['id'=>'213', 'name' => '333'];

$v = new Validator();
$v
    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id')
    ->addRule('id', new Rules\Number())
    ->addRule('id', new Rules\Min(5))
    ->addRule('id', new Rules\Max(5))
    ->addRule('id', new Rules\Length(2))
    ->addRule('name', new Rules\Min(2))
    ->addRule('name', new Rules\Max(2))
;

$v->isValid($_REQUEST);
print_r($v->getErrors());
print_r($v->getData());
