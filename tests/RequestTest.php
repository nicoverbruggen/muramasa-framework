<?php declare(strict_types=1);

namespace Tests;

use Framework\Http\Request;

final class RequestTest extends TestCase
{
    public function test_can_be_created() 
    {
        $this->assertInstanceOf(Request::class, new Request($_SERVER));
    }
}