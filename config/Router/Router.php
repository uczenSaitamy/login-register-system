<?php

namespace Router;

use App\Controllers;
use Exception;

class Router
{
    private $routes;

    private $current;

    public function __construct()
    {
        $this->current = $_SERVER['REQUEST_URI'];

        $routes = include(dirname(__DIR__) .  '/routes.php');

        foreach ($routes as $url => $closure) {
            $this->add($url, $closure);
        }
    }

    protected function add(string $route, string $closure, string $method = 'GET')
    {
        $piece = $this->separate($closure);

        $this->routes[$route]['controller'] = $piece['controller'];
        $this->routes[$route]['action'] = $piece['action'];
        $this->routes[$route]['method'] = $method;
    }

    protected function separate(string $closure): array
    {
        $piece = explode('@', $closure, 2);

        return [
            'controller' => $piece[0],
            'action' => $piece[1],
        ];
    }

    public function execute()
    {
        if (array_key_exists($this->current, $this->routes)) {
            return $this->routes[$this->current];
        } else {
            // throw new \Exception('Page not found', 404);
            return $this->get404();
        }
    }

    protected function get404()
    {
        return [
            'controller' => 'BaseController',
            'action' => 'error404',
            'method' => 'GET'
        ];
    }
}
