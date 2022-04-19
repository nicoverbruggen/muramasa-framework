<?php

namespace Framework\Support;

class Greeter
{
    public function __construct(public string $name) {}

    public function sayHello()
    {
        echo "Hello {$this->name}!";
    }
}