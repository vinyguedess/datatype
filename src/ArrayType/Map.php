<?php

namespace DataType\ArrayType;


use DataType\Number\Integer;
use DataType\Number\Number;

class Map
{

    protected $value = [];

    public function __toString()
    {
        return $this->toJson();
    }

    public function add($element)
    {
        $this->value[] = $element;
    }

    public function set($index, $element)
    {
        if ($index instanceof Number)
            $index = $index->get();

        $this->value[$index] = $element;
    }

    public function get($index)
    {
        if ($index instanceof Number)
            $index = $index->get();

        return $this->value[$index];
    }

    public function remove($index)
    {
        if ($index instanceof Number)
            $index = $index->get();

        unset($this->value[$index]);
    }

    public function count()
    {
        return new Integer(count($this->value));
    }

    public function all()
    {
        return $this->value;
    }

    public function toJson()
    {
        return json_encode($this->value);
    }

}
