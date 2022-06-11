<?php

namespace engine\DIModules\Router;

class Route
{
    /**
     * @var mixed
     */
    private $controller;

    /**
     * @var mixed
     */
    private $method;

    /**
     * @var array|mixed
     */
    private $parameters;

    /**
     * Adding route parameters
     *
     * @param $route
     * @param $parameters
     */
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