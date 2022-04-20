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

    public function run() {
        // 
    }
}