<?php

namespace Router;

class Router
{
    private $routes;

    public function __construct()
    {
        $routes = include(dirname(__DIR__) .  '/routes.php');

        foreach ($routes as $url => $closure) {
            $this->add($url, $closure);
        }
    }

    protected function add(string $route, string $closure, string $method = 'GET')
    {
        $piece = $this->separate($closure);

        $this->routes[$route]['controller'] = $piece['controller'];
        $this->routes[$route]['function'] = $piece['function'];
        $this->routes[$route]['method'] = $method;
    }

    protected function separate(string $closure)
    {
        $piece = explode('@', $closure, 2);

        return [
            'controller' => $piece[0],
            'function' => $piece[1],
        ];
    }

    public function execute()
    {
        $path = $_SERVER['PATH_INFO'];

        switch ($path) {
            case null:
                echo "home";
                break;
            case array_key_exists($path, $this->routes):
                echo "exist";
                break;
            default:
                echo "error 404";
                break;
        }
    }
}
