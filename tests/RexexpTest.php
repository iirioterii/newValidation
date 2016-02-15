<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class RegexpTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('regexp', new Rules\Regexp('/[a-z]+/'));
    }


    public function provider()
    {
        return array(
            array(array('regexp' => null), false),
            array(array('regexp' => ''), false),
            array(array('regexp' => 'abc'), true),
            array(array('regexp' => 12345), false),
            array(array('regexp' => 'ABC'), false),
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