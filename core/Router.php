<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch()
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        $action = $this->routes[$method][$uri];

        if (is_string($action)) {
            [$controller, $method] = explode('@', $action);
            $controller = "App\\Controllers\\$controller";
            $obj = new $controller;
            $data = call_user_func([$obj, $method]);
            if ($data) {
                var_dump($data);
                echo $data;
            }
        }

        if (is_array($action)) {
            $controller = new $action[0];
            $response = $controller->{$action[1]}();
           if ($response) {
               echo $response;
           }
        }
    }
}
