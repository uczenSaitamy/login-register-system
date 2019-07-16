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

        foreach ($routes as $url => $data) {
            $this->add($url, $data);
        }
    }

    protected function add(string $route, array $data, string $method = 'GET')
    {
        $piece = $this->separate($data[0]);

        $this->routes[$data[1]]['controller'] = $piece['controller'];
        $this->routes[$data[1]]['action'] = $piece['action'];
        $this->routes[$data[1]]['url'] = $route;
        $this->routes[$data[1]]['method'] = $method;
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
        foreach ($this->routes as $name => $data) {
            if ($data['url'] === $this->current) {
                return $this->routes[$name];
            }
        }
        return $this->get404();

        if (array_key_exists($this->current, $this->routes)) {
            return $this->routes[$this->current];
        } else {
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

    public function getRoute($name)
    {
        if (isset($this->routes[$name])) {
            return $this->routes[$name];
        }
        return $this->get404();
    }

    public function generate($name)
    {
        $data = $this->getRoute($name);
        return $data['url'];
    }
}
