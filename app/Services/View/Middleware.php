<?php

namespace app\Services\View;

use engine\Helper\Get\Configs;

class Middleware
{
    /**
     * Middleware handling
     *
     * @return void
     */
    public function boot()
    {

        foreach (Configs::getInstance()->get('arch')['Middleware'] as $middleware) {
            $middleware = new $middleware();
            $middleware->handle();
        }
    }
}