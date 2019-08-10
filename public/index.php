<?php

require '../vendor/autoload.php';

use Router\Router;
use Request\Request;
use Environment\Environment;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

define('ROOT', dirname(__DIR__));

try {
    session_start();

    $router = new Router;
    $request = new Request;
    $env = new Environment;

    $logger = new Logger('main');
    $date = new DateTime();

    $logger->pushHandler(
        new StreamHandler(
            ROOT . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . $date->format('Y-m-d') . '.log',
            Logger::DEBUG
        )
    );
    
    $current = $router->execute();

    $controllerName = sprintf('App\Controllers\%s', $current['controller']);

    foreach ($current['middleware'] as $middleware) {
        $action = sprintf('App\Controllers\Middleware\%sMiddleware', $middleware);
        $action::action();
    }

    $controller = new $controllerName($request, $logger);

    $controller->{$current['action']}();
} catch (\Throwable $throwable) {
    $logger->warning(
        $throwable,
        [
            'code' => $throwable->getCode(),
            'message' => $throwable->getMessage(),
            'line' => $throwable->getLine(),
            'file' => $throwable->getFile(),
            'trace' => $throwable->getTrace(),
            'previous' => $throwable->getPrevious(),
        ]
    );
}
