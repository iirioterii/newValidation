<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class IsNumericTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('num', new Rules\IsNumeric());
    }


    public function provider()
    {
        return array(
            array(array('num' => null), false),
            array(array('num' => ''), false),
            array(array('num' => 1), true),
            array(array('num' => 12345), true),
            array(array('num' => '12345'), true),
            array(array('num' => 'test213'), false),
            array(array('num' => 'te!st213'), false),

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