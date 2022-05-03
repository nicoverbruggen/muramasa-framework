<?php declare(strict_types=1);

namespace Tests;

use Framework\Application\Application;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class TestCase extends FrameworkTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->pretendToBeServer();
    }

    public function pretendToBeServer() 
    {
        $_SERVER = [
            'REQUEST_URI' => '/',
            'REQUEST_METHOD' => 'GET'
        ];

        new Application();
    }
}