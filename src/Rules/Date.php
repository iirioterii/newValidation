<?php

namespace Rioter\Validation\Rules;

use Rioter\Validation\Interfaces\Ruleable;
use DateTime;

class Date implements Ruleable
{

    public $format = null;

    public function __construct($format = null)
    {
        $this->format = $format;
    }

    public function validate($fieldName, $val, $validator)
    {
        if ($val instanceof DateTime) {
            return true;
        } elseif (!is_string($val)) {
            return false;
        } elseif (is_null($this->format)) {
            return false !== strtotime($val);
        }
        $exceptionalFormats = [
            'c' => 'Y-m-d\TH:i:sP',
            'r' => 'D, d M Y H:i:s O',
        ];
        if (in_array($this->format, array_keys($exceptionalFormats))) {
            $this->format = $exceptionalFormats[ $this->format ];
        }
        $dateFromFormat = DateTime::createFromFormat($this->format, $val);
        return $dateFromFormat
        && $val === $dateFromFormat->format($this->format);
    }

    public function getErrorMessage($fieldName, $val, $validator)
    {
        return $validator->getAlias($fieldName) . ' неверный формат даты';
    }

}