<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class MaxLengthTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('length', new Rules\MaxLength(3));
    }

    public function provider()
    {
        return array(
            array(array('length' => null), true),
            array(array('length' => ''), true),
            array(array('length' => 1), true),
            array(array('length' => 1213), false),
            array(array('length' => 'abc'), true),
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