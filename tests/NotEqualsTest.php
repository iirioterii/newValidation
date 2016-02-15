<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class NotEqualsTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('val', new Rules\NotEquals('test'));
    }


    public function provider()
    {
        return array(
            array(array('val' => null), true),
            array(array('val' => ''), true),
            array(array('val' => 'test'), false),
            array(array('val' => 'TEST'), true),
            array(array('val' => 'test '), true),
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