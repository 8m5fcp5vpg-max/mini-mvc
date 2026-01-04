<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
session_start();

use Mini\Core\Router;
use Mini\Controllers\OrderController;
use Mini\Controllers\CartController;
use Mini\Controllers\ProductController;
use Mini\Controllers\AuthController;
use Mini\Core\Database;
use Mini\Controllers\HomeController;

$routes = [
    ['GET', '/', [HomeController::class, 'index']],
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

    // Extract the path from REQUEST_URI (remove query string)
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    // Remove the base directory if present (for subdirectory installations)
    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    if ($basePath !== '/' && strpos($uri, $basePath) === 0) {
        $uri = substr($uri, strlen($basePath));
    }
    
    // Ensure URI starts with /
    if (empty($uri)) {
        $uri = '/';
    }

    // Remove query string from URI
    if (strpos($uri, '?') !== false) {
        $uri = substr($uri, 0, strpos($uri, '?'));
    }

    // Dispatch with clean URI
    $router->dispatch($_SERVER['REQUEST_METHOD'], $uri);

} catch (\Throwable $e) {
    echo "<h2 style='color:red; font-family:sans-serif;'>Erreur Fatale</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}