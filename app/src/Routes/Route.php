<?php

namespace App\Routes;

use App\Conf\Container;
use App\HTTP\Request;

class Route
{
    private static array $routes = [];

    public static function get(string $uri, array $action): void
    {
        self::$routes['GET'][$uri] = $action;
    }

    public static function post(string $uri, array $action): void
    {
        self::$routes['POST'][$uri] = $action;
    }

    public static function put(string $uri, array $action): void
    {
        self::$routes['PUT'][$uri] = $action;
    }

    public static function delete(string $uri, array $action): void
    {
        self::$routes['DELETE'][$uri] = $action;
    }

    public static function patch(string $uri, array $action): void
    {
        self::$routes['PATCH'][$uri] = $action;
    }

    public static function dispatch(Container $container): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset(self::$routes[$method][$uri])) {
            http_response_code(404);
            echo json_encode(['message' => 'Route not found']);
            exit;
        }

        $action = self::$routes[$method][$uri];

        if (is_array($action)) {
            $controller = $action[0];
            $method = $action[1];

            if (!class_exists($controller)) {
                http_response_code(404);
                echo json_encode(['message' => 'Controller not found']);
                exit;
            }

            if (!method_exists($controller, $method)) {
                http_response_code(404);
                echo json_encode(['message' => 'Method not found']);
                exit;
            }

            // injection dependency
            $controller = $container->resolveDependency($controller);
            $response = call_user_func([$controller, $method], new Request());

            if (!is_null($response)) {
                header('Content-Type: application/json');
                echo json_encode($response);
            }

            return;
        }

        http_response_code(500);
        echo json_encode(['error' => 'Internal Server Error Routes']);
    }
}