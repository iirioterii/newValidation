<?php

namespace Rioter\Validation\Tests;


use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class DateTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('date', new Rules\Date(DATE_RSS));
    }


    public function provider()
    {
        return array(
            array(array('date' => null), false),
            array(array('date' => ''), false),
            array(array('date' => 'Mon, 15 Aug 2005 15:52:01 +0000'), true),
            array(array('date' => '1954-05-03'), false),
            array(array('date' => '2015'), false),
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