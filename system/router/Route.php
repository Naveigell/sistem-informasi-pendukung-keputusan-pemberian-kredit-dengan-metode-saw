<?php
namespace System\Router;

use System\Middleware\Middleware;

class Route {
    private $getRoutes = [];
    private $postRoutes = [];

    public function get($pattern, $class, $function, $args = [])
    {
        $this->getRoutes[$pattern] = [$class, $function];
    }

    public function post($pattern, $class, $function, $args = [])
    {
        $this->postRoutes[$pattern] = [$class, $function];
    }

    private function callMethod($routes = []){
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        if (isset($routes[$url])) {
            $route = $routes[$url];
            if (method_exists($route[0], $route[1])) {
//                call_user_func_array([$route[0], $route[1]], []);
                try {
                    $method = new \ReflectionMethod($route[0], $route[1]);
                    $method->invoke(new $route[0]);

                    $class = new \ReflectionObject(new $route[0]);
                    $middlewares = $class->getProperty('middlewares');
                    $middlewares->setAccessible(true);
                    $middlewares = $middlewares->getValue(new $route[0]);

                    foreach ($middlewares as $middleware) {
                        new Middleware($middleware);
                    }
                } catch (\ReflectionException $e) {
                    var_dump($e->getMessage());
                }
            } else {
                echo "method not found";
            }
        } else {
            abort404();
        }
    }

    public function run()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->callMethod($this->getRoutes);
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->callMethod($this->postRoutes);
        }
    }
}