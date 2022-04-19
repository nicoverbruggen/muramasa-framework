<?php

namespace Framework;

class Greeter
{
    public function __construct(public string $name) {}

    public function sayHello()
    {
        echo "Hello {$this->name}!";
    }
}