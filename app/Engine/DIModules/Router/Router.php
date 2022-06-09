<?php

namespace app\Engine\DIModules\Router;

use app\Engine\Helper\Common;

class Router
{
    /**
     * TODO: Добавить возможность работы со страницами с двумя и более динамическими уровнями
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
     * TODO: сделать групирование роутов
     */
    /*public function group(array $attributes, $routes)
    {

        foreach ($attributes as $key => $attribute) {
            switch ($key) {
                case 'middleware': $this->middleware('a');
                break;
                case 'prefix': echo '<br>prefix'; // <br>prefix
            }
        }

        if ($routes instanceof Closure) {
            $routes(); // выполняем переданную функцию
        }
    }*/

    /**
     * TODO: добавление middleware через роут ->middleware('Auth');
     *
     * @param $middleware
     //* @return void
     */
    public function middleware($middleware)
    {
        echo 'middleware';
        exit();
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