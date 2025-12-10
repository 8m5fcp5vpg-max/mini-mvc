<?php

declare(strict_types=1);

session_start();

use Mini\Controllers\OrderController;
use Mini\Controllers\CartController;
use Mini\Controllers\ProductController;
use Mini\Controllers\AuthController;
use Mini\Core;
use Mini\Core\Database;
use Mini\Core\Router;
use Mini\Controllers\HomeController;


$routes = [
    // Route Accueil
    ['GET', '/', [HomeController::class, 'index']],
    
    // Ajoute tes futures routes ici
    // ['GET', '/product', [ProductController::class, 'show']], 

    ['GET', '/orders', [OrderController::class, 'history']],
    ['GET', '/cart', [CartController::class, 'index']],      
    ['POST', '/cart/add', [CartController::class, 'add']],    
    ['GET', '/cart/clear', [CartController::class, 'clear']], 
    ['GET', '/login', [AuthController::class, 'login']],
    ['POST', '/login', [AuthController::class, 'loginPost']],
    ['GET', '/logout', [AuthController::class, 'logout']],
    ['GET', '/register', [AuthController::class, 'register']],
    ['POST', '/register', [AuthController::class, 'registerPost']],
    ['GET', '/product', [ProductController::class, 'show']],
    ['GET', '/order/add', [OrderController::class, 'add']],
];

try {
    $router = new Router($routes);

    $uri = $_SERVER['REQUEST_URI'];
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
    $scriptDir = str_replace('\\', '/', $scriptDir);
    
    if (strpos($uri, $scriptDir) === 0) {
        $uri = substr($uri, strlen($scriptDir));
    }
    
    if ($uri === '' || $uri === false) {
        $uri = '/';
    }
    
    $router->dispatch($_SERVER['REQUEST_METHOD'], $uri);

} catch (\Throwable $e) {
    echo "<h2 style='color:red; font-family:sans-serif;'>Erreur Fatale</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}