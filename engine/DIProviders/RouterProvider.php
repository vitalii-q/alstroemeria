<?php

namespace engine\DIProviders;

use engine\DIModules\Router\Router;

class RouterProvider extends ModuleProvider
{
    protected $serviceName = 'router';

    public function init()
    {
        $router = new Router();

        $this->di->set($this->serviceName, $router);
    }
}