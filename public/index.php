<?php

require '../vendor/autoload.php';

use Router\Router;

// var_dump($route);exit;
try {
    $router = new Router();
    $current = $router->execute();
    $controllerName = sprintf('App\Controllers\%s', $current['controller']);
    $controller = new $controllerName();
    $controller->{$current['action']}();
} catch (\Error $error) {
    xdebug_print_function_stack($error);
} catch (\Exception $exception) {
    xdebug_print_function_stack($exception);
} catch (\Throwable $throwable) {
    xdebug_print_function_stack($throwable);
}
