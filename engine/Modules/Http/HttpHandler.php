<?php

namespace engine\Modules\Http;

class HttpHandler
{
    /**
     * @var
     */
    protected $di;

    /**
     * @var
     */
    protected $class;

    /**
     * @var
     */
    protected $function;

    /**
     * @var
     */
    protected $parameters;

    /**
     * Saving DI modules and route parameters to the self class
     *
     * @param $di
     * @param $class
     * @param $function
     * @param $parameters
     */
    public function __construct($di, $class, $function, $parameters)
    {
        $this->di         = $di;
        $this->class      = $class;
        $this->function   = $function;
        $this->parameters = $parameters;
    }

    /**
     * Handling http requests
     *
     * @param $method
     * @return void
     */
    public function handle($method)
    {
        switch ($method) {
            case 'GET': call_user_func_array([new $this->class($this->di), $this->function], $this->parameters); // вызываем указанную функцию класса
            break;
            case 'POST': call_user_func_array([new $this->class($this->di), $this->function], [Request::request()]);
        }
    }
}