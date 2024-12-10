<?php

declare(strict_types=1);

use App\Http\Router;

$router = new Router();

// Routes

$router->add("/", __DIR__ . "/../views/home.php");
$router->add("products", __DIR__ . "/../views/products/index.php");
$router->add("products/index", __DIR__ . "/../views/products/index.php");
$router->add("product/{id}", __DIR__ . "/../views/products/show.php");
// $router->add('product/{id}', 'views/product-details.php');

// Dispatch the router
$router->dispatch();
