<?php

require dirname(__DIR__) .  '/config/Router/Router.php';

$router = new Router\Router();

$router->execute();
