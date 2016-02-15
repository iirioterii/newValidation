<?php

namespace Rioter\Validation\Rules;

use DateTime;

class Date extends AbstractRule
{
    /**
     * @var null
     */
    public $format = null;

    /**
     * Date constructor.
     * @param null $format
     */
    public function __construct($format = null)
    {
        $this->format = $format;
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $validator
     * @return bool
     */
    public function validate($fieldName, $val, $validator)
    {
        if ($val instanceof DateTime) {
            return true;
        } elseif (!is_string($val)) {
            return false;
        } elseif (is_null($this->format)) {
            return false !== strtotime($val);
        }
        $dateFromFormat = DateTime::createFromFormat($this->format, $val);
        return $dateFromFormat && $val === $dateFromFormat->format($this->format);
    }

}