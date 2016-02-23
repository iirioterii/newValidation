<?php

namespace Rioter\Validation\Tests;


use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('email', new Rules\Email());
    }


    public function provider()
    {
        return array(
            array(array('email' => null), false),
            array(array('email' => ''), false),
            array(array('email' => 'iirioterii'), false),
            array(array('email' => 'iirioterii.com'), false),
            array(array('email' => 'www.iirioterii.com'), false),
            array(array('email' => 'iirioterii@gmail.com'), true),
            array(array('email' => 'com@com'), false),
            array(array('email' => 'iirioterii@test.co.uk'), true),
            array(array('email' => 'iirioterii.iirioterii@test.com'), true),
            array(array('email' => 'iirioterii+iirioterii@test.com'), true),
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