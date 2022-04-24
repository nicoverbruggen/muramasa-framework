<?php

use Framework\Http\Controllers\HomeController;
use Framework\Routing\Route;

Route::get('/', HomeController::class, 'getHomepage');
Route::get('/about', HomeController::class, 'getAbout');