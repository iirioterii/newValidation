<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class PositiveTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('pos', new Rules\Positive());
    }


    public function provider()
    {
        return array(
            array(array('pos' => null), false),
            array(array('pos' => ''), false),
            array(array('pos' => 1), true),
            array(array('pos' => 12345), true),
            array(array('pos' => '12345'), true),
            array(array('pos' => 'test123'), false),
            array(array('pos' => '123test'), true),
            array(array('pos' => 'te!st213'), false),
            array(array('pos' => '-12345'), false),
            array(array('pos' => -213), false),
            array(array('pos' => 'te!st213'), false),

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