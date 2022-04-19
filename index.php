<?php

require 'vendor/autoload.php';

use Framework\Greeter;
use Framework\ExceptionHandler;

ExceptionHandler::register();

(new Greeter("Nico"))->sayHello();

dd($_SERVER);