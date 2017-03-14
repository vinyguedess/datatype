<?php

namespace DataType\Lambda;


class Lambda
{

    protected $params;
    protected $lastResponse;

    public function __construct()
    {
        $this->params = func_get_args();
    }

    public function __invoke($callback)
    {
        $this->lastResponse = call_user_func_array($callback, $this->params);

        return $this;
    }

    public function then($callback)
    {
        $this->lastResponse = call_user_func($callback, $this->lastResponse);

        return $this;
    }

    public function get()
    {
        return $this->lastResponse;
    }

}
