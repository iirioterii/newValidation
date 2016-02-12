
<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';
ini_set('display_errors', 1);

$_POST = ['id'=>'fg', 'name' => '12', 'surname' => ' Vasya', 'test' => 'kd'];


$v = new Validator();
$v
    ->setAlias('name', 'Username')
    ->addRule('name', new Rules\Length(5))
    ->addRule('name', new Rules\MaxLength(4))
    ->addRule('name', new Rules\Alpha())

    ->setAlias('id', 'Id пользователя')
    ->addRule('id', new Rules\IsNumeric())

    ->addFunc('surname', 'strtolower')
    ->addFunc('surname', 'trim')

    ->addRule('test', new Rules\IsNumeric())
;


 if($v->isValid($_POST)){
     print_r( $v->getData());
 } else {
     var_dump( $v->getErrors());
 }

