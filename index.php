
<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';
ini_set('display_errors', 1);

$_POST = ['id'=>'fg', 'name' => '2005-08-15T15:52:01+00:00', 'surname' => ' Vasya'];


$v = new Validator();
$v

    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id пользователя')
    ->addFunc('surname', 'strtolower')
    ->addFunc('surname', 'trim')
    ->addRule('id', new Rules\IsNumeric())
    ->addRule('id', new Rules\MaxLength(1))
    ->addRule('name', new Rules\Date('W3C'))
    ->addRule('name', new Rules\Email())
    ->addRule('name', new Rules\Length(5))
    ->addRule('name', new Rules\MaxLength(4))
    ->addRule('surname', new Rules\Alpha())

;


 if($v->isValid($_POST)){
     print_r( $v->getData());
 } else {
     var_dump( $v->getErrors());
 }
print_r($v->getData());

foreach($v->getErrors() as $fieldName => $errors) {
    echo "Поле: {$fieldName}: <br>";
    foreach($errors as $key => $error) {
                echo "{$error} <br>";
     }
 }