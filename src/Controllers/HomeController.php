<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $controller['name'] = 'HomeController';
        $controller['next'] = 'AnotherVar';
        $this->render('home', ['controller' => $controller]);
    }
}
