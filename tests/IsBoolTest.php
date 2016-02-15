<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class IsBoolTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('bool', new Rules\IsBool());
    }


    public function provider()
    {
        return array(
            array(array('bool' => null), false),
            array(array('bool' => ''), false),
            array(array('bool' => 1), false),
            array(array('bool' => true), true),
            array(array('bool' => 'true'), false),
            array(array('bool' => false), true),
            array(array('bool' => 'false'), false),
            array(array('bool' => 'te!st213'), false),
            array(array('bool' => '-12345'), false),
            array(array('bool' => 0), false),
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