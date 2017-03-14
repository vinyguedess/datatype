<?php

namespace DataType\Tests\Unit\ArrayType;


use DataType\ArrayType\Map;
use DataType\Number\Integer;
use DataType\String\Text;

class MapTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Map
     */
    private $map;

    public function setUp()
    {
        $map = new Map;
        $map->add(new Text('Closeup'));
        $map->add(new Text('Colgate'));
        $map->add(new Text('Oral-B'));
        $map->add(new Text('Sorriso'));

        $this->map = $map;
    }

    public function testSimpleArray()
    {
        $map = $this->map;
        $this->assertInstanceOf(Map::class, $map);

        $this->assertJson($map->toJson());
        $this->assertEquals(new Integer(4), $map->count());
        $this->assertEquals(new Text('Colgate'), $map->get(new Integer(1)));
    }

    public function testRemovingDataFromMapDefinedIndex()
    {
        $map = $this->map;

        $map->remove(new Integer(3));
        $this->assertEquals(new Integer(3), $map->count());
    }

    public function testSetingMapNewValueOnDefinedIndex()
    {
        $map = $this->map;

        $map->set(new Integer(2), new Text('Any Toothpaste'));
        $this->assertEquals(new Text('Any Toothpaste'), $map->get(new Integer(2)));
        $this->assertEquals(new Integer(4), $map->count());
    }

}