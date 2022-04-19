<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Support\Greeter;

class Application
{
    public function boot()
    {
        Handler::register();
    }

    public function run()
    {
        (new Greeter("Nico"))->sayHello();

        dd($_SERVER);
    }
}