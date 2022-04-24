<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Request;
use Framework\Routing\Router;

class Application
{
    public static Application $instance;

    public Request $request;
    public Router $router;

    public function __construct()
    {
        Handler::register();

        $this->request = new Request($_SERVER);
        $this->router = new Router();
        $this->router->activate();

        self::$instance = $this;
    }

    public function boot()
    {
        require __DIR__ . '/../routes.php';
    }

    public function run()
    {
        $this->router->resolve($this->request);
    }
}