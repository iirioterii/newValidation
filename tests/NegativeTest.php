<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class NegativeTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('neg', new Rules\Negative());
    }


    public function provider()
    {
        return array(
            array(array('neg' => null), false),
            array(array('neg' => ''), false),
            array(array('neg' => 1), false),
            array(array('neg' => 12345), false),
            array(array('neg' => '12345'), false),
            array(array('neg' => 'test123'), false),
            array(array('neg' => '123test'), false),
            array(array('neg' => 'te!st213'), false),
            array(array('neg' => '-12345'), true),
            array(array('neg' => -213), true),
            array(array('neg' => 'te!st213'), false),

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