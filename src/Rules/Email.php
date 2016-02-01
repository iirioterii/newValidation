<?php

namespace Rioter\Validation\Rules;

use Rioter\Validation\Interfaces\Ruleable;
use Egulias\EmailValidator\EmailValidator;

class Email implements Ruleable
{

    public function __construct(EmailValidator $emailValidator=null)
    {
        $this->emailValidator = $emailValidator;
    }

    public function getEmailValidator()
    {
        if (!$this->emailValidator instanceof EmailValidator
            && class_exists('Egulias\EmailValidator\EmailValidator')) {
            $this->emailValidator = new EmailValidator();
        }
        return $this->emailValidator;
    }

    public function validate($fieldName, $val, $validator)
    {

        $emailValidator = $this->getEmailValidator();
        if (null !== $emailValidator) {
            return $emailValidator->isValid($val);
        }
        return is_string($val);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' введен неправильно';
    }
}