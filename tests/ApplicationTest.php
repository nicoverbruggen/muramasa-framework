<?php declare(strict_types=1);

namespace Tests;

use Framework\Application\Application;

final class ApplicationTest extends TestCase
{
    public function test_can_be_created() 
    {
        $this->assertInstanceOf(Application::class, app());
    }

    public function test_singleton_is_created()
    {
        $this->assertInstanceOf(Application::class, Application::$instance);
    }

    public function test_routes_are_registered()
    {
        $this->assertCount(0, app()->router);

        app()->boot();

        $this->assertCount(2, app()->router);
    }

    public function test_404_works()
    {
        ob_start();

        app()->run();

        $output = ob_get_contents();

        ob_end_clean();

        $this->assertStringContainsString('Whoops', $output);
    }

    public function test_functional_route_works()
    {
        ob_start();

        app()->boot();
        app()->run();

        $output = ob_get_contents();

        ob_end_clean();

        $this->assertStringContainsString('Homepage', $output);
    }
}