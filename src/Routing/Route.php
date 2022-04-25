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

    public static function get($url, $controller, $function)
    {
        app()->router->register(new Route("GET", $url, $controller, $function));
    }

    public static function post($url, $controller, $function)
    {
        app()->router->register(new Route("POST", $url, $controller, $function));
    }
}