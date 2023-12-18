<?php

use Mviot\GetsionAutomobile\Controllers\CarController;
use Mviot\GetsionAutomobile\Router;

$router = new Router();
$router->addRoute('/', CarController::class, 'index');
$router->addRoute('/new', CarController::class, 'apiNew');
return $router;
