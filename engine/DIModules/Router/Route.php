<?php

namespace engine\DIModules\Router;

class Route
{
    private $controller;

    private $method;

    private $parameters;

    public function __construct($route, $parameters = [])
    {
        $this->controller = $route['controller'];
        $this->method = $route['method'];
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array|mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}