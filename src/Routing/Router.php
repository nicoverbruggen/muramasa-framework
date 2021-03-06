<?php

namespace Framework\Routing;

use Countable;
use Framework\Http\Request;

class Router implements Countable
{
    /** @var array<Route> */
    private array $routes = [];

    public function register(Route $route)
    {
        app()->router->routes[$route->method . '::' . $route->url] = $route;
    }

    public function count(): int 
    {
        return count($this->routes);
    }

    public function matches(Request $request): ?Route
    {
        $key = $request->method . '::' . $request->uri;

        if (array_key_exists($key, $this->routes)) {
            return $this->routes[$key];
        }

        return null;
    }

    public function resolve(Request $request)
    {
        $route = $this->matches($request);

        if ($route == null) {
            http_response_code(404);
            echo view('errors/404', [
                'title' => '404'
            ]);
        } else {
            echo $route->run();
        }
    }
}