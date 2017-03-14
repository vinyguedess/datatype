<?php

namespace DataType\String;


use DataType\Data;
use DataType\Number\Number;

class Text extends Data
{

    public function replace($replace, $by)
    {
        if ($replace instanceof Text)
            $replace = $replace->get();

        if ($by instanceof Text)
            $by = $by->get();

        return new Text(str_replace($replace, $by, $this->get()));
    }

    public function substring($from, $to = null)
    {
        if ($from instanceof Number)
            $from = $from->get();

        if (!is_null($to)) {
            if ($to instanceof Number)
                $to = $to->get();
        }

        if (!is_null($to))
            return new Text(substr($this->get(), $from, $to));

        return new Text(substr($this->get(), $from));
    }

}
