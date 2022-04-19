<?php

require 'vendor/autoload.php';

use Framework\Exceptions\Handler;
use Framework\Support\Greeter;

Handler::register();

(new Greeter("Nico"))->sayHello();

dd($_SERVER);