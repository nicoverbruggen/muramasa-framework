<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Request;
use Framework\Support\Greeter;

class Application
{
    public ?Request $request = null;

    public function boot()
    {
        Handler::register();

        $this->request = new Request($_SERVER);
    }

    public function run()
    {
        dd($this->request);

        (new Greeter("Nico"))->sayHello();

        dd($_SERVER);
    }
}