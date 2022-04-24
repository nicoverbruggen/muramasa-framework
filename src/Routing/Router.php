<?php

namespace Framework\Routing;

use Framework\Http\Request;

class Router
{
    public static Router $shared;

    /** @var array<Route> */
    public array $routes = [];

    public function activate() {
        self::$shared = $this;
    }

    public function matches($url): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->url == $url) {
                return $route;
            }
        }

        return null;
    }

    public function resolve(Request $request)
    {
        $route = $this->matches($request->uri);

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