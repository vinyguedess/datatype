<?php

namespace DataType\Number;


use DataType\Data;

abstract class Number extends Data {

    public function __toString()
    {
        return (string) $this->get();
    }

    public function add($number)
    {
        if ($number instanceof Number)
            $number = $number->get();

        $result = $this->get() + $number;

        return $this->treatResponse($result);
    }

    public function subtract($number)
    {
        if ($number instanceof Number)
            $number = $number->get();

        $result = $this->get() - $number;

        return $this->treatResponse($result);
    }

    public function multiply($number)
    {
        if ($number instanceof Number)
            $number = $number->get();

        $result = $this->get() * $number;

        return $this->treatResponse($result);
    }

    public function divide($number)
    {
        if ($number instanceof Number)
            $number = $number->get();

        $result = $this->get() / $number;

        return $this->treatResponse($result);
    }

    public function potentiation($number)
    {
        if ($number instanceof Number)
            $number = $number->get();

        $result = $this->get();
        for ($i = 1; $i < $number; $i++)
            $result *= $this->get();

        return $this->treatResponse($result);
    }

    protected function treatResponse($response)
    {
        if (is_float($response) || is_double($response))
            return new Double($response);

        return new Integer($response);
    }

}
