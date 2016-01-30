<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';

$_REQUEST = ['id'=>'213', 'name' => 'Алексей', 'surname' => '333'];

$v = new Validator();
$v
    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id пользователя')
    ->addRule('id', new Rules\Number())
    ->addRule('name', new Rules\Alpha())
    ->addRule('name', new Rules\Min(2))
    ->addRule('name', new Rules\Max(20))
    ->addRule('surname', new Rules\Alpha())
    ->addRule('surname', new Rules\Min(2))
    ->addRule('surname', new Rules\Max(20))
;

$v->isValid($_REQUEST);
echo '<pre>';
print_r($v->getErrors());
print_r($v->getData());
