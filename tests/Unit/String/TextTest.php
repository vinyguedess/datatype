<?php

namespace DataType\Tests\Unit\String;


use DataType\Number\Integer;
use DataType\String\Text;

class TextTest extends \PHPUnit_Framework_TestCase
{

    public function testTextReplace()
    {
        $string = new Text("This is a testing string");
        $this->assertInstanceOf(Text::class, $string);

        $replacedString = $string->replace("string", "text");
        $this->assertInstanceOf(Text::class, $replacedString);
        $this->assertEquals("This is a testing text", $replacedString->get());

        $replacedString = $string->replace(new Text("a testing"), new Text("an example"));
        $this->assertInstanceOf(Text::class, $replacedString);
        $this->assertEquals("This is an example string", $replacedString->get());

        $chainedReplace = $string->replace('a testing', 'an example')
            ->replace(new Text('string'), 'text');
        $this->assertInstanceOf(Text::class, $chainedReplace);
        $this->assertEquals("This is an example text", $chainedReplace->get());
    }

    public function testTextSubstring()
    {
        $string = new Text("This is a testing string");

        $substringedString = $string->substring(0, 4);
        $this->assertInstanceOf(Text::class, $substringedString);
        $this->assertEquals("This", $substringedString->get());

        $substringedString = $string->substring(new Integer(-6));
        $this->assertInstanceOf(Text::class, $substringedString);
        $this->assertEquals("string", $substringedString->get());

        $chainedSubstring = $string->substring(new Integer(10))
            ->substring(0, -7);
        $this->assertInstanceOf(Text::class, $chainedSubstring);
        $this->assertEquals("testing", $chainedSubstring->get());
    }

    public function testMixedStringFunctions()
    {
        $string = new Text("I think it can be very helpful");
        $mixedString = $string->replace('can', new Text('may'))
            ->substring(11, new Integer(3));
        $this->assertInstanceOf(Text::class, $mixedString);
        $this->assertEquals(new Text('may'), $mixedString);
        $this->assertEquals((new Text('may'))->get(), $mixedString->get());
    }

}