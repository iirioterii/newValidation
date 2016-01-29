<?php

header('Content-Type: text/html; charset=utf-8');


use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';

$_POST = ['id'=>'retr', 'name' => 'Dmitriy', 'surname' => 'Alexxeev', 'gender' => 'male', 'img' => '/file1.php'];
// Не правильно работает, когда после не успешного валидирование,
// валидация проходит успешно выкидывается ошибка, потворяющая предидущую

$v = new Validator();
$v
    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id')
    ->setAlias('surname', 'Surname alias')
    ->setAlias('img', 'Image for profile')
    ->addRule('id', new Rules\Number())
    ->addRule('id', new Rules\Max(5))
    ->addRule('id', new Rules\Length(4))
    ->addRule('id', new Rules\Min(5))
    ->addRule('name', new Rules\Alpha())
    ->addRule('name', new Rules\Max(2))
    ->addRule('name', new Rules\Min(15))
    ->addRule('name', new Rules\Length(6))

;

var_dump($v->isValid($_POST));

if($v->isValid($_POST)) {
    print_r($v->getData());
} else {
    print_r($v->getErrors());
}
