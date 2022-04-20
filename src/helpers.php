<?php

function dd($variable) {
    echo "<pre>";
    var_dump(htmlspecialchars($variable));
    die();
}

function view_path(string $view): ?string {
    $path = __DIR__ . '/../resources/views/' . $view;

    if (!file_exists($path)) {
        throw new Exception("The view '$view' could not be found.");
    }

    return $path;
}