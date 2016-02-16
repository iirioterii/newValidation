<?php

namespace Rioter\Validation\Tests;

use Rioter\Validation\Validator;

class FuncTest extends \PHPUnit_Framework_TestCase
{
    protected $v;

    public function setUp() {
        $this->v = new Validator();
        $this->v->addFunc('html', 'htmlspecialchars');
        $this->v->isValid(array('html' => "<a href='test'>Test</a>"));
    }

    public function testFilteringData() {
        $result = $this->v->getData();
        $this->assertEquals('&lt;a href=\'test\'&gt;Test&lt;/a&gt;', $result['html']);
    }
}