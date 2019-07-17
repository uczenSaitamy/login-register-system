<?php

require '../vendor/autoload.php';

use Router\Router;
use Request\Request;

define('ROOT', dirname(__DIR__));

try {
    session_start();

    $router = new Router;
    $request = new Request;
    $current = $router->execute();

    $controllerName = sprintf('App\Controllers\%s', $current['controller']);
    $controller = new $controllerName($request);
    
    $controller->{$current['action']}();
} catch (\Throwable $throwable) {
    xdebug_print_function_stack($throwable);
}
