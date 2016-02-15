<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class IsIntegerTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('integer', new Rules\IsInteger());
    }

    public function provider()
    {
        return array(
            array(array('integer' => null), false),
            array(array('integer' => ''), false),
            array(array('integer' => 1), true),
            array(array('integer' => 1.34), false),
            array(array('integer' => 012345), true),
            array(array('integer' => true), false),
            array(array('integer' => false), false),
            array(array('integer' => '1,43fg'), false),
            array(array('integer' => '1.!2'), false),
            array(array('integer' => 0), true),
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