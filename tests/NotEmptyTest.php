<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class NotEmptyTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('val', new Rules\NotEmpty());
    }


    public function provider()
    {
        return array(
            array(array('val' => null), false),
            array(array('val' => ''), false),
            array(array('val' => 1), true),
            array(array('val' => 'abc'), true),
            array(array('val' => 'abc123'), true),
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