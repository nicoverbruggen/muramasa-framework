<?php

use Framework\Application\Application;
use Framework\Renderer\Katana;

function dd($variable) {
    echo "<pre>";
    if (is_string($variable)) {
        $variable = htmlspecialchars($variable);
    }
    var_dump($variable);
    die();
}

function root_path(string $fileName): string
{
    return __DIR__ . '/../' . $fileName;
}

function base_path(string $fileName): string
{
    return __DIR__ . '/' . $fileName;
}

function view_path(string $view): ?string {
    $path = __DIR__ . '/../resources/views/' . $view;

    if (!file_exists($path)) {
        throw new Exception("The view '$view' could not be found.");
    }

    return $path;
}

function view(string $view, array $slots = []): string {
    $layout = new Katana();
    
    $values = array_merge($slots, [
        'body' => (new Katana($view))->render($slots)
    ]);

    return $layout->render($values);
}

function app(): Application {
    return Application::$instance;
}