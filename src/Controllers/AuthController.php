<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login()
    {
        $page = 'login';
        $this->render('index', ['page' => $page]);
    }

    public function register()
    {
        $page = 'register';
        $this->render('index', ['page' => $page]);
    }
}
