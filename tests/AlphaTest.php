<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class AlphaTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('alpha', new Rules\Alpha());
    }


    public function provider()
    {
        return array(
            array(array('alpha' => null), false),
            array(array('alpha' => ''), false),
            array(array('alpha' => 1), false),
            array(array('alpha' => 12345), false),
            array(array('alpha' => '12345'), false),
            array(array('alpha' => 'test213'), false),
            array(array('alpha' => 'te!st213'), false),
            array(array('alpha' => 'alpha'), true),
            array(array('alpha' => 'ALPHA'), true),
            array(array('alpha' => 'Alpha'), true),

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