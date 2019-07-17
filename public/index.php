<?php

require '../vendor/autoload.php';

use Router\Router;

define('ROOT', dirname(__DIR__));

try {
    session_start();

    $router = new Router();
    $current = $router->execute();

    $controllerName = sprintf('App\Controllers\%s', $current['controller']);
    $controller = new $controllerName();

    $controller->{$current['action']}();
} catch (\Throwable $throwable) {
    xdebug_print_function_stack($throwable);
}
