
<?php

use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('html_errors',true);
ini_set('error_reporting',E_ALL ^ E_NOTICE);

require_once '../vendor/autoload.php';

$_POST = ['id'=>1, 'name' => '12', 'surname' => ' Vasya',
    'test' => 'kd', 'email' => 'iirioterii@gmail.com', 'date' => '1958'];
$arr =array();

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

    ->setAlias('date', 'Date')

    ->addRule('test', new Rules\IsNumeric())
    ->addRule('email', new Rules\Email())
    ->addRule('date', new Rules\Date('Y'))
;

 if($v->isValid($_POST)){
     print_r( $v->getData());
 } else {
     $v->getErrorsList();
 }

