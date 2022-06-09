<?php

namespace app\Engine\DIProviders;

use app\Engine\DIModules\Router\Router;

class RouterProvider extends ModuleProvider
{
    protected $serviceName = 'router';

    public function init()
    {
        $router = new Router();

        $this->di->set($this->serviceName, $router);
    }
}