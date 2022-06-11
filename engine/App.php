<?php

namespace engine;

use engine\Modules\Http\HttpHandler;
use engine\Services\Router\Route;

class App
{
    /**
     * @var DI
     */
    protected $di;

    /**
     * @var mixed|null
     */
    protected $router;

    /**
     * @var mixed|null
     */
    protected $db;

    /**
     * Saving DI modules to the self class
     *
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->router = $di->get('router');
        $this->db = $di->get('Configs');
    }

    /**
     * Running the app
     *
     * @return void
     */
    public function run() {
        require_once 'app/routes.php'; // подключается один раз

        $route = $this->router->guide();

        if(!$route) { // 404 Page
            $route = new Route(['controller' => 'ErrorController:page404', 'method' => 'GET']);
        }

        list($controller, $function) = explode(':', $route->getController(), 2); // извлекаем контроллер и функцию
        $class = '\\app\\Controllers\\' . (string)$controller;

        /**
         * TODO: добавить проверку наличия динамической страницы page/{id} в бд перед передачей роута в контроллер
         */
        $http = new HttpHandler($this->di, $class, $function, $route->getParameters());
        $http->handle($route->getMethod());
    }
}

