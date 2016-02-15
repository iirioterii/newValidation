<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class NumRangeTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('num', new Rules\NumRange(2,10));
    }


    public function provider()
    {
        return array(
            array(array('num' => null), false),
            array(array('num' => ''), false),
            array(array('num' => 2), true),
            array(array('num' => 5), true),
            array(array('num' => 10), true),
            array(array('num' => -5), false),
            array(array('num' => 100), false),
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