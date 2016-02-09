ITCourses framework validation component README
==

**ITCourses framework validation component**


## Installation

Package is available on [Packagist](http://packagist.org/packages/rioter/validation),
you can install it using [Composer](http://getcomposer.org).

```shell
composer require rioter/validation
```

[PHP](https://php.net) 5.5+ 


## Basic Usage

Use namespaces

```php
use Rioter\Validation\Validator;
use Rioter\Validation\Rules;
```

Create object of Validator class

```php

$v = new Validator();
```

For example you have $_POST data
```php
$_POST = ['id'=>'12', 'name' => ' Alexandr'];
```

Add aliases

```php
$v
    ->setAlias('name', 'Username')
    ->setAlias('id', 'Id пользователя')
;
```

Php standart functions

```php
$v
    ->addFunc('name', 'trim')
;
```

Add rules

```php
$v
    ->addRule('id', new Rules\IsNumeric())
    ->addRule('id', new Rules\IsBool())
    ->addRule('name', new Rules\MaxLength(4))
;
```

isValid return true if validation is passed
and return false if validation is not passed
```php
$v->isValid($_POST);
```
You can get array of errors
```php
$v->getErrors();
```

Output:
```no-highlight
Array
(
  [id] => 
    Array
    (
      [0] => 'Id пользователя должно быть булевым значением'
    ) 
  [name] => 
    Array
    (
      [0] => 'Username должен быть не более 4 символов'
    )
)
```

## Rules
* **NotEmpty** 
* **Date** 
* **Email**
* **IsBool** 
* **IsFloat** 
* **IsInteger** 
* **IsNumeric** 
* **MinLength** 
* **MaxLength** 
* **Length** 
* **MinNumber** 
* **MaxNumber** 
* **NumRange** 
* **Positive**
* **Negative** 
* **NotEmpty** 
* **NotEqual**
* **Matches** 
* **Regexp** 




