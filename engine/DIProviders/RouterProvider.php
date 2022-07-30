<?php

namespace engine\DIProviders;

use engine\DIModules\Router\Router;

class RouterProvider extends ModuleProvider
{
    /**
     * @var string
     */
    protected $serviceName = 'router';

    /**
     * Initializing the router module
     *
     * @return mixed|void
     */
    public function init()
    {
        $router = new Router();

        $this->di->set($this->serviceName, $router);
    }
}