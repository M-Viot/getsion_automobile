<?php

require 'vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
require 'app.php';
$router = require 'src/routes.php';
$router->dispatch($uri);
