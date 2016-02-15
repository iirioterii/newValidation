<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class IsFloatTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('float', new Rules\IsFloat());
    }

    public function provider()
    {
        return array(
            array(array('float' => null), false),
            array(array('float' => ''), false),
            array(array('float' => 1), false),
            array(array('float' => 1.34), true),
            array(array('float' => '1.34'), false),
            array(array('float' => true), false),
            array(array('float' => false), false),
            array(array('float' => '1,43fg'), false),
            array(array('float' => '1.!2'), false),
            array(array('float' => 0), false),
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