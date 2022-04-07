<?php

declare(strict_types=1);

namespace App\Routing;

use App\Controller\Home;
use App\Controller\Win;
use App\Controller\Fail;
use App\Controller\Controller;

class Router
{
    private array $routes = [
        "/" => Home::class,
        "/win" => Win::class,
        "/fail" => Fail::class,
    ];

    private static string $path;

    private static ?Router $router = null;

    private function __construct()
    {
        self::$path = $_SERVER['PATH_INFO'] ?? '/';
    }

    public static function getFromGlobals(): Router
    {
        if (self::$router === null) {
            self::$router = new self();
        }
        return self::$router;
    }

    public function getController(): void
    {
        $controllerClass = $this->routes[self::$path] ?? $this->routes['/404'];
        $controller = new $controllerClass();

        if(!$controller instanceof Controller) {
            throw new \LogicException("controller $controller should implement ".Controller::class);
        }
        $controller->render();
    }
}
