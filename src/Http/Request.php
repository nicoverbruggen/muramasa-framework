<?php

namespace Framework\Http;

class Request
{
    public string $uri;
    public string $method;

    public function __construct(array $server)
    {
        $this->uri = $server['REQUEST_URI'];
        $this->method = $server['REQUEST_METHOD'];
    }
}