<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';

$_POST = ['id'=>'213', 'name' => 'Sfdfg@mail.ru', 'surname' => '3'];
$string = 'Это строка которую нужно обрабоать';

$v = new Validator();
$v
    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id пользователя')
    ->addRule('name', new Rules\Date())
    ->addRule('name', new Rules\Email())
    ->addRule('surname', new Rules\Alpha())

;

$v->isValid($_POST);
echo '<pre>';
print_r($v->getErrors());
print_r($v->getData());


foreach($v->getErrors() as $fieldName => $errors) {
    echo "Поле: {$fieldName}: <br>";
    foreach($errors as $key => $error) {
        echo "{$error} <br>";
    }
}
