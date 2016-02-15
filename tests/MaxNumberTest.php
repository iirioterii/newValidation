<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class MaxNumberTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('num', new Rules\MaxNumber(5));
    }

    public function provider()
    {
        return array(
            array(array('num' => null), false),
            array(array('num' => ''), false),
            array(array('num' => 1), true),
            array(array('num' => 6), false),
            array(array('num' => -3.23), true),
            array(array('num' => -123), true),
            array(array('num' => '6'), false),
        );
    }

    /**
     * @dataProvider provider
     **/
    public function testIsValid($value, $expected) {
        $result = $this->v->isValid($value);
        $this->assertEquals($expected, $result);
    }

}