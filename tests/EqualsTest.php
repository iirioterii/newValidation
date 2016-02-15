<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class EqualsTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('val', new Rules\Equals('test'));
    }

    public function provider()
    {
        return array(
            array(array('val' => null), false),
            array(array('val' => ''), false),
            array(array('val' => 'test'), true),
            array(array('val' => 'TEST'), false),
            array(array('val' => 'test '), false),
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