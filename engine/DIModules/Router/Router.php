<?php

namespace engine\DIModules\Router;

use app\Middleware\Auth;
use engine\Helper\Common;

class Router
{
    /**
     * TODO: Добавить возможность работы со страницами с двумя и более динамическими уровнями
     *
     */

    /**
     * @var array
     */
    private $routes = [];

    /**
     * Add route to route list
     *
     * @param $key
     * @param $url
     * @param $controller
     * @param $method
     * @return void
     */
    public function add($key, $url, $controller, $method = 'GET')
    {
        $this->routes[$key] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    /**
     * Connecting middleware to route
     *
     * @param $middlewareName
     * @return void
     */
    public function middleware($middlewareName)
    {
        $middlewarePath = 'app\Middleware\\' . $middlewareName;
        $middleware = new $middlewarePath();
        $middleware->handle();
    }

    /**
     * Call dispatcher routes
     *
     * @return Route|null
     */
    public function guide()
    {
        $dispatcher = new Dispatcher($this->routes);

        return $dispatcher->search(Common::getPath());
    }
}