<?php

namespace App\Routes;

use App\Conf\Container;
use App\HTTP\Request;
use Reflection;
use ReflectionMethod;

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
        $requestMethod = $_SERVER['REQUEST_METHOD'];
    
        $routes = self::$routes[$requestMethod] ?? [];
    
        foreach ($routes as $route => $action) {
            // Transforma rota com parâmetro: /user/{id} => regex: /user/([\w-]+)
            $pattern = preg_replace('#\{[\w]+\}#', '([\w-]+)', $route);
            $pattern = "#^{$pattern}$#";
    
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // remove o match completo
    
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
    
                $controllerInstance = $container->resolveDependency($controller);
                $request = new Request();
                
                $reflection = new ReflectionMethod($controller, $method);
                $parameters = [];
                foreach ($reflection->getParameters() as $index => $param){
                    $type = $param->getType();

                    if ($type == Request::class) {
                        $parameters[] = $request;
                    } else {
                        $parameters[] = array_shift($matches);
                    }
                }
    
                // Envia o Request como primeiro argumento, e os parâmetros da rota depois
                $response = call_user_func_array([$controllerInstance, $method], $parameters);
    
                if (!is_null($response)) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
    
                return;
            }
        }
    
        // Nenhuma rota bateu
        http_response_code(404);
        echo json_encode(['message' => 'Route not found']);
    }
    
}