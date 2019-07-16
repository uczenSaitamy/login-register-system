<?php

use Router\Router;

function hello()
{
    echo "hello";
}

function url($name)
{
    $router = new Router();
    return $router->generate($name);
}
