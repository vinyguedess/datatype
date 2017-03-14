<?php

namespace DataType\Tests\Unit\Lambda;


use DataType\Lambda\Lambda;
use DataType\Number\Integer;
use DataType\String\Text;

class LambdaTest extends \PHPUnit_Framework_TestCase
{

    public function testSimpleLambda()
    {
        $simpleLambda = new Lambda(10);

        $simpleLambda = $simpleLambda(function ($number) {
            return $number / 2;
        });

        $this->assertInstanceOf(Lambda::class, $simpleLambda);
        $this->assertEquals(5, $simpleLambda->get());
    }

    public function testChainedLambda()
    {
        $chainedLambda = new Lambda(100);
        $chainedLambda = $chainedLambda(function ($number) {
            return $number / 2;
        })->then(function($number) {
            return $number / 25;
        });

        $this->assertInstanceOf(Lambda::class, $chainedLambda);
        $this->assertEquals(2, $chainedLambda->get());
    }

    public function testLambdaTypeCasting()
    {
        $lambdaTypeCasted = new Lambda(new Integer(2), new Text('type casting a lambda'));
        $lambdaTypeCasted = $lambdaTypeCasted(function(Integer $integer, Text $text) {

            return "{$integer->multiply(5)->get()}x I read \"{$text->get()}\"";
        });

        $this->assertInstanceOf(Lambda::class, $lambdaTypeCasted);
        $this->assertEquals("10x I read \"type casting a lambda\"", $lambdaTypeCasted->get());
    }

}