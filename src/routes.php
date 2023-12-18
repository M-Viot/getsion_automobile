<?php

use Mviot\GetsionAutomobile\Controllers\CarController;
use Mviot\GetsionAutomobile\Router;

$router = new Router();
$router->addRoute('/', CarController::class, 'index');
return $router;
