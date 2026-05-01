<?php

namespace Exercise6;

include_once 'RouteNotFoundException.php';

class Router
{
    //Routing table.
    private array $routes;

    public function register(string $requestMethod, string $route, callable|array $action)
    {
        $this->routes[$requestMethod][$route] = $action;
    }

    public function registerGet(string $route, callable|array $action)
    {
        $this->register('GET', $route, $action);
    }

    public function registerPost(string $route, callable|array $action)
    {
        $this->register('POST', $route, $action);
    }

    public function resolve(string $requestUri, string $requestMethod, string $scriptName)
    {
        //In this router we determine the route as follows (later we will use a better mechanism)
        //The current script is the root of the application: web-engineering-2/demos/06/router/index.php
        //The following URI will be considered route1:
        ///web-engineering-2/demos/06/router/index.php/route1?x=1
        $route = '';

        //Remove the script name from the URI.
        $route = substr($requestUri, strlen($scriptName));

        //Remove the query string. Thereto, split the $route into an array using '?' as delimiter and
        //use the substring at index 0 of the array.
        $route = explode('?', $route)[0];

        //If the route is empty, we consider '/' to be the route.
        $route = $route !== '' ? $route : '/';

        //Get the action from the routing table.
        $action = $this->routes[$requestMethod][$route] ?? null;

        //Call the action (which is of type callable or an array, i.e. a function).
        if ($action !== null) {
            if (is_callable($action)) {
                return call_user_func($action);
            } else {
                //Explanation: callable can be classname and method name for statis methods.
                //For instance methods, we need an instance of the class.
                //Hence we accept an array in addition to callable. If an array is passed, then
                //we instantiate the class.
                [$class, $method] = $action;
                $object = new $class();
                return call_user_func_array([$object, $method], []);
            }
        } else {
            throw new RouteNotFoundException();
        }
    }
}
