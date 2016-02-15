<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class LengthTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('length', new Rules\Length(3));
    }

    public function provider()
    {
        return array(
            array(array('length' => null), false),
            array(array('length' => ''), false),
            array(array('length' => 1), false),
            array(array('length' => 121), true),
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