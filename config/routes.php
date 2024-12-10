<?php
declare(strict_types=1);

use App\Http\Router;

$router = new Router();

// Routes

$router->add('/', __DIR__ . '/../views/products/index.php');
$router->add('/', __DIR__ . '/../views/products/index.php');

// Dispatch the router
$router->dispatch();
