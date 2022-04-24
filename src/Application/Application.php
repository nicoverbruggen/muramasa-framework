<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Request;

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
        echo view('homepage', [
            'title' => 'Homepage'
        ]);
    }
}