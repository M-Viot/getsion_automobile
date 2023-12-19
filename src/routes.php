<?php

use Mviot\GetsionAutomobile\Controllers\CarController;
use Mviot\GetsionAutomobile\Router;

$router = new Router();
$router->addRoute('/', CarController::class, 'index');
$router->addRoute('/api', CarController::class, 'api');
return $router;
