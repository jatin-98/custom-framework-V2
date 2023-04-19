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


/* 

Sure, here are some suggestions for advancing the Route class:

Parameterized routes: Allow routes to include parameters that can be extracted and passed to the controller action. For example, a route like /users/{id} could match /users/1 and pass 1 as a parameter to the controller action. This can be achieved using regular expressions to define route patterns and extracting parameters from the requested route. {DONE}

Route groups: Allow routes to be grouped together with a common prefix or middleware. This can make it easier to organize routes and apply middleware to multiple routes at once.

Middleware pipeline: Instead of attaching middleware to individual routes, create a middleware pipeline that can be applied to all routes. This can allow for more complex middleware handling and make it easier to add and remove middleware as needed.

Route caching: Cache route definitions and controller actions to improve performance and reduce the need for repeated route parsing and controller instantiation.

Route dispatching: Use a more robust route dispatching algorithm to handle complex route matching and prioritization, such as the FastRoute library.

Route parameters validation: Validate and sanitize incoming route parameters to prevent injection attacks or other security vulnerabilities. {NOT NECESSARY}

Route methods restriction: Allow to restrict the HTTP methods that can be used to access a route. This can help to ensure that only valid requests are being made to the server. {NOT NECESSARY}

By incorporating these features, the Route class can become a more powerful and secure routing system for a web application.

*/