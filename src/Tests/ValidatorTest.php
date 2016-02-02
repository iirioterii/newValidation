<?php
use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

class ValidatorTest extends PHPUnit_Framework_TestCase
{

    private $params;
    private $v;

    public function setup()
    {
        $this->params = array('id'=>'12', 'name'=>'Alex', 'date' => '2005-08-15T15:52:01+00:00');
        $this->v = new Validator();
        var_dump($this->v);
    }

    public function testAlphaTrue()
    {
        $this->assertTrue($this->v->addRule('name', new Rules\Alpha())->isValid($this->params));
    }

    public function testAlphaFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\Alpha())->isValid($this->params));
    }

    public function testDateTrue()
    {
        $this->assertTrue($this->v->addRule('date', new Rules\Date())->isValid($this->params));
    }

    public function testDateFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\Date())->isValid($this->params));
    }

}