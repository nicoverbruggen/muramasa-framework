<?php

require '../vendor/autoload.php';

use Framework\Application\Application;

$app = new Application();
$app->boot();
$app->run();