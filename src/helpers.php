<?php

use Framework\Renderer\Katana;

function dd($variable) {
    echo "<pre>";
    if (is_string($variable)) {
        $variable = htmlspecialchars($variable);
    }
    var_dump($variable);
    die();
}

function view_path(string $view): ?string {
    $path = __DIR__ . '/../resources/views/' . $view;

    if (!file_exists($path)) {
        throw new Exception("The view '$view' could not be found.");
    }

    return $path;
}

function view($view, $fields): string {
    $layout = new Katana();
    
    $values = array_merge($fields, [
        'body' => (new Katana($view))->render($fields)
    ]);

    return $layout->render($values);
}