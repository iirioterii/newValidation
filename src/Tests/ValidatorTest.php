<?php
use Rioter\Validation\Validator;
use Rioter\Validation\Rules;

class ValidatorTest extends PHPUnit_Framework_TestCase
{

    private $params;
    private $v;

    public function setup()
    {
        $this->params = array('id' => 12, 'name'=>'Alex', 'login'=>'Alex', 'date' => '2005-08-15T15:52:01+00:00',
            'email' => 'iirioterii@gmail.com','bool'=>true, 'float' => 1.23423, 'negative'=>-1, 'empty' => '');
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

    public function testEmailTrue()
    {
        $this->assertTrue($this->v->addRule('email', new Rules\Email())->isValid($this->params));
    }

    public function testEmailFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\Email())->isValid($this->params));
    }

    public function testisBoolTrue()
    {
        $this->assertTrue($this->v->addRule('bool', new Rules\IsBool())->isValid($this->params));
    }

    public function testisBoolFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\IsBool())->isValid($this->params));
    }

    public function testIsFloatTrue()
    {
        $this->assertTrue($this->v->addRule('float', new Rules\IsFloat())->isValid($this->params));
    }

    public function testIsFloatFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\IsFloat())->isValid($this->params));
    }

    public function testIsIntegerTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\IsInteger())->isValid($this->params));
    }

    public function testIsIntegerFalse()
    {
        $this->assertFalse($this->v->addRule('name', new Rules\IsInteger())->isValid($this->params));
    }

    public function testIsNumericTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\IsNumeric())->isValid($this->params));
    }

    public function testIsNumericFalse()
    {
        $this->assertFalse($this->v->addRule('name', new Rules\IsNumeric())->isValid($this->params));
    }

    public function testLengthTrue()
    {
        $this->assertTrue($this->v->addRule('name', new Rules\Length(4))->isValid($this->params));
    }

    public function testLengthFalse()
    {
        $this->assertFalse($this->v->addRule('name', new Rules\Length(1))->isValid($this->params));
    }

    public function testMatchesTrue()
    {
        $this->assertTrue($this->v->addRule('name', new Rules\Matches('login'))->isValid($this->params));
    }

    public function testMatchesFalse()
    {
        $this->assertFalse($this->v->addRule('name', new Rules\Matches('id'))->isValid($this->params));
    }

    public function testMaxLengthTrue()
    {
        $this->assertTrue($this->v->addRule('name', new Rules\MaxLength(5))->isValid($this->params));
    }

    public function testMaxLengthFalse()
    {
        $this->assertFalse($this->v->addRule('name', new Rules\MaxLength(2))->isValid($this->params));
    }

    public function testMinLengthTrue()
    {
        $this->assertTrue($this->v->addRule('name', new Rules\MinLength(1))->isValid($this->params));
    }

    public function testMinLengthFalse()
    {
        $this->assertFalse($this->v->addRule('name', new Rules\MinLength('5'))->isValid($this->params));
    }

    public function testMaxNumberTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\MaxNumber(50))->isValid($this->params));
    }

    public function testMaxNumberFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\MaxNumber(1))->isValid($this->params));
    }

    public function testMinNumberTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\MinNumber(1))->isValid($this->params));
    }

    public function testMinNumberFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\MinNumber(50))->isValid($this->params));
    }

    public function testNumRangeTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\NumRange(1,20))->isValid($this->params));
    }

    public function testNumRangeFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\NumRange(100,200))->isValid($this->params));
    }

    public function testRegExpTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\Regexp('/[\d]+/'))->isValid($this->params));
    }

    public function testRegExpFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\Regexp('/[^12]/'))->isValid($this->params));
    }

    public function testNegativeTrue()
    {
        $this->assertTrue($this->v->addRule('negative', new Rules\Negative())->isValid($this->params));
    }

    public function testNegativeFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\Negative())->isValid($this->params));
    }

    public function testPositiveTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\Positive())->isValid($this->params));
    }

    public function testPositiveFalse()
    {
        $this->assertFalse($this->v->addRule('negative', new Rules\Positive())->isValid($this->params));
    }

    public function testNotEmptyTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\NotEmpty())->isValid($this->params));
    }

    public function testNotEmptyFalse()
    {
        $this->assertFalse($this->v->addRule('empty', new Rules\NotEmpty())->isValid($this->params));
    }

    public function testNotEqualTrue()
    {
        $this->assertTrue($this->v->addRule('id', new Rules\NotEqual('some string'))->isValid($this->params));
    }

    public function testNotEqualFalse()
    {
        $this->assertFalse($this->v->addRule('id', new Rules\NotEqual(12))->isValid($this->params));
    }



}