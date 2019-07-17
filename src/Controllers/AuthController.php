<?php

namespace App\Controllers;

use Router\Router;

class AuthController extends BaseController
{
    public function login()
    {
        $this->render('login');
    }

    public function authorize()
    {
        var_dump('test');
    }

    public function register()
    {
        $this->render('register');
    }

    public function store()
    {
        var_dump('store');
    }
}
