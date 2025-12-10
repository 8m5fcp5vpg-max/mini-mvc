<?php
declare(strict_types=1);
namespace Mini\Core;
final class Router
{
    /** @var array<int, array{0:string,1:string,2:array{0:class-string,1:string}} > */
    private array $routes;

    /**
     * Initialise le routeur avec les routes configurées
     * @param array<int, array{0:string,1:string,2:array{0:class-string,1:string}} > $routes
     */


    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        foreach ($this->routes as [$routeMethod, $routePath, $handler]) {
            if ($method === $routeMethod && $path === $routePath) {
                [$class, $action] = $handler;
                $controller = new $class();
                // Appelle l'action sur le contrôleur
                $controller->$action();
                return;
            }
        }

        // Si aucune route correspond -> erreur 404
        http_response_code(404);
        echo 'Erreur 404';
    }
}


