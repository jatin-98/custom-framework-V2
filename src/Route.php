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
        $this->routes[$pattern] = [$method, $controller];
        return $this;
    }

    public static function routeName()
    {
        if (strpos($_SERVER['DOCUMENT_ROOT'], basename(dirname(__DIR__)))) {
            return str_replace('/', '', $_SERVER['REQUEST_URI']);
        }

        return $_REQUEST['route'];
    }

    public function run()
    {
        foreach ($this->routes as $pattern => $callback) {

            if (preg_match($pattern, self::routeName(), $matches) && in_array(getMethod(), $callback)) {

                // Remove the first element from the $matches array (the full match)
                array_shift($matches);

                if (array_key_exists(2, $callback)) {
                    if (!(new $callback[2])->execute()) return false;
                }

                if (is_string($callback[1])) {
                    return $callback[1];
                }

                if (is_array($callback[1])) {
                    $class = new $callback[1][0];
                    $method = $callback[1][1];
                    return $class->$method(...array_values($matches));
                }

                return call_user_func_array($callback[1], array_values($matches));
            }
        }

        return dump('Route Not Found!');
    }

    public function middleware($middleware)
    {
        $key = array_key_last($this->routes);
        array_push($this->routes[$key], $middleware);
        return $this;
    }
}
