<?php

namespace DataType\Tests\Unit\Number;


use DataType\Number\Integer;
use DataType\Number\Double;
use DataType\Number\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{

    public function testAddingNumbers()
    {
        $integer = new Integer(rand(0, 100));
        $double = new Double(rand(0, 10) / 9);

        $addedResult = $integer->add($double);
        $this->assertInstanceOf(Number::class, $addedResult);
        $this->assertEquals($integer->get() + $double->get(), $addedResult->get());
    }

    public function testSubtractNumbers()
    {
        $integer = new Integer(rand(20, 100));
        $double = new Double(rand(0, 10) / 9);
        $this->assertGreaterThan($double->get(), $integer->get());

        $subtractedResult = $integer->subtract($double);
        $this->assertInstanceOf(Number::class, $subtractedResult);
        $this->assertEquals($integer->get() - $double->get(), $subtractedResult->get());
    }

    public function testMultiplyNumbers()
    {
        $integer = new Integer(10);

        $multipliedResult = $integer->multiply(new Double(2.5))
            ->multiply(new Integer(2))
            ->multiply($integer);

        $this->assertInstanceOf(Number::class, $multipliedResult);
        $this->assertEquals($integer->get() * 2.5 * 2 * $integer->get(), $multipliedResult->get());
    }

    public function testDivideNumbers()
    {
        $integer = new Integer(100);

        $dividedResult = $integer->divide(2)
            ->divide(2)
            ->divide(2);
        $this->assertInstanceOf(Number::class, $dividedResult);
        $this->assertEquals($integer->get() / 2 / 2 / 2, $dividedResult->get());
    }

    public function testChainedMathOperations()
    {
        $integer = new Integer(100);

        $chainedMathOperations = $integer->add(new Integer(100))
            ->divide(new Integer(100))
            ->multiply(new Integer(10))
            ->subtract(new Integer(10));

        $this->assertInstanceOf(Number::class, $chainedMathOperations);
        $this->assertEquals((($integer->get() + 100) / 100 * 10) - 10, $chainedMathOperations->get());
    }

}