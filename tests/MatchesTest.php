<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Rules;
use Rioter\Validation\Validator;

class MatchesTest extends \PHPUnit_Framework_TestCase
{

    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addRule('val2', new Rules\Matches('val'));
    }

    public function provider()
    {
        return array(
            array(array('val2' => null), true),
            array(array('val2' => ''), false),
            array(array('val2' => 1, 'val' => 1), true),
            array(array('val2' => 121, 'val' => 1), false),
            array(array('val2' => 'abc', 'val' => 'abc'), true),
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