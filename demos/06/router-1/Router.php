<?php

namespace Router1;

include_once 'RouteNotFoundException.php';

class Router
{
    //Routing table.
    private array $routes;

    public function register(string $route, callable $action)
    {
        $this->routes[$route] = $action;
    }

    public function resolve(string $requestUri, string $scriptName)
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
        $action = $this->routes[$route] ?? null;

        //Call the action (which is of type callable, i.e. a function).
        if ($action !== null) {
            return call_user_func($action);
        } else {
            throw new RouteNotFoundException();
        }
    }
}
