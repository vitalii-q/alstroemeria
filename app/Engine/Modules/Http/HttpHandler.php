<?php

namespace app\Engine\Modules\Http;

class HttpHandler
{
    protected $di;

    protected $class;

    protected $function;

    protected $parameters;

    public function __construct($di, $class, $function, $parameters)
    {
        $this->di         = $di;
        $this->class      = $class;
        $this->function   = $function;
        $this->parameters = $parameters;
    }

    public function handle($method)
    {
        switch ($method) {
            case 'GET': call_user_func_array([new $this->class($this->di), $this->function], $this->parameters); // вызываем указанную функцию класса
            break;
            case 'POST': call_user_func_array([new $this->class($this->di), $this->function], [Request::request()]);
        }
    }
}