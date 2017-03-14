<?php

namespace DataType;

abstract class Data {

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function get()
    {
        return $this->value;
    }

}
