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
            'ATOM' => 'Y-m-d\TH:i:sP',
            'RSS' => 'D, d M Y H:i:s O',
            'W3C' => 'Y-m-d\TH:i:sP',
            'ISO8601' => 'Y-m-d\TH:i:sO',
            'RFC822' => 'D, d M y H:i:s O',
            'RFC850' => 'l, d-M-y H:i:s T',
            'RFC1036' => 'D, d M y H:i:s O',
            'RFC1123' => 'D, d M Y H:i:s O',
            'RFC2822' => 'D, d M Y H:i:s O',
            'RFC3339' => 'Y-m-d\TH:i:sP',

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
