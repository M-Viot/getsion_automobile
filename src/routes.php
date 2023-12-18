<?php

use Mviot\GetsionAutomobile\Controllers\ProductController;
use Mviot\GetsionAutomobile\Router;

$router = new Router();
$router->addRoute('/', ProductController::class, 'index');
return $router;
