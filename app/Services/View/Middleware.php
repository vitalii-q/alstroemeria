<?php

namespace app\Services\View;

use engine\Helper\Get\Config;

class Middleware
{
    /**
     * Running the middleware handling
     *
     * @return void
     */
    public function boot()
    {
        foreach (Config::class()->get('arch')['Middleware'] as $middleware) {
            $middleware = new $middleware();
            $middleware->handle();
        }
    }
}