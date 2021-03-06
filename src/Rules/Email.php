<?php

namespace Rioter\Validation\Rules;

use Egulias\EmailValidator\EmailValidator;

class Email extends AbstractRule
{
    protected $emailValidator;

    /**
     * @return EmailValidator
     */
    public function getEguliasEmailValidator()
    {
        if (!$this->emailValidator instanceof EmailValidator
            && class_exists('Egulias\EmailValidator\EmailValidator')) {
            $this->emailValidator = new EmailValidator();
        }
        return $this->emailValidator;
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        $emailValidator = $this->getEguliasEmailValidator();

        if (null !== $emailValidator) {
            return $emailValidator->isValid($val) && filter_var($val, FILTER_VALIDATE_EMAIL);
        }
        return is_string($val) && filter_var($val, FILTER_VALIDATE_EMAIL);
    }

}