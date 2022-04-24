<?php

namespace Framework\Routing;

class Route
{
    public function __construct(
        public string $method,
        public string $url,
        public string $controller,
        public string $function,
    ) {}

    public function run() 
    {
        return (new $this->controller())->{$this->function}();
    }

    // Static helpers!

    public static function get($url, $controller, $function)
    {
        Router::$shared->routes[] = new Route("GET", $url, $controller, $function);
    }

    public static function post($url, $controller, $function)
    {
        Router::$shared->routes[] = new Route("POST", $url, $controller, $function);
    }
}