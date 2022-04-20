<?php

namespace Framework\Routing;

class Router
{
    /** @var array<Route> */
    public array $routes = [];

    public function get($url, $controller, $function)
    {
        $this->routes[] = new Route("GET", $url, $controller, $function);
    }

    public function resolve($url): Route
    {
        foreach ($this->routes as $route) {
            if ($route->url == $url) {
                return $route;
            }
        }
    }
}