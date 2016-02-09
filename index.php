
<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

require_once 'vendor/autoload.php';
ini_set('display_errors', 1);

$_POST = ['id'=>'fg', 'name' => '2005-08-15T15:52:01+00:00', 'surname' => ' Vasya', 'test' => 'kd'];


$v = new Validator();
$v

    ->setAlias('name', 'Username')
    ->addRule('name', new Rules\Date('W3C'))
    ->addRule('name', new Rules\Email())
    ->addRule('name', new Rules\Length(5))
    ->addRule('name', new Rules\MaxLength(4))

    ->setAlias('id', 'Id пользователя')
    ->addRule('id', new Rules\IsNumeric())
    ->addRule('id', new Rules\MaxLength(1))

    ->addFunc('surname', 'strtolower')
    ->addFunc('surname', 'trim')


    ->addRule('test', new Rules\Date('W3C'))

;


 if($v->isValid($_POST)){
     print_r( $v->getData());
 } else {
     var_dump( $v->getErrors());
 }

