<?php

namespace engine\DIModules\Router;

class Dispatcher
{
    /**
     * @var
     */
    private $routes;

    /**
     * Save routes to the class variable
     *
     * @param $routes
     */
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Searching for the current route and route parameters
     *
     * @param $path
     * @return Route|null
     */
    public function search($path)
    {
        foreach ($this->routes as $route) {
            if(strpos($route['url'], '{') !== false) { // strpos ищем символ в строке
                $parameters = $this->checkDynamic($path, $route['url']);
                if($parameters) { // проверка динамического url
                    return new Route($route, $parameters);
                }
            }

            if($this->check($path, $route['url'])) {
                return new Route($route);
            }
        }

        return null;
    }

    /**
     * Check the route for statics
     *
     * @param $currentPath
     * @param $routeUrl
     * @return bool
     */
    public function check($currentPath, $routeUrl)
    {
        $parts = parse_url($currentPath);
        if($parts['path'] == $routeUrl OR $parts['path'] == $routeUrl . '/') { // проверка совпадения роута и url
            return true;
        }

        return false;
    }

    /**
     * Check the route for dynamics
     *
     * @param $currentPath
     * @param $route
     * @return array|false
     */
    public function checkDynamic($currentPath, $route) {
        // 1) разбиваем на части. 2) убираем пустые ячейки. 3) нумеруем массив 0, 1, 2...
        $expPath = array_values(array_diff(explode('/', $currentPath), array('')));
        $expRoute = array_values(array_diff(explode('/', $route), array('')));

        if (count($expPath) == count($expRoute)) {
            $generatedUrl = '';
            $parameters = [];
            for ($i = 0; $i < count($expPath); $i++) {
                if($expPath[$i] == $expRoute[$i]) { // если равны
                    $generatedUrl .= '/' . $expPath[$i];
                } elseif (strpos($expRoute[$i], '{') !== false) { // содержит динамическую часть {
                    $generatedUrl .= '/' . $expPath[$i];
                    array_push($parameters, $expPath[$i]);
                }
            }

            if($currentPath == $generatedUrl OR $currentPath == $generatedUrl . '/') {
                return $parameters; // возвращаем параметры динамической страницы
            }
        }

        return false;
    }

    /**
     * Getting url parameters
     *
     * @param $currentPath
     * @return array|mixed
     */
    public function getParameters($currentPath)
    {
        $parts = parse_url($currentPath);
        return isset($parts['query']) ? $parts['query'] : [];
    }
}

