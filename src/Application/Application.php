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
        $path = view_path('layout.html');
        $html = file_get_contents($path);

        dd($html);
    }
}