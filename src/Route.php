<?php

namespace Src;

use Src\NotFoundException;

class Route
{

    protected $routes = [];
    protected $routeName;

    public function get($path, $controller)
    {
        $this->addRoute('GET', $path, $controller);
        return $this;
    }

    public function post($path, $controller)
    {
        $this->addRoute('POST', $path, $controller);
        return $this;
    }

    public function addRoute($method, $path, $controller)
    {
        $pattern = preg_replace('/\{([A-Za-z0-9_]+)\}/', '(?P<$1>[A-Za-z0-9_]+)', $path);
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$pattern] = [
            'method' => $method,
            'controller' => $controller,
            'middlewares' => []
        ];
        return $this;
    }

    public static function routeName()
    {
        if (isset($_REQUEST['route'])) {
            return trim($_REQUEST['route'], '/');
        }
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return trim(str_replace(dirname($_SERVER['SCRIPT_NAME']), '', $path), '/');
    }

    public function run()
    {
        foreach ($this->routes as $pattern => $route) {

            if (preg_match($pattern, self::routeName(), $matches) && getMethod() === $route['method']) {

                // Remove the first element from the $matches array (the full match)
                array_shift($matches);

                foreach ($route['middlewares'] as $middleware) {
                    if (!(new $middleware)->execute()) return false;
                }
                
                $controller = $route['controller'];

                if (is_string($controller)) {
                    return $controller;
                }

                if (is_array($controller)) {
                    $class = new $controller[0];
                    $method = $controller[1];
                    return $class->$method(...array_values($matches));
                }

                return call_user_func_array($controller, array_values($matches));
            }
        }

        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        return false;
    }

    public function middleware($middleware)
    {
        $key = array_key_last($this->routes);
        $this->routes[$key]['middlewares'][] = $middleware;
        return $this;
    }
}
